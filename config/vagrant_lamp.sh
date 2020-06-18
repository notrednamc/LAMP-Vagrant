#! /usr/bin/env bash

###
# Author: Mike Anderton
# Company: Gray Analytics
# Purpose of this Script: Install LAMP stack on Ubuntu
# Notes:
# This script is intended for local development.
# LAMP install instructions come from
# https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04
#
# This script will install:
# Apache2 | MySQL Server [Secure Installation] | PHP | PHPMYADMIN 
# ***Best attempts were made to be version agnostic and use the latest and greatest where possible.
#
# This script assumes your Vagrantfile has been configured to map the root of
# your application to /vagrant and that your web root is the standard apache
# web root folder /var/www/html/appname. If appname is the only app on the server
# you will need to alter the web root commands below to creat the appropriate path
# and accompanying vagrant symlink
#
# All normal screen activity is sent to /vagrant/(vm/db)_build.log during provisioning.
# Look here for any errors.
# Since PHP version numbers change often, look to the errors section of this Script
# to verify you have the proper version referenced.
#
# Error Logs: Add >> /vagrant/config/vm_build.log 2>&1 OR >> /vagrant/config/sql/db_build.log 2>&1 to the end of a command to send 
# error output to the error logs. Remove this to output errors to the screen during build.
#
###

#
# Variables: Change to fit your environment
#

DBHOST=localhost
DBNAME=db_cat
DBUSER=user_cat
DBPASSWD='password'
ROOTPW='password'
APPNAME='cat'

#
# Start LAMP Install and Configure
#

echo -e "\***** Installing LAMP *****/"

echo -e "\n\***** Updating packages list *****/\n"
sudo apt-get -qq update >> /config/vm_build.log 2>&1
sudo apt-get -qq upgrade -y >> /config/vm_build.log 2>&1

echo -e "\n\***** Install base packages *****/\n"
apt-get -y install nano curl build-essential python-software-properties git >> /config/vm_build.log 2>&1

echo -e "\n\***** Installing Apache *****/\n"
apt-get -y install apache2 >> /config/vm_build.log 2>&1
## vv--May not be necessary...up to you
sudo ufw allow in "Apache Full" >> /config/vm_build.log 2>&1

#
# MySQL setup for development purposes ONLY
# Handles automation of Secure MySQL/phpmyadmin installation steps
#
echo -e "\n\***** Install MySQL Server/phpmyadmin *****/\n"
debconf-set-selections <<< "mysql-server mysql-server/root_password password $DBPASSWD"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $DBPASSWD"
debconf-set-selections <<< "mysql_server mysql_secure_installation/validate_password_plugin multiselect y"
debconf-set-selections <<< "mysql_server mysql_secure_installation/validate_password_plugin multiselect 2"
debconf-set-selections <<< "mysql_server mysql_secure_installation/validate_password_plugin multiselect y"
debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $DBPASSWD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $DBPASSWD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $DBPASSWD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect none"
apt-get -y install mysql-server phpmyadmin >> /config/sql/db_build.log 2>&1

echo -e "\n\***** Setting MySQL user/root user and app Database *****/\n"
mysql -uroot -p$DBPASSWD -e "CREATE DATABASE $DBNAME" >> /config/sql/db_build.log 2>&1
mysql -uroot -p$DBPASSWD -e "grant all privileges on $DBNAME.* to '$DBUSER'@'localhost' identified by '$DBPASSWD'" >> /config/sql/db_build.log 2>&1

mysql -uroot -p$DBPASSWD -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '$ROOTPW';" >> /config/sql/db_build.log 2>&1
mysql -uroot -p$DBPASSWD -e "FLUSH PRIVILEGES;" >> /vagrant/config/sql/db_build.log 2>&1
mysql -uroot -p$DBPASSWD -e "SELECT user,authentication_string,plugin,host FROM mysql.user WHERE user='root';" >> /vagrant/config/sql/db_build.log 2>&1
mysql -uroot -p$DBPASSWD < /vagrant/config/sql/init.sql >> /vagrant/config/sql/db_build.log 2>&1
mysql -uroot -p$DBPASSWD < /vagrant/config/sql/dummy.sql >> /vagrant/config/sql/db_build.log 2>&1
mysql -uroot -p$DBPASSWD < /vagrant/config/sql/proc.sql >> /vagrant/config/sql/db_build.log 2>&1
mysql -uroot -p$DBPASSWD -e "exit" >> /vagrant/config/sql/db_build.log 2>&1

#
# PHP setup. May need to be altered/updated
#
echo -e "\n\***** Installing PHP-specific packages *****/\n"
apt-get -y install php libapache2-mod-php php-curl php-gd php-mysql php-gettext php-cli >> /vagrant/config/vm_build.log 2>&1

#
# Configuration steps 
#
echo -e "\n\***** Begin Configuration Steps *****/\n"

echo -e "\n\***** Enabling mod-rewrite *****/\n"
a2enmod rewrite >> /vagrant/config/vm_build.log 2>&1

echo -e "\n\***** Allowing Apache override to all *****/\n"
sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf

echo -e "\n\***** Setting document root to public directory *****/\n"
if [ ! -d "/var/www/html/$APPNAME" ]; then
  sudo mkdir /var/www/html/$APPNAME
fi

## Create symlynk for easier local dev
echo -e "\n\***** Creating a symlink for easier local development *****/\n"
ln -fs /vagrant /var/www/html/$APPNAME

## TODO: Try to make this php version agnostic
echo -e "\n\***** We definitly need to see the PHP errors, turning them on *****/\n"
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php/7.2/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php/7.2/apache2/php.ini

echo -e "\n\***** Restarting Apache *****/\n"
service apache2 restart >> /vagrant/config/vm_build.log 2>&1

## Not positive composer is necessary
echo -e "\n\***** Installing Composer for PHP package management *****/\n"
curl --silent https://getcomposer.org/installer | php >> /vagrant/config/vm_build.log 2>&1
mv composer.phar /usr/local/bin/composer

## Not sure what this does....it was suggested as part of php install but I forgot why.
echo -e "\n\***** Creating a symlink for future phpunit use *****/\n"
if [[ -x /vagrant/vendor/bin/phpunit ]] ;then
  ln -fs /vagrant/vendor/bin/phpunit /usr/local/bin/phpunit
fi

echo -e "\n\***** OS & Linux Info *****/\n"
cat /etc/os-release |grep -i version
uname -mrs

echo -e "\n\***** MySql Version Info *****/\n"
mysql --version

echo -e "\n\***** PHP Version Info *****/\n"
php --version

echo -e "\n\***** LAMP Stack Ready at http://localhost:8080/$APPNAME/vagrant/ *****/"
echo -e "\n\***** phpmyadmin GUI http://localhost:8080/phpmyadmin/ *****/"
echo -e "\n\***** VM build log is located @ root/config/vm_build.log *****/"
echo -e "\n\***** DB build log is located @ root/config/sql/db_build.log *****/"

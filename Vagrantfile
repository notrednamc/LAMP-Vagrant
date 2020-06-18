# -*- mode: ruby -*-
# vi: set ft=ruby :

servers = [
    {
    :name => "CyberAssistaceTool-LAMP",
    :type => "Linux",
    :box => "ubuntu/bionic64",
    :eth1 => "10.10.10.10",
    :mem => "4096",
    :cpu => "2"
}
]

#
# Vagrant Plugins Script
#
REQUIRED_PLUGINS = %w[vagrant-vbguest vagrant-cachier vagrant-multi-putty vagrant-reload vagrant-flow].freeze

plugins_to_install = REQUIRED_PLUGINS.reject { |plugin| Vagrant.has_plugin? plugin }
unless plugins_to_install.empty?
  puts "Installing required plugins: #{plugins_to_install.join(' ')}"
  if system "vagrant plugin install #{plugins_to_install.join(' ')}"
    exec "vagrant #{ARGV.join(' ')}"
  else
    abort 'Installation of one or more plugins has failed. Aborting.'
  end
end

#
# Vagrant configuration
#
Vagrant.configure(2) do |config|

    #
    # Enable `vagrant-cachier` to cache APT packages for multiple machine environment.
    #
    if Vagrant.has_plugin?('vagrant-cachier')
        puts "INFO:  Vagrant-cachier plugin detected. Optimizing caches."
        config.cache.scope = :box
        config.cache.enable :apt
        config.cache.enable :apt_lists
    else
        # Need to run "vagrant putty install vagrant-cachier" in order to use vagrant cachier
        puts 'WARN:  Vagrant-cachier plugin not detected. Continuing unoptimized.'
    end

    servers.each do |opts|
        config.vm.define opts[:name] do |config|
            config.vm.box = opts[:box]
            config.vm.hostname = opts[:name]
            config.vm.network :private_network, ip: opts[:eth1]
            config.vm.network "forwarded_port", guest: 80, host: 8080
            ## Vagrant forwards port 22 to 2222 by default, this may be usefull to keep for other providers.
            config.vm.network "forwarded_port", guest: 22, host: 2222
            config.vm.network "forwarded_port", guest: 443, host: 4443
            config.vm.provider "virtualbox" do |v|
                v.name = opts[:name]
                v.customize ["modifyvm", :id, "--memory", opts[:mem]]
                v.customize ["modifyvm", :id, "--cpus", opts[:cpu]]
            end # Provision

            #
            # Disable auto update of Vagrant Guest Editions.  Speeds up the "vagrant up" process
            #
            if Vagrant.has_plugin?("vagrant-vbguest")
                config.vbguest.auto_update = false
                # config.vm.synced_folder ".", "/Vagrant", :owner => "_apt", :group => "root"
                config.vm.provision "shell", path: "config/vagrant_lamp.sh"
                config.cache.synced_folder_opts = {
                     owner: "_apt",
                     group: "_apt"
                }
            end

            # Install Docker
            # config.vm.provision :shell, inline: "sudo apt update -y && sudo apt-get install -y docker.io"

            # Install Docker-Compose
            #config.vm.provision :shell, inline: "sudo curl -L \"https://github.com/docker/compose/releases/download/1.25.4/docker-compose-$(uname -s)-$(uname -m)\" -o /usr/local/bin/docker-compose && sudo chmod +x /usr/local/bin/docker-compose"

            # Configure vagrant user to run Docker
            #config.vm.provision :shell, inline: "sudo usermod -aG docker vagrant"

            # TODO: Start docker ubuntu and provision???
            # Provision docker
            # config.vm.provision "shell", path: "config/lamp.sh"

            # config.vm.provision :shell, inline: "sudo mkdir /var/www/cat"
            # config.vm.provision :shell, inline: "sudo chown -R $USER:$USER /var/www/cat"
            # config.vm.provision :shell, inline: "ssudo chmod -R 755 /var/www/your_domain"
            # config.vm.provision :shell, inline: "ssudo chmod -R 755 /var/www/your_domain"

        end
    end
end

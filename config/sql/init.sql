-- Author: Michael Anderton
-- Contact: michaelanderton41@gmail.com

-- CREATE DATABASE IF NOT EXISTS dev;
CREATE DATABASE IF NOT EXISTS db_cat;
USE db_cat;
-- Avoids FK errors when trucating tables
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- SET sql_notes = 0;      -- Temporarily disable the "Table already exists" warning

-- Organization Table
-- org_domain (Commercial, Government)
CREATE TABLE IF NOT EXISTS `tblOrganization` (

  `id`         int(11)       NOT NULL auto_increment,
  `org_name`   varchar(100)  NOT NULL default '',
  `org_domain` varchar(20)   NOT NULL default '',
   PRIMARY KEY (`id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;
TRUNCATE TABLE `tblOrganization`; -- Removes all rows

-- User Table
CREATE TABLE IF NOT EXISTS `tblUser` (

  `id`            int(11)      NOT NULL auto_increment,
  `user_type`     varchar(5)   NOT NULL default '',
  `user_password` char(64)     NOT NULL default '',
  `user_fname`    varchar(50)  NOT NULL default '',
  `user_lname`    varchar(50)  NOT NULL default '',
  `user_email`    varchar(50)  NOT NULL default '',
  `user_phone`    varchar(50)  NOT NULL default '',
  `user_org`      varchar(50)  NOT NULL default '',
   PRIMARY KEY  (`id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;
TRUNCATE TABLE `tblUser`; -- Removes all rows

-- User Type Table
CREATE TABLE IF NOT EXISTS `tblUserType` (

  `id`         int(11)      NOT NULL auto_increment,
  `user_type`  varchar(10)  NOT NULL default '',
   PRIMARY KEY (`id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;
TRUNCATE TABLE `tblUserType`; -- Removes all rows

-- Analyst Table
CREATE TABLE IF NOT EXISTS `tblAnalyst` (

  `id`               int(11)      NOT NULL auto_increment,
  `analyst_uname`    varchar(20)  NOT NULL default '',
  `analyst_password` char(64)     NOT NULL default '',
  `analyst_email`    varchar(50)  NOT NULL default '',
   PRIMARY KEY (`id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;
TRUNCATE TABLE `tblAnalyst`; -- Removes all rows

-- Ticket table
-- analyst_id 0 == Unassigned
-- ticket_status (Pending, Active, Closed)
CREATE TABLE IF NOT EXISTS `tblTicket` (

  `id`              int(11)        NOT NULL auto_increment,
  `user_id`         int(11)        NOT NULL default 0,
  `analyst_id`      int(11)        NOT NULL default 0,        
  `ticket_class`    varchar(20)    NOT NULL default '',
  `ticket_status`   varchar(20)    NOT NULL default 'Pending',
  `ticket_severity` varchar(20)    NOT NULL default '',
  `ticket_category` varchar(20)    NOT NULL default '',
  `ticket_text`     varchar(1500)  NOT NULL default '',
  `ticket_created`  TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticket_modified` TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id`),
   FOREIGN KEY (`user_id`) REFERENCES `tblUser`(`id`),
   FOREIGN KEY (`analyst_id`) REFERENCES `tblAnalyst`(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
TRUNCATE TABLE `tblTicket`; -- Removes all rows

-- SET sql_notes = 1;      -- And then re-enable the warning again
exit;

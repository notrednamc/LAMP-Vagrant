-- Author: Michael Anderton
-- Contact: michael.anderto@grayanalytics.com

-- This script creates stored procedures to be used to display information

-- Switch to Cyber Assist DB
USE db_cat;

-- Proc for User table on dashboard page
CREATE PROCEDURE `GET_DASH_USERS`() NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT id, user_fname, user_lname, user_email, user_phone, user_password, user_org FROM tblUser;

-- Proc for Open Event Ticket Table on dashboard page
CREATE PROCEDURE `GET_DASH_OPEN_TICKETS`() NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT id, ticket_class, ticket_status, ticket_severity, ticket_category FROM tblTicket WHERE NOT ticket_status = "Pending";

-- Proc for Pending Event Ticket Table on dashboard page
CREATE PROCEDURE `GET_DASH_PENDING_TICKETS`() NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT tblTicket.id, tblTicket.ticket_class, tblTicket.ticket_status, tblTicket.ticket_category, tblAnalyst.analyst_uname FROM tblTicket LEFT JOIN tblAnalyst ON tblTicket.id = tblAnalyst.id  WHERE tblTicket.ticket_status = "Pending";

exit;
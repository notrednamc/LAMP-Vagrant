-- Author: Michael Anderton
-- Contact: michael.anderto@grayanalytics.com

--
-- Populate the user table with dummy data.
-- Default Password is "test" and sha256 hash is 9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08
--
USE db_cat;
INSERT INTO `tblUser`
  (`user_type`, `user_password`, `user_fname`, `user_lname`, `user_email`, `user_org`) VALUES
  ('ADMIN', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'Robin', 'Jackman', 'robert.jackman@companya.com', 'Company A'),
  ('USER', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'Taylor', 'Edward', 'taylor.edward@companya.com', 'Company A'),
  ('ADMIN', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'Road', 'Runner', 'road.runner@acme.com', 'Acme'),
  ('USER', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'Wiley', 'Cyote', 'wiley.cyote@acme.com', 'Acme'),
  ('ADMIN', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'Harry', 'Clifford', 'harry.clifford@telemericacorp.com', 'TelemeriaCorp'),
  ('USER', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'Nancy', 'Newman', 'nancy.newman@telemericacorp.com', 'TelemeriaCorp'),
  ('ADMIN', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'Yoda', '', 'yoda@rebellion.com', 'Rebellion'),
  ('USER', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'Luke', 'Skywalker', 'anikin.skywalker@rebellion.com', 'Rebellion'),
  ('ADMIN', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'Emperor', 'Palpatine', 'emperor.palpatine@empire.com', 'Empire'),
  ('USER', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'Anikin', 'Skywalker', 'anikin.skywalker@empire.com', 'Empire');


--
-- Populate the user type table with dummy data.
--
INSERT INTO `tblUserType`
  (`user_type`) VALUES
  ('USER'),
  ('ADMIN'),
  ('SYSADMIN');

--
-- Populate the Analyst table with dummy data.
--
INSERT INTO `tblAnalyst`
  (`analyst_uname`, `analyst_password`, `analyst_email`) VALUES
  ('manderton', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'michael.anderton@grayanalytics.com'),
  ('kturner', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'kevin.turner@grayanalytics.com'),
  ('djarmon', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'david.jarmon@grayanalytics.com'),
  ('dunruh', '9F86D081884C7D659A2FEAA0C55AD015A3BF4F1B2B0B822CD15D6C15B0F00A08', 'david.unruh@grayanalytics.com');

--
-- Populate the organization table with dummy data.
--
INSERT INTO `tblOrganization`
 (`org_name`, `org_domain`) VALUES 
 ('Acme', 'Commercial'), 
 ('Company A', 'Commercial'),
 ('TelemeriaCorp', 'Commercial'),
 ('Rebellion', 'Government'),
 ('Empire', 'Government');

--
-- Populate the ticket table with dummy data.
--
INSERT INTO `tblTicket`
 (`user_id`, `analyst_id`, `ticket_class`, `ticket_status`, `ticket_severity`, `ticket_category`, `ticket_text`) VALUES 
 (2, 1, 'Exercise', 'Pending', '', 'Phish', 'Phishing email was received!'),
 (3, 1, 'Real World', 'Active', 'Moderate', 'Social Engineering', 'Reports of suspicious persons asking employees questions about personal information.'),
 (6, 2, 'Other', 'Closed', 'Severe', 'Data Loss', 'Company databases were breached and data was lost, conifrmed by SIEM tool.'), 
 (7, 3, 'Exercise', 'Closed', 'High', 'Malware', 'User noticed PC performance degrading, processes viewer shows malicious.exe running.'),
 (8, 4, 'Real World', 'Active', 'Low', 'Weather', 'There is a potential for hurricane is immenent'),
 (9, 2, 'Other', 'Pending', '', 'Phishing', 'Company CEO received suspicious email from suspicious domain evil.com.');

-- INSERT INTO `meeting_user`
--   (`user_id`, `username`, `password`) VALUES
--   (NULL, 'm_admin', 'm_admin'),
--   (3, 'm_taylor', 'm_taylor'),
--   (4, 'm_vivian', 'm_vivian'),
--   (6, 'm_melinda', 'm_melinda'),
--   (7, 'm_harley', 'm_harley');


-- INSERT INTO `telephone`
--   (`employee_id`, `type`, `no`) VALUES
--   (1, 'mobile',   '245-249697'),
--   (2, 'mobile',   '270-235969'),
--   (2, 'land',     '325-888885'),
--   (3, 'mobile',   '270-684972'),
--   (4, 'mobile',   '245-782365'),
--   (4, 'land',     '325-888886'),
--   (5, 'mobile',   '245-537891'),
--   (6, 'mobile',   '270-359457'),
--   (7, 'mobile',   '245-436589'),
--   (7, 'land',     '325-888887'),
--   (8, 'mobile',   '245-279164'),
--   (8, 'land',     '325-888888');

-- INSERT INTO `education` (`name`) VALUES ('BSc'), ('MSc'), ('PhD');

-- INSERT INTO `employee_education`
--   (`employee_id`, `education_id`) VALUES
--   (1, 1),
--   (2, 1),
--   (3, 2),
--   (3, 3);

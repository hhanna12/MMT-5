ALTER TABLE users
ADD COLUMN research_allowed TINYINT(1) DEFAULT 0 AFTER phone;
--1 = yes
--0 = no

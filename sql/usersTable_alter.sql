ALTER TABLE users
ADD COLUMN research_allowed TINYINT(1) AFTER phone;
--1 = yes
--0 = no

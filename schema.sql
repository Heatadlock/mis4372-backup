-- Program Name: schema.sql
-- Author: Harrison Tadlock
-- Date Created: April 07, 2026
-- Date Modified: May 12, 2026
-- Version Number: 1.1
-- Description: creates mis 4372 database and tables associated
-- Changes:
-- 05/12/2026: 1.1 | remade sql table in VE, table name changed

CREATE DATABASE IF NOT EXISTS mis4372;
USE mis4372;

CREATE TABLE patients (
    id INT(9) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30),
    middle_initial CHAR(1),
    last_name VARCHAR(30),
    remember_me TINYINT(1),
    birthday DATE,
    ssn_hash VARCHAR(255),
    address1 VARCHAR(100),
    address2 VARCHAR(100),
    city VARCHAR(50),
    state VARCHAR(2),
    zipcode VARCHAR(10),
    email VARCHAR(100),
    phone VARCHAR(20),
    symptoms TEXT,
    conditions_list TEXT,
    health_rating TINYINT,
    sex VARCHAR(20),
    insured_status VARCHAR(20),
    form_filler VARCHAR(20),
    user_id VARCHAR(20),
    password_hash VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) AUTO_INCREMENT = 1;

-- End of file: schema.sql
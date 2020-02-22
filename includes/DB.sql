CREATE TABLE users (
    user_id int(11) AUTO_INCREMENT PRIMARY KEY not NULL,
    user_company varchar(256) not null,
    user_fName varchar(256) not null,
    user_lName varchar(256) not null
);

INSERT INTO users (users_company, user_fName, user_lName) VALUES (company, firstName, lastName);
show databases; 

CREATE DATABASE database_Linkedin; 

show databases; 

use database_Linkedin; 

CREATE TABLE users( 

id integer, 
first_name VARCHAR(20), 
last_name VARCHAR(20), 
password VARCHAR(30), 
constraint primary key(id)

);

create table connections( 

user1 integer NOT NULL, 
user2 integer, 

constraint connections_usr1fk foreign key (user1)
references users(id), 

constraint connections_usr2fk foreign key (user2)
references users(id)

);

create table company( 
id integer, 
name varchar(30),
city varchar(30),
constraint company_pk primary key(id)
);

CREATE TABLE experience(
    Id INTEGER,
    user INTEGER,
    start DATE,
    end DATE,
    position VARCHAR (50),
    company INTEGER,
    
    CONSTRAINT exp_pk PRIMARY KEY (id),        
    CONSTRAINT exp_user_fk FOREIGN KEY (user) 
    REFERENCES users (id)
);


CREATE TABLE education (
Id INTEGER,
user_id INTEGER,
ename VARCHAR(30) NOT NULL, start DATE,
end DATE,
CONSTRAINT education_pk PRIMARY KEY (ID),
CONSTRAINT education_fk_user FOREIGN KEY (user_id) REFERENCES USERS (ID)
);

CREATE TABLE post (
    id INTEGER,
    author_comp INTEGER,
    author_usr INTEGER,
    date DATE,
    text VARCHAR (300),
    
    CONSTRAINT post_pk PRIMARY KEY (id),
    
    CONSTRAINT post_comp_fk FOREIGN KEY (author_comp) 
    REFERENCES company (id)
    ON DELETE CASCADE,
    
    CONSTRAINT post_usr_fk FOREIGN KEY (author_usr) 
    REFERENCES users (id)
);
CREATE TABLE comments(
    Id INTEGER,
    text VARCHAR(200),
    date DATE,
    CONSTRAINT comment_pk PRIMARY KEY (id)
);

CREATE TABLE worksin (
company INTEGER,
user INTEGER,
CONSTRAINT worksin_pk PRIMARY KEY (company, user),
CONSTRAINT worksin_company_e FOREIGN KEY (company) REFERENCES company (id) ON
DELETE CASCADE,
CONSTRAINT worksin_user_e FOREIGN KEY (user) REFERENCES users (id) );


CREATE TABLE comments_likes(
    user INTEGER,
    comment INTEGER,
    
    CONSTRAINT comm_like_usr_fk FOREIGN KEY (user) 
    REFERENCES users (id),
    
    CONSTRAINT comm_like_comp_fk FOREIGN KEY (comment) 
    REFERENCES comments (id)
);
show databases;

use database_Linkedin;

show tables;
SELECT * FROM users;
SELECT * FROM experience;




SELECT * FROM company;
INSERT INTO company (ID, city, name)
VALUES
  (1, 'New York', 'ABC Tech'),
  (2, 'San Francisco', 'Tech Solutions Inc.'),
  (3, 'Los Angeles', 'Data Innovators'),
  (4, 'Chicago', 'Web Wizards'),
  (5, 'Houston', 'Future Systems'),
  (6, 'Boston', 'CodeCrafters'),
  (7, 'Seattle', 'InfoMatrix'),
  (8, 'Austin', 'Digital Creations'),
  (9, 'Denver', 'SoftTech Solutions'),
  (10, 'Miami', 'Innovate IT');
  
  INSERT INTO worksin (company, user)
VALUES
  (1, 1),
  (2, 2),
  (3, 3),
  (4, 4),
  (5, 5),
  (6, 6),
  (7, 7),
  (8, 8),
  (9, 9),
  (10, 10);
  

SELECT * FROM company;
  
ALTER TABLE company
DROP FOREIGN KEY company_manager_fk;
ALTER TABLE company
DROP COLUMN manager;

SELECT * FROM company;

SELECT * FROM education;

-- Insert connections between users
INSERT INTO connect (user_id1, user_id2)
VALUES
  (1, 2),  -- User 1 is connected to User 2
  (1, 3),  -- User 1 is connected to User 3
  (2, 4),  -- User 2 is connected to User 4
  (3, 4),  -- User 3 is connected to User 4
  (4, 5),  -- User 4 is connected to User 5
  (5, 6),  -- User 5 is connected to User 6
  (6, 7),  -- User 6 is connected to User 7
  (7, 8),  -- User 7 is connected to User 8
  (8, 9),  -- User 8 is connected to User 9
  (9, 10); -- User 9 is connected to User 10
  
  
SELECT * FROM users;
show tables; 

SELECT users.first_name, users.last_name, experience.position, company.name
FROM users
JOIN experience ON users.id = experience.user
JOIN company ON experience.company = company.id;



SELECT company.name, education.ename
FROM company
JOIN education ON company.id = education.user_id;

SELECT users.first_name, users.last_name, experience.position, company.name
FROM users
JOIN experience ON users.id = experience.user
JOIN company ON experience.company = company.id;

SELECT company.name, education.ename
FROM company
JOIN education ON company.id = education.user_id;

SELECT users.id, users.first_name, users.last_name, SUM(DATEDIFF(end, start)) AS total_experience_years
FROM users
JOIN experience ON users.id = experience.user
GROUP BY users.id, users.first_name, users.last_name
ORDER BY users.id;


SELECT company.name, SUM(DATEDIFF(end, start)) AS total_education_years
FROM company
JOIN education ON company.id = education.user_id
GROUP BY company.name
ORDER BY company.name;



ALTER TABLE experience
ADD CONSTRAINT valid_date_range CHECK (start < end);

SELECT * FROM experience;

INSERT INTO experience (id, user, start, end, position, company)
VALUES (100, 1, '2022-01-01', '2023-01-01', 'Software Developer', 1);

SELECT * FROM experience;

SELECT * FROM experience WHERE id = 100;

SELECT * FROM experience;
use database_Linkedin; 

SELECT * FROM experience;
SELECT * FROM users;


SELECT * FROM education;

DELETE FROM education
WHERE id = 102;


SELECT * FROM education;

SELECT *
FROM users
JOIN education ON users.id = education.user_id;

SELECT * FROM users;





SELECT *
FROM users
JOIN education ON users.id = education.user_id;


show tables;
SELECT * FROM company;


SELECT users.id, users.first_name, users.last_name, AVG(YEAR(education.end) - YEAR(education.start)) AS average_education_years
FROM users
JOIN education ON users.id = education.user_id
GROUP BY users.id, users.first_name, users.last_name;



ALTER TABLE education ADD CONSTRAINT edu_date_check CHECK (end > start);
INSERT INTO education (Id, user_id, ename, start, end) VALUES (11, 1, 'Example University', '2023-01-01', '2022-01-01');



ALTER TABLE users ADD CONSTRAINT users_first_name_check CHECK (first_name <> '');
ALTER TABLE users ADD CONSTRAINT users_last_name_check CHECK (last_name <> '');

INSERT INTO users (id, first_name, last_name, password) VALUES (11, '', 'Doe', 'password123');
INSERT INTO users (id, first_name, last_name, password) VALUES (12, 'John', '', 'password123');
SELECT * FROM worksin;


INSERT INTO education (ID, user_id, ename, start, end) VALUES (1, 1, 'University of Example', '2015-09-01', '2019-06-30');
INSERT INTO education (ID, user_id, ename, start, end) VALUES (2, 2, 'Example State College', '2016-09-01', '2020-06-30');
INSERT INTO education (ID, user_id, ename, start, end) VALUES (3, 3, 'Institute of Technology', '2014-09-01', '2018-06-30');
INSERT INTO education (ID, user_id, ename, start, end) VALUES (4, 4, 'Example Business School', '2017-09-01', '2021-06-30');
INSERT INTO education (ID, user_id, ename, start, end) VALUES (5, 5, 'Example University', '2013-09-01', '2017-06-30');
INSERT INTO education (ID, user_id, ename, start, end) VALUES (6, 6, 'College of Example', '2018-09-01', '2022-06-30');
INSERT INTO education (ID, user_id, ename, start, end) VALUES (7, 7, 'Example Arts Academy', '2012-09-01', '2016-06-30');
INSERT INTO education (ID, user_id, ename, start, end) VALUES (8, 8, 'Example Engineering Institute', '2019-09-01', '2023-06-30');
INSERT INTO education (ID, user_id, ename, start, end) VALUES (9, 9, 'Example Medical College', '2011-09-01', '2015-06-30');
INSERT INTO education (ID, user_id, ename, start, end) VALUES (10, 10, 'Example Law School', '2020-09-01', '2024-06-30');



INSERT INTO user (ID, name, password) VALUES (1, 'Alice Johnson', 'pass123');
INSERT INTO user (ID, name, password) VALUES (2, 'Bob Smith', 'bob2023');
INSERT INTO user (ID, name, password) VALUES (3, 'Carol White', 'carolpw');
INSERT INTO user (ID, name, password) VALUES (4, 'David Brown', 'davidb');
INSERT INTO user (ID, name, password) VALUES (5, 'Eve Davis', 'evepass');
INSERT INTO user (ID, name, password) VALUES (6, 'Frank Miller', 'frankm');
INSERT INTO user (ID, name, password) VALUES (7, 'Grace Lee', 'grace123');
INSERT INTO user (ID, name, password) VALUES (8, 'Henry Wilson', 'henryw');
INSERT INTO user (ID, name, password) VALUES (9, 'Irene Taylor', 'irenet');
INSERT INTO user (ID, name, password) VALUES (10, 'John Doe', 'johnd');

ALTER TABLE `users`
ADD CONSTRAINT user_password_chk CHECK (LENGTH(password) >= 8 AND password REGEXP '[A-Za-z]' AND password REGEXP '[0-9]');

INSERT INTO `users` (id, first_name, password) VALUES (15, 'John Doe', '1234567');









SELECT users.id, users.first_name, users.last_name, SUM(DATEDIFF(end, start)) AS total_experience_years
FROM users
JOIN experience ON users.id = experience.user
GROUP BY users.id, users.first_name, users.last_name
ORDER BY users.id;


ALTER TABLE experience ADD CONSTRAINT exp_date_check CHECK (end > start);
INSERT INTO experience (ID, user, start, end, position) VALUES (11, 1, '2023-01-01', '2022-01-01', 'Developer');



ALTER TABLE experience ADD CONSTRAINT exp_position_check CHECK (position <> '');

INSERT INTO experience (ID, user, start, end, position) VALUES (11, 1, '2023-01-01', '2023-12-31', '');



ALTER TABLE experience ADD CONSTRAINT exp_position_length_check CHECK (CHAR_LENGTH(position) >= 3);
INSERT INTO experience (ID, user, start, end, position) VALUES (13, 1, '2023-01-01', '2023-12-31', 'De');

describe users;


use database_Linkedin;

show tables;

SELECT * FROM users;

SELECT * FROM experience;

show tables;

use database_Linkedin;
show tables;

SELECT * FROM experience;

ALTER TABLE post DROP FOREIGN KEY post_usr_fk;
ALTER TABLE users MODIFY id INT AUTO_INCREMENT;

ALTER TABLE comments_likes DROP FOREIGN KEY comm_like_usr_fk;
ALTER TABLE users MODIFY id INT AUTO_INCREMENT;

ALTER TABLE connect DROP FOREIGN KEY connect_e_user1;
ALTER TABLE users MODIFY id INT AUTO_INCREMENT;

ALTER TABLE education DROP FOREIGN KEY education_fk_user;

use database_Linkedin;



show tables;

describe comments;

show tables;
describe education; 
describe users;

SELECT *
FROM users
JOIN education ON users.id = education.user_id
WHERE education.start >= '2023-01-01' AND education.end <= '2023-12-31'
LIMIT 1000000;



-- Generate dummy data for the "users" table in MySQL
INSERT INTO users (id, first_name, last_name, password)
SELECT
    @id := @id + 1 AS id,
    CONCAT('First', @id, 'Name') AS first_name,
    CONCAT('Last', @id, 'Name') AS last_name,
    CONCAT('user', @id, 'password123') AS password
FROM
    (SELECT @id := 0) AS dummy
CROSS JOIN
    information_schema.tables
LIMIT 1000000;



SELECT 
    CONSTRAINT_NAME, 
    CONSTRAINT_TYPE, 
    COLUMN_NAME 
FROM 
    INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
WHERE 
    TABLE_SCHEMA = 'database_Linkedin' 
    AND TABLE_NAME = 'users';




SELECT * FROM users;



SELECT * FROM education;
describe education;



SELECT * FROM education;

ALTER TABLE education MODIFY ename VARCHAR(255);


SELECT * FROM education;

SELECT *
FROM users
JOIN education ON users.id = education.user_id
WHERE education.start >= '2023-01-01' AND education.end <= '2023-12-31'
LIMIT 1000000;






-- Create an index on the 'first_name' column of the 'users' table
CREATE INDEX idx_users_first_name ON users (first_name);

-- Create an index on the 'last_name' column of the 'users' table
CREATE INDEX idx_users_last_name ON users (last_name);


describe education;

ALTER TABLE `education` ADD INDEX `idx_user_id` (`user_id`);
ALTER TABLE `education` ADD INDEX `idx_ename` (`ename`);
ALTER TABLE `education` ADD INDEX `idx_start` (`start`);
ALTER TABLE `education` ADD INDEX `idx_end` (`end`);

SELECT *
FROM users
JOIN education ON users.id = education.user_id
WHERE education.start >= '2023-01-01' AND education.end <= '2023-12-31'
LIMIT 1000000;

SELECT *
FROM comments
JOIN posts ON comments.post_id = posts.id
WHERE posts.creation_date >= 'YYYY-MM-DD' AND comments.creation_date <= 'YYYY-MM-DD'
LIMIT 1000000;

describe post;


SELECT * FROM post;


ALTER TABLE comments
ADD COLUMN post_id INT,
ADD FOREIGN KEY (post_id) REFERENCES post(id);



SELECT * 
FROM comments 
JOIN post ON comments.post_id = post.id 
WHERE post.date >= '2018-09-15' AND comments.date <= '2018-09-15' 
LIMIT 1000000;

describe post;
describe comments;


SELECT *
FROM post
JOIN comments ON post.id = comments.post_id
WHERE post.date >= '2020-12-30' AND comments.date <= '2020-12-01'
LIMIT 1000000;


insert into post (id, author_comp, author_usr, date, text) values (1000, 1000, 1000, '2018-09-15', 'Nucifraga columbiana');


SELECT * FROM post;
SELECT * FROM experience;
describe experience;


SELECT *
FROM users
JOIN experience ON users.id = experience.id
WHERE experience.start >= '2020-12-30'
LIMIT 1000000;








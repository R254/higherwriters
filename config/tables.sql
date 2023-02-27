CREATE TABLE users(user_id int auto_increment primary key,f_name varchar(100),
	l_name varchar(100),email varchar(100),proffession varchar(300),pass text,role text);

ALTER TABLE users ADD COLUMN country varchar(100) AFTER proffession;

ALTER TABLE users ADD COLUMN description text AFTER country;
-- The below alt will be added
ALTER TABLE users ADD COLUMN rate text AFTER description;

CREATE TABLE projects(project_id int auto_increment primary key, title text, body text, date_posted date);
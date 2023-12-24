/*Student Name: Naman Sharma*/
/*Student Id: 8837689*/

DROP DATABASE IF EXISTS sharma89; /*drop database if it exists*/
CREATE DATABASE sharma89; /*Create the database*/


use sharma89;




DROP TABLE IF EXISTS student; /*Drop student table if it exists */
/*Create student table*/
CREATE TABLE student(
	student_id varchar(10) primary key,
    student_name varchar(255) NOT NULL,
    student_email varchar(255) NOT NULL
); 

/*Insert data in student table*/
INSERT INTO student Values(8837689, "Naman", "nsharma7689@conestogac.on.ca");
INSERT INTO student Values(8837696,"Sid", "spandya7696@conestogac.on.ca");
INSERT INTO student Values(8837710, "Vinay", "vprajapati7710@conestogac.on.ca");




DROP TABLE IF EXISTS db; /*Drop db table if it exists */
/*Create db table*/
CREATE TABLE db(
	id varchar(10) primary key,
    course_title varchar(50),
    letter_grade char(5),
    student_id varchar(10),
    FOREIGN KEY (student_id) REFERENCES student(student_id)
);

/*Insert data in db table*/
INSERT INTO db Values("1", "SQL", "B+", "8837689");
INSERT INTO db Values("2", "Python", "A", "8837696");
INSERT INTO db Values("3", "Atlas", "B", "8837710");




DROP TABLE IF EXISTS javascript;/*Drop javascript table if it exists */
/*Create javascript table*/
CREATE TABLE javascript(
	id varchar(10) primary key,
    course_title varchar(50),
    letter_grade char(5),
    student_id varchar(10),
    FOREIGN KEY (student_id) REFERENCES student(student_id)
);

/*Insert data in javascript table*/
INSERT INTO javascript Values("1", "React", "A", "8837689");
INSERT INTO javascript Values("2", "Vuforia", "B", "8837696");
INSERT INTO javascript Values("3", "Nodeman", "A+", "8837710");
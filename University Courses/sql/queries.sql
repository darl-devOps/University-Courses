-- Query to create database
CREATE DATABASE University Courses_assignment_2023;

-- Query to create users table
CREATE TABLE users(
     username VARCHAR(50) NOT NULL, 
     password VARCHAR(50) NOT NULL );

-- Query to insert username and password into table
INSERT INTO users(username, password)
 VALUES ('kwahbor@University Courses','University Courses');

-- Query to create the courses table
CREATE TABLE courses (
    id INT(11) NOT NULL AUTO_INCREMENT,
    course_title VARCHAR(255) NOT NULL,
    course_code VARCHAR(10) NOT NULL,
    course_level VARCHAR(20) NOT NULL,
    school_faculty VARCHAR(255) NOT NULL,
    tuition_fees INT(11) NOT NULL,
    students_enrolled INT(11),
    avg_grade FLOAT(3, 2),
    international_students INT(11),
    local_students INT(11),
    PRIMARY KEY (id)
);

-- Query to add 3 more columns to the courses table
ALTER TABLE courses
ADD starting_date DATE,
ADD duration INT,
ADD location VARCHAR(255);

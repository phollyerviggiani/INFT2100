/*
Patrick Hollyer-Viggiani
03_create_courses_table.sql
11 October, 2024
INFT2100
*/


-- Dropping the table if it exists
DROP TABLE IF EXISTS courses;

-- Creating the courses table
CREATE TABLE courses (
    course_code VARCHAR(10) PRIMARY KEY,
    course_description VARCHAR(255),
    semester INT
);

SELECT * FROM courses;
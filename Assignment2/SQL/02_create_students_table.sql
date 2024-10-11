/*
Patrick Hollyer-Viggiani
02_create_students_table.sql
11 October, 2024
INFT2100
*/

-- Dropping table if it exists
DROP TABLE IF EXISTS students;

-- Creating students table
CREATE TABLE students (
    student_id INT PRIMARY KEY,
    user_id INT,
    program_code VARCHAR(10),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

SELECT * FROM students;
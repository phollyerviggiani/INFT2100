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
    program_code VARCHAR(10),
    user_id INT REFERENCES users(user_id) ON DELETE CASCADE
);

SELECT * FROM students;
/*
Patrick Hollyer-Viggiani
02_create_students_table.sql
11 October, 2024
INFT2100
*/

-- Dropping table if it exists
DROP TABLE IF EXISTS students;

-- Create student table
CREATE TABLE students (
    student_id INT PRIMARY KEY DEFAULT NULL,
    program_code VARCHAR(10),
    user_id INT REFERENCES users(user_id) ON DELETE CASCADE,
    CONSTRAINT fk_student_user CHECK (student_id = user_id OR student_id IS NOT DISTINCT FROM user_id)
);

SELECT * FROM students;
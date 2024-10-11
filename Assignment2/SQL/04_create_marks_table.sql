/*
Patrick Hollyer-Viggiani
04_create_marks_table.sql
11 October, 2024
INFT2100
*/

-- Dropping table if it exists
DROP TABLE IF EXISTS marks;

-- Create the marks table desired structure
CREATE TABLE marks (
    student_id INT REFERENCES students(student_id) ON DELETE CASCADE,
    course_code VARCHAR(255) REFERENCES courses(course_code) ON DELETE CASCADE, 
    final_mark DECIMAL(5,2) CHECK (final_mark >= 0 AND final_mark <= 100), 
    achieved_at TIMESTAMP DEFAULT NOW(), 
    PRIMARY KEY (student_id, course_code, achieved_at)

);

SELECT * FROM marks;
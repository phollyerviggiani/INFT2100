/*
Patrick Hollyer-Viggiani
09_crud_examples.sql
11 October, 2024
INFT2100
*/

-- INSERT Example for Users:
-- Inserting three new users into the users table
INSERT INTO users (first_name, last_name, email, birth_date, last_access, password) VALUES
('John', 'Doe', 'john.doe@example.com', '1998-03-15', NOW(), crypt('password123', gen_salt('bf'))),
('Jane', 'Smith', 'jane.smith@example.com', '1997-05-22', NOW(), crypt('password456', gen_salt('bf'))),
('Alice', 'Johnson', 'alice.johnson@example.com', '1996-12-10', NOW(), crypt('password789', gen_salt('bf')));

-- SELECT Example without a WHERE clause:
-- Retrieve all users information in the users table
SELECT * FROM users;

-- SELECT Examples with a WHERE clause:
-- Retrieve a user's information based on their email.
SELECT * FROM users WHERE email = 'john.doe@example.com';

-- Retrieve all users’ first_name, last_name, email based on their user_id.
SELECT first_name, last_name, email FROM users WHERE user_id = 100900050;

-- SELECT Examples with an ORDER BY clause:
SELECT first_name, last_name, user_id, created_at, last_access 
FROM users 
ORDER BY last_access DESC;

-- UPDATE Example with a WHERE clause:
UPDATE users 
SET last_access = NOW() 
WHERE user_id = 100900050;

-- Update the first_name field for a user based on their email.
UPDATE users 
SET first_name = 'Johnathan' 
WHERE email = 'john.doe@example.com';

-- DELETE Example with a WHERE clause:
DELETE FROM users WHERE user_id = 100900051;

-- Delete one of your new users from above based on their last_name and first_name fields
DELETE FROM users WHERE last_name = 'Johnson' AND first_name = 'Alice';

-- INSERT a new course into the courses table.
INSERT INTO courses (course_code, course_description, semester) VALUES
('COSC 3456', 'Data Structures', 6);

-- SELECT students with marks greater than 80.
SELECT u.first_name, u.last_name, m.course_code, m.final_mark
FROM students s
JOIN users u ON s.user_id = u.user_id
JOIN marks m ON s.student_id = m.student_id 
WHERE m.final_mark > 80;

-- UPDATE a course description for the new course based on its course_code.
UPDATE courses 
SET course_description = 'Data Structures and Algorithms'
WHERE course_code = 'COSC 3456';

-- DELETE a student based on the student_id.
DELETE FROM students WHERE student_id = 51;

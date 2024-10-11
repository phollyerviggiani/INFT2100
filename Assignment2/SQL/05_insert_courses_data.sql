/*
Patrick Hollyer-Viggiani
05_insert_courses_data.sql
11 October, 2024
INFT2100
*/

-- Semester 1
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('COMM 1100', 'Communication Foundations', 1);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('COMP 1116', 'Computer Systems - Hardware', 1);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('COSC 1100', 'Introduction to Programming', 1);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 1104', 'Data Communications and Networking 1', 1);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 1105', 'Introduction to Databases', 1);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('MATH 1114', 'Mathematics for IT', 1);

-- Semester 2
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('COSC 1200', 'Object-Oriented Programming 1', 2);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('GNED 0001', 'General Education Elective 1', 2);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 1206', 'Web Development - Fundamentals', 2);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 1207', 'Software Testing and Automation', 2);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('MGMT 1223', 'Systems Development 1', 2);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('MGMT 1224', 'Business for IT Professionals', 2);

-- Semester 3
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('COMM 2109', 'IT Career Essentials', 3);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('COSC 2100', 'Object-Oriented Programming 2', 3);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('GNED 0002', 'General Education Elective 2', 3);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 2100', 'Web Development Intermediate', 3);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 2101', 'Database Development 1', 3);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('MGMT 2107', 'Systems Development 2', 3);

-- Semester 4
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('COSC 2200', 'Object-Oriented Programming 3', 4);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('GNED 0003', 'General Education Elective 3', 4);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 2200', 'Mainframe Development 1', 4);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 2201', 'Web Development - Enterprise', 4);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 2202', 'Web Development - Client Side Script', 4);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 2203', 'Cloud Technology Fundamentals', 4);

-- Semester 5
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 3100', 'Mainframe Development 2', 5);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 3101', 'Mobile Development', 5);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 3102', 'Web Development - Frameworks', 5);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 3103', 'Emerging Technologies', 5);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 3104', 'Cloud Technology for Developers', 5);

-- Semester 6
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('CPGA 3200', 'Capstone Project', 6);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('CPGA 3201', 'Field Placement - CPA', 6);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 3200', 'Cloud Technology Operations', 6);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('INFT 3201', 'Database Development 2', 6);
INSERT INTO COURSES (course_code, course_description, semester) VALUES ('MGMT 3211', 'Cross-Functional Collaboration', 6);

SELECT * FROM courses;
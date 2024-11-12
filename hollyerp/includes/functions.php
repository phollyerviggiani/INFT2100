<?php

// Function to connect to the database, passing host, db_name, and password
function db_connect()
{
    return pg_connect("host=localhost dbname=hollyerp_db user=hollyerp password=100910706");
};

// Initalizing $conn to the db_connect() function for easier usage
$conn = db_connect();

// Function containing all sql statements and pg_prepare methods
function prepareStatements($conn)
{
    // 3.1 SQL code - counts if the student id exists in the database
    $sql_student_check = "SELECT COUNT(*)
                          FROM students
                          WHERE student_id = $1";

    // pg_prepare to securly prep for execution
    pg_prepare($conn, 'student_check', $sql_student_check);


    // 3.2 SQL code - joins the users and students table on user_id and displays student info
    $sql_student_info = "SELECT u.first_name, u.last_name, u.email, s.program_code
                         FROM students s 
                         JOIN users u ON s.user_id = u.user_id 
                         WHERE s.student_id = $1";

    // pg_prepare to securly prep for execution
    pg_prepare($conn, 'student_info', $sql_student_info);


    // 3.3 SQL code - joins courses and marks table, selecting the MAX of final marks
    // ordering by semester and course code for clean look
    $sql_grades = "SELECT c.semester, c.course_code, c.course_description, MAX(m.final_mark) AS max_final_mark, m.achieved_at 
                   FROM marks m 
                   JOIN courses c ON m.course_code = c.course_code 
                   WHERE m.student_id = $1 
                   GROUP BY c.course_code, c.course_description, m.achieved_at 
                   ORDER BY c.semester, c.course_code";

    // pg_prepare to securly prep for execution
    pg_prepare($conn, 'get_grades', $sql_grades);
}
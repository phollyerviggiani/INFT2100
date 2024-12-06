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

    // 3.4 SQL code - select the students information
    $sql_select_student_info = "SELECT * FROM users 
                                JOIN students 
                                USING (user_id) 
                                WHERE user_id = $1";

    // pg_prepare for the above query
    pg_prepare($conn, 'student_all_info', $sql_select_student_info);

    // 3.5 SQL code - updates the users last accessed time
    $sql_last_accessed = "UPDATE users
                          SET last_access = CURRENT_TIMESTAMP
                          WHERE user_id = $1";

    // pg_prepare to securly prep for execution
    pg_prepare($conn, 'student_last_accessed', $sql_last_accessed);

    // 3.6 SQL code - registering user + student
    $sql_register_user = "INSERT INTO users (first_name, last_name, email, birth_date, password)
                          VALUES ($1, $2, $3, $4, $5)";
    
    $sql_register_student = "INSERT INTO students (student_id, program_code, user_id) 
                             VALUES ($1, $2, $3)";

    // Prepare statement for the register user and student
    pg_prepare($conn, 'insert_user', $sql_register_user);
    pg_prepare($conn, 'insert_student', $sql_register_student);

    // 3.7 SQL code - check to see if an email exists
    $sql_check_email = "SELECT user_id
                        FROM users
                        WHERE email = $1";

    // Prepare statement for the email check
    pg_prepare($conn, 'check_email_exists', $sql_check_email);
}

// Function to display message to activity log, and actions users took
function logActivity($message) {
    $logfile = __DIR__ . '/../logs/activity.log';
    file_put_contents($logfile, "[" . date('Y-m-d H:i:s') . "] $message\n", FILE_APPEND);
}
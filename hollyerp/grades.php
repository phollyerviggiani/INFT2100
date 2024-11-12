<?php
// Variable setup for the header for proper naming of pages
$title = "Students Grades Page";
$file = "grades.php";
$description = "Grades page for displaying student grades";
$date = "November 8, 2024";
$banner = "Students Grade Portal - Grades";

// Includes on the header.php file
include("./includes/header.php");

// Retrieve student_id from the URL
if (isset($_GET['student_id'])) {
    $student_id = intval($_GET['student_id']);
} else {
    // If no id entered or format is wrong, throw this error message with example on what to type
    echo "<div class='alert alert-danger text-center mt-3'>
            <h2>Error: Please Enter Student ID in the URL</h2>
            <p>Example - ?student_id=20</p>
          </div>";

    // exit() to ensure if the logic gets to this part of the code, no further code gets executed
    exit();
}

// Step 1: Connect to Database (using the function in the functions.php file)
$conn = db_connect();

// Step 2: Prepare SQL statements (all in functions.php), passing through the connection variable
prepareStatements($conn);

// Step 3.1: Execute the SQL statement to check if the student id is in the list
$check_result = pg_execute($conn, 'student_check', array($student_id));

// If the check comes back and there is nothing there ( == 0), echo an alert message saying student ID does not exist
if (pg_fetch_result($check_result, 0, 0) == 0) {
    echo "<div class='alert alert-danger text-center mt-3'>
            <h5>Error: Student ID does not exist.</h5>
          </div>";

    // exit() to ensure if the logic gets to this part of the code, no further code gets executed
    exit();
}

// Step 3.2: Execute the SQL statement to display the students information when correct info passed
$result_info = pg_execute($conn, 'student_info', array($student_id));
$student_info = pg_fetch_assoc($result_info);

// Display student information in a heading/text style minimalist approach
echo "<div class='container mt-5'>";
echo "<div class='card shadow-sm border-0'>";
echo "<div class='card-body'>";
echo "<h2 class='card-title mb-4'>Student Information</h2>";
echo "<div class='border-bottom py-2'><strong>Full Name:</strong> " . htmlspecialchars($student_info['first_name']) . " " . htmlspecialchars($student_info['last_name']) . "</div>";
echo "<div class='border-bottom py-2'><strong>Program:</strong> " . htmlspecialchars($student_info['program_code']) . "</div>";
echo "<div class='py-2'><strong>Email:</strong> " . htmlspecialchars($student_info['email']) . "</div>";
echo "</div>";
echo "</div>";
echo "</div>";

// Step 3.3: Execute the SQL statement to return the students max grades for the classes
$results_grades = pg_execute($conn, 'get_grades', array($student_id));

// Display the grades in a table with hover property
echo "<div class='container mt-4'>";
echo "<h2>Grades</h2>";
echo "<div class='table-responsive'>";
echo "<table class='table table-hover align-middle'>"; 
echo "<thead class='table-dark'>";
echo "<tr> 
        <th scope='col'>Semester</th>
        <th scope='col'>Course Code</th> 
        <th scope='col'>Course Name</th>
        <th scope='col'>Max Final Mark</th>
        <th scope='col'>Date Achieved</th>
      </tr>";
echo "</thead>";
echo "<tbody>";

// $has_grades variable set to false as a flag to show if a student has grades yet
$has_grades = false;

// While loop to loop through the grades, setting $has_grades to true if user has grades in the database
while ($row = pg_fetch_assoc($results_grades)) {
    $has_grades = true;

    // Echoing the data into the table
    echo "<tr>
            <td>" . htmlspecialchars($row['semester']) . "</td>
            <td>" . htmlspecialchars($row['course_code']) . "</td>
            <td>" . htmlspecialchars($row['course_description']) . "</td>
            <td>" . htmlspecialchars($row['max_final_mark']) . "</td>
            <td>" . htmlspecialchars($row['achieved_at']) . "</td>
          </tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";

// If the user does NOT have grades yet (i.e. in 1st semester), the has_grades flag will still be false
// never entering the while loop, and the message will be displayed that student has no grades
if (!$has_grades) {
    echo "<div class='alert alert-info text-center mt-3'>
            <h5>No grades found for this student yet.</h5>
          </div>";
}
echo "</div>"; // Closing div
?>

<?php
// Includes on the footer.php file
include("./includes/footer.php");
?>
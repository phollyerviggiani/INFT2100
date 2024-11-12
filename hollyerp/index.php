<?php
// Variable setup for the header for proper naming of pages
$title = "Student Grades Home Page";
$file = "index.php";
$description = "Home page for INFT2100 Assignment 3";
$date = "November 8, 2024";
$banner = "Students Grade Portal";

// Includes on the header.php file
include("./includes/header.php");
?>
<?php

// Creating and styling divs, headers, p tags to look aesthetic 
// Creating the labels and text for the home page
echo "<div class='container mt-5'>
        <div class='text-center'>
        <h1 class='display-4 fw-bold'>Welcome to the Student Grades Portal</h1>
        <p class='lead text-muted'>Your central hub for viewing and managing student grades.</p>
        <hr class='my-4'>
    </div>";

// Student grade search section styling and setup
echo  "<div class='d-flex justify-content-center mt-5'>
        <div class='card shadow-sm border-0' style='max-width: 30rem;'>
            <div class='card-body text-center'>
                <h5 class='card-title mb-3 fw-semibold'>Search for Student Grades</h5>
                <p class='card-text text-muted'>Enter a student ID to view their grades.</p>";

            // Creating/setup form to take input to automatically enter in the student_id
            // to search for desired student's grades
            echo "<form action='grades.php' method='get'>
                    <div class='mb-3'>
                        <label for='student_id' class='form-label'>Student ID:</label>
                        <input type='text' class='form-control' id='student_id' name='student_id' required>
                    </div>
                    <button type='submit' class='btn btn-dark btn-lg mt-3'>Search</button>
                </form>
            </div>
        </div>
    </div>
</div>";
?>

<?php
// Includes on the footer.php file
include("./includes/footer.php");
?>

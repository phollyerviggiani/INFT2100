<?php
$title = "Grades Page";
$file = "grades.php";
$description = "Page for displaying student grades";
$date = "December 6, 2024";
$banner = "Students Grade Portal - Grades";

include('./includes/header.php');

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Display a message if not logged in
    echo '<div class="container mt-5">';
    echo '<div class="alert alert-warning text-center">You need to log in to view your grades. <a href="login.php">Login here</a></div>';
    echo '</div>';
    include('./includes/footer.php');
    exit();
}

// Retrieve logged-in user data
$user = $_SESSION['user'];
$student_id = $user['user_id'];

// Connect to the database
$conn = db_connect();
prepareStatements($conn);

// Fetch student information
$info_result = pg_execute($conn, 'student_info', [$student_id]);
$student_info = pg_fetch_assoc($info_result);

// Fetch grades information
$grades_result = pg_execute($conn, 'get_grades', [$student_id]);
?>

<div class="container mt-5">
    <h1 class="text-center">Welcome, <?php echo htmlspecialchars($student_info['first_name']); ?>!</h1>
    <p class="text-center">Here are your personal details and grades:</p>

    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <h3 class="card-title">Personal Information</h3>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($student_info['first_name'] . ' ' . $student_info['last_name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($student_info['email']); ?></p>
            <p><strong>Program Code:</strong> <?php echo htmlspecialchars($student_info['program_code']); ?></p>
        </div>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <h3 class="card-title">Grades</h3>
            <?php if (pg_num_rows($grades_result) > 0): ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Semester</th>
                            <th>Course Code</th>
                            <th>Course Description</th>
                            <th>Max Final Mark</th>
                            <th>Date Achieved</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($grade = pg_fetch_assoc($grades_result)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($grade['semester']); ?></td>
                                <td><?php echo htmlspecialchars($grade['course_code']); ?></td>
                                <td><?php echo htmlspecialchars($grade['course_description']); ?></td>
                                <td><?php echo htmlspecialchars($grade['max_final_mark']); ?></td>
                                <td><?php echo htmlspecialchars($grade['achieved_at']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No grades found for this student.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include('./includes/footer.php'); ?>

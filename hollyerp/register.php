<?php
$title = "Students Registration Page";
$file = "register.php";
$description = "Registration page for new students to create an account.";
$date = "December 6, 2024";
$banner = "Students Grade Portal - Register";

include('./includes/header.php');
$conn = db_connect();
prepareStatements($conn);

// Initialize variables
$message = "";
$first_name = $last_name = $email = $birth_date = $password = $confirm_password = $program_code = "";
$student_id = null;

// If in post mode, take in all the data when it is entered, trimming it for white spaces
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $birth_date = trim($_POST['birth_date']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $program_code = isset($_POST['program_code']) ? trim($_POST['program_code']) : "";

    // Validate form inputs, ensuring fields cannot be empty, incorrect email, or password matching
    if (empty($first_name) || empty($last_name) || empty($email) || empty($birth_date) || empty($password) || empty($confirm_password) || empty($program_code)) {
        $message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email address.";
    } elseif ($password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        try {
            // Check if the email already exists
            $result = pg_execute($conn, 'check_email_exists', [$email]);
            if (pg_num_rows($result) > 0) {
                $message = "Email is already registered.";
            } else {
                // Encrypt and salt the password
                $hashed_password = pg_fetch_result(pg_query_params(
                    $conn,
                    "SELECT crypt($1, gen_salt('bf'))",
                    [$password]
                ), 0, 0);

                // Insert user data into the users table
                $result = pg_execute($conn, 'insert_user', [
                    $first_name,
                    $last_name,
                    $email,
                    $birth_date,
                    $hashed_password
                ]);

                // If inserting into users works, insert it into students
                if ($result) {
                    // Get the user_id of the newly inserted user
                    $student_id = pg_fetch_result(pg_query($conn, "SELECT currval('users_id_seq')"), 0, 0);

                    // Insert the user_id and program_code into the `students` table
                    $student_result = pg_execute($conn, 'insert_student', [$student_id, $program_code, $student_id]);

                    // If inserting into students works, display it in the activity log
                    if ($student_result) {
                        logActivity("New user registered: User ID $student_id, Email $email, Program $program_code");

                        // Display success message with student ID
                        $message = "Registration successful! Your Student ID is <strong>$student_id</strong>. You can now log in.";
                        $is_success = true; // Flag for successful registration

                    // If errors occur when registering display the following
                    } else {
                        $message = "Error registering the student. Please try again.";
                    }

                // If errors occur when registering display the following
                } else {
                    $message = "Error registering your account. Please try again.";
                }
            }

        // If errors occur when registering display the following
        } catch (Exception $e) {
            $message = "An error occurred: " . $e->getMessage();
        }
    }
}
?>

<div class="container mt-5">
    <h1 class="text-center">Register</h1>
    <?php if ($message): ?>
        <div class="alert <?php echo isset($is_success) ? 'alert-success' : 'alert-danger'; ?> text-center">
            <?php echo htmlspecialchars_decode($message); ?>
        </div>
    <?php endif; ?>
    <?php if (!isset($is_success)): ?>
        <form method="post" class="card shadow p-4 mx-auto" style="max-width: 500px;">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo htmlspecialchars($first_name); ?>" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo htmlspecialchars($last_name); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Date of Birth:</label>
                <input type="date" id="birth_date" name="birth_date" class="form-control" value="<?php echo htmlspecialchars($birth_date); ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Program:</label>
                <div>
                    <input type="radio" id="cpga" name="program_code" value="CPGA" <?php echo ($program_code === 'CPGA') ? 'checked' : ''; ?> required>
                    <label for="cpga">CPGA</label>
                </div>
                <div>
                    <input type="radio" id="cppg" name="program_code" value="CPPG" <?php echo ($program_code === 'CPPG') ? 'checked' : ''; ?> required>
                    <label for="cppg">CPPG</label>
                </div>
            </div>
            <button type="submit" class="btn btn-dark w-100">Register</button>
        </form>
    <?php endif; ?>
    <div class="text-center mt-3">
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</div>

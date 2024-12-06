<?php
$title = "Students Login Page";
$file = "login.php";
$description = "Login page for students to log on to access information";
$date = "December 6, 2024";
$banner = "Students Grade Portal - Login";

include('./includes/header.php');
$conn = db_connect();
prepareStatements($conn);

// Preload user_id from a cookie if it exists
$last_user_id = isset($_COOKIE['LOGIN_COOKIE']) ? $_COOKIE['LOGIN_COOKIE'] : "";

// Initialize variables
$message = "";
$user_id = $last_user_id;
$password = "";

// If page is in post, store the user id and password in variables
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = trim($_POST['user_id']);
    $password = trim($_POST['password']);

    // Fetch user data
    $result = pg_execute($conn, 'student_all_info', [$user_id]);
    $user = pg_fetch_assoc($result);

    // If user has data
    if ($user) {
        // Get the hashed password from the database
        $hashed_password_from_db = $user['password'];

        // Encrypt and salt the entered password, then verify it
        if (crypt($password, $hashed_password_from_db) === $hashed_password_from_db) {
            // Login successful
            $_SESSION['user'] = $user;

            // Update last_access timestamp
            pg_execute($conn, 'student_last_access', [$user_id]);

            // Set login cookie for 30 days
            setcookie('LOGIN_COOKIE', $user_id, time() + 60 * 60 * 24 * 30);

            // Log activity
            logActivity("User $user_id logged in successfully.");

            // Redirect to grades page
            header("Location: grades.php");
            exit();
            
            // If invalid password, show following
        } else {
            $message = "Invalid password. Please try again.";
            logActivity("Failed login attempt for User $user_id: Invalid password.");
        }

    // If id not found, display error message
    } else {
        $message = "User ID not found. Please register first.";
        logActivity("Failed login attempt: User ID $user_id not found.");
    }
}
?>
<div class="container mt-5">
    <h1 class="text-center">Login</h1>
    <?php if ($message): ?>
        <div class="alert alert-danger text-center"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <form method="post" class="card shadow p-4 mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="user_id" class="form-label">Student ID:</label>
            <input type="text" id="user_id" name="user_id" class="form-control" value="<?php echo htmlspecialchars($user_id); ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-dark w-100">Login</button>
    </form>
    <div class="text-center mt-3">
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>
</div>

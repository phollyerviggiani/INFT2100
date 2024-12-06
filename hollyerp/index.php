<?php
$title = "Home Page";
$file = "index.php";
$description = "Welcome page for the Students Grade Portal";
$date = "December 6, 2024";
$banner = "Welcome to the Students Grade Portal";

include('./includes/header.php');

// Check if user is logged in
// If the user is logged in, display their name and let them go to the grades page and have a logout button
// If the user is NOT logged in, say hello guest, then give them buttons to login or register
$is_logged_in = isset($_SESSION['user']);
$user_name = $is_logged_in ? $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'] : "";
?>

<?php
// Check if a session message exists, clears message by unsetting session
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success text-center">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);  // Clear the message after displaying it
}
?>


<div class="container mt-5 text-center">
    <h1>Welcome to the Students Grade Portal</h1>
    <p class="lead">Your gateway to academic success! Manage your grades, access your profile, and stay connected.</p>
    <div class="card mx-auto shadow p-4" style="max-width: 600px;">
        <?php if ($is_logged_in): ?>
            <h3>Hello, <?php echo htmlspecialchars($user_name); ?>!</h3>
            <p>You are logged in. Feel free to explore the portal!</p>
            <div class="d-flex justify-content-around">
                <a href="grades.php" class="btn btn-primary">View Grades</a>
                <a href="logout.php" class="btn btn-danger">Log Out</a>
            </div>
        <?php else: ?>
            <h3>Welcome, Guest!</h3>
            <p>Please log in or register to access your account and view your grades.</p>
            <div class="d-flex justify-content-around">
                <a href="login.php" class="btn btn-success">Log In</a>
                <a href="register.php" class="btn btn-secondary">Register</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="text-center mt-5">
    <h2>About the Portal</h2>
    <p>
        This portal is designed to help students manage their academic information with ease.
        Log in to view your grades, update your profile, and stay on top of your academic journey.
    </p>
</div>
<?php include('./includes/footer.php'); ?>

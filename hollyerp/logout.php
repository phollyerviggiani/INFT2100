<?php
// Logout that usets, destroys, and restarts session - let user know they have successfully logged out
// Redirect to the login page + flush

session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['message'] = "You have successfully logged out.";
header("Location: index.php");
ob_flush();
?>
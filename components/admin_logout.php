<?php
include 'connection.php';

// Start the session
session_start();

// Clear all session data
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page (adjust 'login.php' to match your login page's URL)
header("location: ../admin/login.php");
exit;
?>
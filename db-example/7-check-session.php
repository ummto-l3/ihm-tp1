<?php

if (!isset($_COOKIE['loggedInUser'])) {
    // Redirect to login page if cookie is not found
    header('Location: login.php');
    exit;
}

$userId = $_COOKIE['loggedInUser'];
// Valid cookie found, proceed with displaying profile content
echo "<h1>Welcome, ";
echo $userId; // Replace $userId with the actual user ID obtained from the cookie
echo "</h1>";
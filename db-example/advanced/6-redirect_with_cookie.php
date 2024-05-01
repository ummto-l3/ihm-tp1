<?php

require 'db_config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

if ($conn->connect_error) {
    die('Error connecting to MySQL: ' . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Successful login
    $userId = $result->fetch_assoc()['id'];

    // Create a cookie with the user ID, insecure
    setcookie('loggedInUser', $userId, time() + 3600, '/'); 

    // use 
    // setcookie('username', 'johndoe', time() + 3600, '/', '', false, true);
    // where : 
    // 'username': The name of the cookie
    // 'johndoe': The value of the cookie
    // time() + 3600: The expiration time of the cookie, in seconds. In this case, the cookie will expire after one hour.
    // /: The path of the cookie. In this case, the cookie will be available across the entire website.
    // '': The domain of the cookie. In this case, the cookie will be associated with the current domain.
    // false: The secure flag of the cookie. If set to true, the cookie will only be transmitted over HTTPS connections.
    // true: The httponly flag of the cookie. If set to true, the cookie will not be accessible by JavaScript.

    // insert anything else

    // $_COOKIE['foo'] = 'bar';

    // Redirect to the desired page
    header('Location: success.php');
    exit;
} else {
    // Invalid login credentials
    echo "Invalid username or password";
}

$conn->close();
?>
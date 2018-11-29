<?php
// credentials removed
$servername="";
$username="";
$password="";
$dbname="";

$connection = new mysqli($servername,$username,$password,$dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// used throughout scripts
function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>
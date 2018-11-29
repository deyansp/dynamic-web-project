<?php
require 'dbCred.php';
session_start();
$email = $password = $firstName = $lastName = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    // trim needed here since the empty function treats a field with only whitespace as not empty
    trim($_POST["firstName"]); trim($_POST["lastName"]); trim($_POST["newEmail"]); trim($_POST["newPsw"]);
    
    if (empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["newEmail"]) || empty($_POST["newPsw"])) {
        
        exit("Fields cannot be blank");
    }
    
    else { 
        $firstName = sanitizeInput($_POST["firstName"]);
        
        if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
            
            exit("Only letters a-z allowed for names");
        }
        
        $lastName = sanitizeInput($_POST["lastName"]);
        
        if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
            
            exit("Only letters a-z allowed for names");
        }
        
        $email = sanitizeInput($_POST["newEmail"]);
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            exit("Invalid email");
        }
        
        // checking if email is already in use by another user 
        
        $statement = $connection->prepare("SELECT email FROM keshaUsers WHERE email = ?");
        $statement->bind_param("s", $email);
        $statement->execute();
        
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        
        $statement->close();
        
        if ($row) { 
            $connection->close();
            exit("email already in use");
        }
        
        else {
            // hashing password, storing credentials in db and redirecting to the users page 
            $password = sanitizeInput($_POST["newPsw"]);
            $passHash = password_hash($password, PASSWORD_DEFAULT);

            $statement = $connection->prepare("INSERT INTO keshaUsers (FirstName, LastName, email, pass) VALUES (?, ?, ?, ?)");
            $statement->bind_param("ssss", $firstName, $lastName, $email, $passHash);
            $statement->execute();

            $statement->close();
            $connection->close();

            setcookie("name", $firstName, time()+3600, "/");
            $_SESSION['email'] = $email;
            header("location: /~1704796/coursework/welcome.php");
        }
    }
}
?>
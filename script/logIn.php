<?php
require 'dbCred.php';
session_start();
$email = $password = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        // trim needed here since the empty function treats a field with only whitespace as not empty
        trim($_POST["email"]); trim($_POST["psw"]);
    
        if (empty($_POST["email"]) || empty($_POST["psw"])) {
            
            exit("Fields cannot be blank");
        }
    
    else {
        $email = sanitizeInput($_POST["email"]);
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            exit("Invalid email format");
        } 
        
        $password = sanitizeInput($_POST["psw"]);
        
        $statement = $connection->prepare("SELECT FirstName, email, pass FROM keshaUsers WHERE email = ?");
        $statement->bind_param("s", $email);
        $statement->execute();
        
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $statement->close();
        $connection->close();
        
        if (!$row) {
            exit("Incorrect email or password");
        }
    
        else if (password_verify($password, $row['pass'])) {
            
            // if password matches hash in db, set cookie and session variables and redirect to users page
            setcookie("name", $row["FirstName"], time()+3600, "/");
            $_SESSION['email'] = $row['email'];
             
            if ($_SESSION['email'] == "admin@loremipsum.com") 
                header("location: /~1704796/coursework/admin.php");
            
            else 
                header("location: /~1704796/coursework/welcome.php");
            
        }
        else {
            exit("Incorrect email or password");
        }
    }
}
?>

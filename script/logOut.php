<?php
    session_start();
    // removing session global variables
    $_SESSION = array();
    // removing cookies
    setcookie("name", "", time() - 3600, "/");
    // destroying session and redirecting 
    session_destroy();
    header("location: /~1704796/coursework/index.php");
?>
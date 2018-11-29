<?php 
    session_start();
    // preventing unauthorised access
    if($_COOKIE['name'] !== "Admin" || $_SESSION['email'] !== "admin@loremipsum.com") {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kesha | Admin Website</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="script/requestDataAdmin.js"></script>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
    
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" alt="home">KESHA</a>

            <button id="button" class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarOverlay">
                <span class="navbar-toggler-icon ml-auto"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarOverlay">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="script/logOut.php">Sign Out</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    
    <div class="jumbotron jumbotron-fluid">
		<div class="container" id="welcome">
			<h4 class="display-4">
				Welcome, <?php echo htmlspecialchars($_COOKIE["name"]);?>
			</h4>
			<p>Please select an option from the buttons below</p>
			<button id="getUsers" type="button" class="btn btn-info">Users</button>
			<button id="tourDates" type="button" class="btn btn-info">Tour Dates</button>
		</div>
    </div>
    
    <!--TABLE-->
    <!--INSERTED THROUGH AJAX-->
    <div class='container' id='insertTable'>    
    </div>
</body>
</html>
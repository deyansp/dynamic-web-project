<?php 
require 'dbCred.php';
session_start();
 
// if the script is to be accessed by anyone that isn't logged in as admin
if($_COOKIE['name'] !== "Admin" || $_SESSION['email'] !== "admin@loremipsum.com") {
        echo "<h2>Access Denied!</h2>";
		exit;
}

if (isset($_GET['id'])) {
    $id = sanitizeInput($_GET["id"]);
    $error = "";
 ?>
        <head>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<title>Kesha | Admin Website</title>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		</head>
		<body>
			<div class='container'>
			<h4 class='display-4'>Delete Tour Date</h4>
            <p>Are you sure you want to permanently delete this tour date with ID: <?php echo $id;?>?</p>
            <form role='form' method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class='form-group'>
                   <input type='hidden' name='delID' value="<?php echo $id; ?>">
                </div>
				<?php echo $error; ?>
				<button type='submit' name='submit' class='btn btn-default btn-danger'>Delete</button>
				<a class='btn btn-secondary' href='/~1704796/coursework/admin.php'>Cancel</a>
            </form>
			</div>
		</body>
<?php
        }
        else {
            echo "<p>Unable to complete query!</p>";
        }
// if the form is submitted
if (isset($_POST['submit']) && isset($_POST['delID'])) {

			// make sure the 'id' is valid
			if (is_numeric($_POST['delID'])) {

			$id = $_POST['delID'];

			// if everything is fine, delete the record in the database
			if ($statement = $connection->prepare("DELETE FROM keshaTourDates WHERE id=?")) {
				$statement->bind_param("i", $id);
				$statement->execute();
				$statement->close();
				$connection->close();
				header("Location: /~1704796/coursework/admin.php");
			}
			// show an error message if the query has an error
			else {
				$error =  "<p>Unable to complete query!</p>";
				echo $error;
			}

			}
			else {
				$error = "Error!";
				echo $error;
			}
}
?>
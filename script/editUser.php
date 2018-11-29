<?php
require 'dbCred.php';
session_start();
 
// if the script is to be accessed by anyone that isn't logged in as admin
if($_COOKIE['name'] !== "Admin" || $_SESSION['email'] !== "admin@loremipsum.com") {
        echo "<h2>Access Denied!</h2>";
		exit;
}

if (isset($_GET['id'])) {

		$firstName = $lastName = $error = "";

        $id = sanitizeInput($_GET["id"]);

        // fetching the data associated with the user id
        if ( $statement = $connection->prepare("SELECT FirstName, LastName FROM keshaUsers WHERE id = ?") ) {
			$statement->bind_param("s", $id);
			$statement->execute();

			$result = $statement->get_result();
			$row = $result->fetch_assoc();
			$statement->close();
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
			<h4 class='display-4'>Edit User Details</h4>
            <form role='form' method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class='form-group'>
                    <label for='firstName'>First Name</label>
                <input type='text' class='form-control' name='firstName' value="<?php echo $row["FirstName"];?>">
                </div>
                <div class='form-group'>
                    <label for='lastName'>Last Name</label>
			         <input type='text' class='form-control' name='lastName' value="<?php echo $row["LastName"];?>">
                </div>
				<input type='hidden' name='editID' value="<?php echo $id; ?>">
				<?php echo $error; ?>
				<button type='submit' name='submit' class='btn btn-default btn-success'>Submit</button>
				<a class='btn btn-secondary' href='/~1704796/coursework/admin.php'>Cancel</a>
            </form>
			</div>
		</body>
<?php
        }
        else {
            echo "<p>Unable to complete query!</p>";
        }
	}
		// proccess the form when submitted
		if (isset($_POST['submit']) && isset($_POST['editID'])) {

			// make sure the 'id' in the URL is valid
			if (is_numeric($_POST['editID'])) {

			$id = $_POST['editID'];
			$firstname = sanitizeInput($_POST['firstName']);
			$lastname = sanitizeInput($_POST['lastName']);

			// check if fields are empty
			if ($firstname == '' || $lastname == '') {
			// if they are empty, show an error message
				$error = 'Please fill in all required fields!';
				echo $error;
			}
			else {
			// if everything is fine, update the record in the database
			if ($statement = $connection->prepare("UPDATE keshaUsers SET FirstName = ?, LastName = ? WHERE id=?")) {
				$statement->bind_param("ssi", $firstname, $lastname, $id);
				$statement->execute();
				$statement->close();
                $connection->close();
			}
			// show an error message if the query has an error
			else {
				$error = "<p>Unable to complete query!</p>";
				echo $error;
			}

			// redirect the user once the form is updated
			header("Location: /~1704796/coursework/admin.php");
			}
			}
			// if the 'id' variable is not valid, show an error message
			else {
				$error = "<p>Unable to complete query!</p>";
				echo $error;
			}
	}
?>
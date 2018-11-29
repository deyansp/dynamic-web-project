<?php
require 'dbCred.php';
session_start();
 
// if the script is to be accessed by anyone that isn't logged in as admin
if($_COOKIE['name'] !== "Admin" || $_SESSION['email'] !== "admin@loremipsum.com") {
        echo "<h2>Access Denied!</h2>";
		exit;
}

$location = $venue = $date = $startTime = $error = "";

?>
		<head>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<title>Kesha | Admin Website</title>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		</head>
		<body>
			<div class='container'>
			<h4 class='display-4'>Add Tour Date</h4>
            <form role='form' method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class='form-group'>
                    <label for='location'>Location</label>
                <input type='text' class='form-control' name='location'>
                </div>
                <div class='form-group'>
                    <label for='venue'>Venue</label>
			         <input type='text' class='form-control' name='venue'>
                </div>
                <div class='form-group'>
                    <label for='date'>Date (YYYY-MM-DD)</label>
			         <input type='text' class='form-control' name='date'>
                </div>
                <div class='form-group'>
                    <label for='startTime'>Start Time (HH:MM:SS)</label>
			         <input type='text' class='form-control' name='startTime'>
                </div>
				<?php echo $error; ?>
				<button type='submit' name='submit' class='btn btn-default btn-success'>Submit</button>
				<a class='btn btn-secondary' href='/~1704796/coursework/admin.php'>Cancel</a>
            </form>
			</div>
		</body>
<?php
		// proccess the form when submitted
		if (isset($_POST['submit'])) {

			// validating input
			$location = sanitizeInput($_POST['location']);
			$venue = sanitizeInput($_POST['venue']);
            $date = sanitizeInput($_POST['date']);
            $startTime = sanitizeInput($_POST['startTime']);

			// check if the fields are empty
			if ($location == '' || $venue == '' || $date == '' || $startTime == '') {
				$error = '<h3>Please fill in all required fields!</h3>';
                echo $error;
			}
			else {
                // if everything is fine, create the record in the database
                if ($statement = $connection->prepare("INSERT INTO keshaTourDates (Location, Venue, Date, StartTime) VALUES (?, ?, ?, ?)")) {
                    $statement->bind_param("ssss", $location, $venue, $date, $startTime);
                    $statement->execute();
                    $statement->close();
                    $connection->close();
                }
                // show an error message if the query has an error
                else {
                    $error = "<h3>Unable to complete query!</h3>";
                    echo $error;
                }

                // redirect the user once the record is created
                header("Location: /~1704796/coursework/admin.php");
			}
		}   
?>
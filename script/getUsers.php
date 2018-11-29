<?php
require 'dbCred.php';
session_start();

// has the admins email
$email = $_SESSION["email"];

	if ($_SERVER['REQUEST_METHOD'] == "POST" && !isset($_POST['editID'])) {

		// selecting all users EXCEPT the admin

		$statement = $connection->prepare("SELECT id, FirstName, LastName, email, registeredOn FROM keshaUsers WHERE NOT email = ?");
		$statement->bind_param("s", $email);
		$statement->execute();
		$result = $statement->get_result();

		if ($result->num_rows == 0) {
			echo "<p>No results to display!</p>";
		}

		else {
			// printing out table and header
			echo "<div class='table-responsive-md'>
                <table class='table table-hover'>
                 <thead class='thead-light'>
                  <tr>";
			// getting the field names from the db
			while ($field = $result->fetch_field()) {
				echo "<th scope='col'>" . $field->name . "</th>";
			}
			// outputting header names for the buttons
			echo "<th scope='col'>Edit</th>
                      <th scope='col'>Delete</th>
                    </tr>
                </thead>
                <tbody>";
			// outputting each row
			while($row = $result->fetch_assoc()) {
				echo "<tr><th scope='row'>" . $row["id"] ."</th>";
				echo "<td>" . $row["FirstName"]. "</td>";
				echo "<td>" . $row["LastName"]. "</td>";
				echo "<td>" . $row["email"]. "</td>";
				echo "<td>" . $row["registeredOn"]. "</td>";
				echo "<td><a class='btn btn-primary btn-sm btn-block userEdit' href='script/editUser.php?id=". $row['id'] ."'>Edit</a></td>";
				echo "<td><a class='btn btn-danger btn-sm btn-block userDelete' href='script/delUser.php?id=". $row['id'] ."'>Delete</a></td>
                          </tr>";
			}
			echo "</tbody>
                    </table>
                </div>";
		}
		$statement->close();
		$connection->close();
	}
?>
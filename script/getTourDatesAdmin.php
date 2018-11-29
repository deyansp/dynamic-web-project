<?php
require 'dbCred.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    // selecting 
    $statement = $connection->prepare("SELECT * FROM keshaTourDates");
    //$statement->bind_param("s", $email);
    $statement->execute();
    $result = $statement->get_result();
    
    if ($result->num_rows == 0) {
        echo "<p>No results to display!</p>";
    }
    
    else {
        // printing out add button, table and header
        echo "<a id='addTourDate' class='btn btn-success' href='/~1704796/coursework/script/addTourDate.php'>Add Date</a>
              <div class='table-responsive-md'>
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
                    echo "<tr><th scope='row'>" . $row["ID"] ."</th>";
                        echo "<td>" . $row["Location"]. "</td>";
                        echo "<td>" . $row["Venue"]. "</td>";
                        echo "<td>" . $row["Date"]. "</td>";
                        echo "<td>" . $row["StartTime"]. "</td>";
                        echo "<td><a class='btn btn-primary btn-sm btn-block userEdit' href='script/editTourDate.php?id=". $row['ID'] ."'>Edit</a</td>";
				        echo "<td><a class='btn btn-danger btn-sm btn-block userDelete' href='script/delTourDate.php?id=". $row['ID'] ."'>Delete</a></td>
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
<?php
require 'dbCred.php';

$tourDates = array();

$sql = "SELECT Location, Venue, DATE_FORMAT(Date, '%a, %d %b %Y') Date, TIME_FORMAT(StartTime, '%h %p') StartTime FROM keshaTourDates";

$result = $connection->query($sql);

/* for ($i = 0; $row = $result->fetch_array(MYSQLI_NUM); $i++) {
    $tourDates[$i] = $row[$i];
} */
while ($row = $result->fetch_assoc()) {
    $tourDates[] = $row['Location'];
    $tourDates[] = $row['Venue'];
    $tourDates[] = $row['Date'];
    $tourDates[] = $row['StartTime'];
    //$tourDates[] = $row;
}

echo json_encode($tourDates);

/*$tourDates = array_values($tourDates);

$arrlength = count($tourDates);
for ($i = 0; $i < $arrlength; $i++) {
    echo $tourDates[$i];
    echo "<br>";
}*/
?>
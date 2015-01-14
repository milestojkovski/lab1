<?php

$page_title = 'number of jokes on the selected day';
include ('includes/header.html');
require ('mysqli_connect.php');

$date2 = $_POST['date'];

$q = "SELECT COUNT(date) FROM joke  WHERE date =  '" . $date2 . "'  "; 
	 
$r = mysqli_query($dbc, $q);

while($row = mysqli_fetch_array($r)){
	echo "There are  <b>". $row['COUNT(date)'] ." </b> joke(s) registered on<b> ". $date2 ."</b> ";
	echo "<br />";
}
//end

        ?>

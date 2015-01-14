<?php

$page_title = 'Jokes on picked date';
include ('includes/header.html');
require ('mysqli_connect.php');

$date2 = $_POST['date'];

$q = "SELECT body, title FROM joke  WHERE date =  '" . $date2 . "'  "; 	 
$r = mysqli_query($dbc, $q);
$num= mysqli_affected_rows($dbc);

if ($num == 0) {
    echo"There is no joke on <b> $date2 </b> please pick another date.";
} 
else{
while($row = mysqli_fetch_array($r)){
	echo " <b> Title: </b> ". $row['title'] ." </br> "." <b> Body:</b> ". $row['body'] . "</br>"." <b> Picked date:</b> <b> ". $date2 ."</b> </br></br> ";
	echo "<br />";
}  
}
    ?>
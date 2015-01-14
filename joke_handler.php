
<?php
 $page_title = 'joke handler';
include ('includes/header.html');
require  ('mysqli_connect.php');

$body = $_GET ['body']; 
$date = $_GET ['date'];
$title = $_GET ['title'];



 
if ($title && $date && $body) // checks if all variables are set
    {

$q= "INSERT INTO joke (body, date, title) VALUES ('$body','$date','$title')";
$r=  @mysqli_query($dbc, $q);

echo  '<h1>Thank you!</h1>
		<p>You have registered your joke select View Jokes to see a list of all jokes</p><p><br /></p>';
} else {
echo '<p>Please go back and fill out the missing parts.</p>';
}
    
?>

 
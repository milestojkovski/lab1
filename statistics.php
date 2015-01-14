<?php

$page_title = 'Statistics';
include ('includes/header.html');
require ('mysqli_connect.php');



echo'<form action="mostjokes.php" method="POST">
<p> please click the buttion to see the day on which most jokes were posted </p>
<p>  <input type="submit" name="see the day that most jokes were posted" value="the day with most jokes" /> </p>

        </form>';




echo'</br> </br> </br> </br>';



echo'<form action="JokesOnDay.php" method="POST">
<p> Pick date and see how many jokes were posted!</p>
<p> <input type="date" name="date"  value=""  /> </p>
    <p> <input type="submit" name="see the number of jokes posted" value="see the number of jokes" /> </p>
</form>'; 


echo'</br> </br> </br> </br>';



echo'<form action="ContentOfJokesOnDay.php" method="POST">
<p> Pick date and see the content of  jokes posted!</p>
<p> <input type="date" name="date"  value=""  /> </p>
    <p> <input type="submit" name="see the jokes on the date" value="see the jokes on the date" /> </p>
</form>'; 
<?php
     $page_title = 'day with most jokes';
include ('includes/header.html');
require ('mysqli_connect.php');

$q="SELECT date, COUNT(date) AS value_occurrence FROM joke GROUP BY date ORDER BY value_occurrence DESC";
// this solution is not the ideal one, there is problem when there are two or more dates with same number of jokes. 
$r = mysqli_query($dbc, $q);
$row =  mysqli_fetch_row($r);

echo'day <b>' . $row[0] . '</b>is the day with most joke(s) </br>' ;
echo 'on that day there were<b> ' . $row[1] . ' <b> joke(s)';

        ?>
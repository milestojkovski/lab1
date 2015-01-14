<?php
$page_title = 'View jokes';
include ('includes/header.html');

require ('mysqli_connect.php');
$display = 50;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
	$pages = $_GET['p'];
} else { // Need to determine.
 	// Count the number of records:
	$q = "SELECT COUNT(joke_id) FROM joke";
	$r = @mysqli_query ($dbc, $q);
        
	$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
	$records = $row[0];
   

	// Calculate the number of pages...
	if ($records > $display) { // More than 1 page.
		$pages = ceil ($records/$display);
	} else {
		$pages = 1;
	}
} // End of p IF.
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
$start = 0;}

$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'date';

// Determine the sorting order:
switch ($sort) {
    case 'DA': //da = date acending  
        $order_by = 'date ASC';
       
        break;
   
    default: // default is to show the most recent jokes
        $order_by = 'date DESC';
        
        break;
}
        
$q = "SELECT body, date, title, joke_id FROM joke ORDER BY $order_by  LIMIT $start, $display ";
        $r = mysqli_query($dbc, $q);
             $num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many jokes there are:
echo "<p>There are currently<b> $num </b>jokes on the board.</p>\n";}
//table header
echo '<table align="center" cellspacing="0" cellpadding="5" width="80%">
<tr>
        <td align="left"><b></b></td>
        <td align="left"><b></b></td>
	<td align="left"><b>Title</b></td>
	<td align="left"><b>Body</b></td>
	<td align="left"><b><a href="view_jokes.php?sort=DA">Date (y,m,d)</a></b></td>

	
        
        
</tr>
';    
    $bg = '#FFFF99'; 

       while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
           $bg = ($bg=='#FFFF99' ? '#E6E6E6' : '#FFFF99');
		echo '<tr bgcolor="' . $bg . '">
                 <td align="left"><a href="edit_joke.php?id='  .$row['joke_id'] . '">Edit</a></td>
                     <td align="left"><a href="delete_joke.php?id=' . $row['joke_id'] . '">Delete</a></td>
                <td align="left">' . $row['title'] . '</td>
		<td align="left">' . $row['body'] . '</td>
                  <td align="left">' . $row['date'] . '</td>
                       </tr> ';
    
            
    } 
mysqli_free_result ($r);
mysqli_close($dbc);



if ($pages > 1) {
	
	echo '<br /><p>';
	$current_page = ($start/$display) + 1;
	
	// If it's not the first page, make a Previous button:
	if ($current_page != 1) {
		echo '<a href="view_jokes.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
	}
	
	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="view_jokes.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	} // End of FOR loop.
	
	// If it's not the last page, make a Next button:
	if ($current_page != $pages) {
		echo '<a href="view_jokes.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
	}
	
	echo '</p>'; // Close the paragraph.
	
}// End of links section.


 




?>
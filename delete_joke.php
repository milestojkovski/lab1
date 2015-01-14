<?php 
$page_title = 'Delete a joke';
include ('includes/header.html');
echo '<h1>Delete a joke</h1>';

// Check for a valid joke ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_joke.php
	$id = $_GET['id'];
} else { // No valid ID, kill the script.
	echo '<p>This page has been accessed in 
error.</p>';
	 
	exit();
}

require ('mysqli_connect.php');

                               
	if(isset($_GET['sure']) && $_GET['sure'] == 'Yes') { // Delete the record.

		// Make the query:
		$q = "DELETE  FROM joke WHERE joke_id=$id LIMIT 1";		
		$r = @mysqli_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			// Print a message:
			echo "<p>The joke has <b>BEEN</b> deleted.</p>";	

		} else { // If the query did not run OK.
			echo '<p>The joke could not be deleted due system problems </p>'; // Public message.
			 
		}
	                              //
        } elseif (isset($_GET['sure']) && $_GET['sure'] == 'No') 
{
   // no confirmation of deletion
   echo "the joke has <b>NOT</b> been deleted";
}


else { // Show the form.

	// Retrieve the joke information:
	$q = "SELECT title FROM joke WHERE joke_id=$id";
	$r = @mysqli_query ($dbc, $q);

	if (mysqli_num_rows($r) == 1) { // Valid joke ID, show the form.

		// Get the joke's information:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);
		
		// Display the record being deleted:
		echo "<h3>joke title: $row[0]</h3>
		Are you sure you want to delete this joke?";
		
		// Create the form:
		echo '<form action="delete_joke.php" method="GET">
	<input type="radio" name="sure" value="Yes" /> Yes 
	<input type="radio" name="sure" value="No" checked="checked" /> No
	<input type="submit" name="submit" value="Submit" />
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';
        
} else { // Not a valid joke ID.
		echo '<p>This page has been accessed in error.</p>';
	}

} // End of the main submission conditional.
//}
mysqli_close($dbc);
		

?>
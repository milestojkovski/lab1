<?php 
$page_title = 'Edit a Joke';
include ('includes/header.html');
echo '<h1>Edit a Joke</h1>';

// Check for a valid Joke ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_jokes.php
	$id = $_GET['id'];
} 
else { // No valid ID, kill the script.
	echo '<p>This page has been accessed in error.</p>';
	 
	exit();
}

require ('mysqli_connect.php'); 
// Check if the form has been submitted:
//if ($_SERVER['REQUEST_METHOD'] == 'GET') {
 //if (isset($_GET['id'])){
if (isset($_GET['test'])) {

	$errors = array();
	// Check for a title
	if (empty($_GET['title'])) {
		$errors[] = 'You forgot to enter title.';
	} else {
		$tit = mysqli_real_escape_string($dbc, ($_GET['title']));
        }
	// Check for body:
	if (empty($_GET['body'])) {
		$errors[] = 'You forgot to enter body.';
	} else {
		$bod = mysqli_real_escape_string($dbc, ($_GET['body']));
	}
	// Check for date:
	if (empty($_GET['date'])) {
		$errors[] = 'You forgot to enter date.';
	} else {
		$dat = mysqli_real_escape_string($dbc, ($_GET['date']));
	}

    if  (empty($errors))  // If everything's OK.
                    
            {

			// Make the query:                            
			$q = "UPDATE joke SET title='$tit', body='$bod', date='$dat'  WHERE joke_id=$id LIMIT 1";
			$r = @mysqli_query ($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// Print a message:
				echo '<p>The joke has been edited.</p>';	
				
			} else { // If it did not run OK.
				echo '<p class>The joke could not be edited. Sorry</p>'; // Public message.
				
			}             
            }
                             
                      else { // Report the errors.

		echo '<p>The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
	
        }// End of if (empty($errors)) IF.
}// End of submit conditional.


// Always show the form...

// Retrieve the joke information:
$q = "SELECT title, body, date  FROM joke WHERE joke_id=$id";		
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid joke ID, show the form.

	// Get the joke's information:
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// Create the form:
	echo '<form action="edit_joke.php" method="GET">
            
<p> Title: <input type="text" name="title"  value="' . $row[0] . '" /></p>
    
<p> Body: <textarea name="body" rows="10" cols="60">'. $row[1] . ' </textarea></p>
    
<p> Date: <input type="date" name="date"  value="' . $row[2] . '"  /> </p>
    
<p> <input type="submit" name="submit" value="Submit" /></p>
<p> <input type="hidden" name="test" value="1"> </p>
<input type="hidden" name="id" value="' . $id . '" />
</form>';

} else { // Not a valid joke ID.
	echo '<p>This page has been accessed in error.</p>';
}

mysqli_close($dbc);
		
?>
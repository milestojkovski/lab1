
<?php 
$page_title = 'Add joke';

include ('includes/header.html');

       ?>
<h4> All fields are mandatory </h4>
<form action="joke_handler.php" method="GET" align="center">
                
	<p>Title: <input type="text" name="title"  
                              value="<?php if (isset($_GET['title'])) echo $_GET['title']; ?>" /></p>
        
               
        
        <p> Body: <textarea name="body" rows="10" cols="60"> <?php if (isset($_GET['body'])) echo $_GET['body']; ?> </textarea></p>
        
            
                           
	<p>Date: <input type="date" name="date" 
                                 value="<?php if (isset($_GET['date'])) echo $_GET['date']; ?>"  /> </p>
        
       
	
	<p><input type="submit" name="submit" value="Submit your joke" /></p>
</form>
<?php 
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(!(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)){  
header('location:login_form.php'); 
exit(); 
} 
?> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ONLINE LIBRARY</title>
    <link rel="stylesheet" href="mainstyle.css" />
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&display=swap" rel="stylesheet"/>
    </head>
  <body>
  <div class="topnav">
      <a href="main2.php">HOME</a>
      <a href="view_books2.php">BOOKS</a>
      <a href="view_magazine2.php"></i>MAGAZINES</a>
      <a href="view_articles2.php">ARTICLES</a>
      <div>
        <a href="log_out.php" style="float:right; padding-right: 10px;">LOGOUT</a>
      </div>
    </div>
    <?php 
    if ($_POST['SUBMIT'] == 'ADD'){
        //validation flag to check that all validations are done 
        $validationFlag = true; 
        //Check all the required fields are filled 
        if(!($_POST['adminname']))
        { 
        echo 'All the fields marked as * are compulsary.<br>'; 
        $validationFlag = false; 
        } 
        
        else{ 
        $admin_name = $_POST['adminname']; 
        $password = $_POST['password'];  
        }
        
        
        //If all validations are correct, connect to MySQL and execute the query 
        if($validationFlag){ 
        //Connect to mysql server 
        $link = mysqli_connect('localhost', 'root', '', 'librarydb'); 
        //Check link to the mysql server 
        if(!$link){ 
        die('Failed to connect to server'); 
        } 
        //Create Insert query 
        $query = "INSERT INTO `admin_database`(`admin_name`, `admin_password`) VALUES ('$admin_name','$password')"; 
        //Execute query 
        $results = mysqli_query($link, $query); 
         
        //Check if query executes successfully 
        if($results == FALSE) 
        echo mysql_error() . '<br>'; 
        else 
        echo '<center><h1>Data inserted successfully!</h1></center> '; 
    }
         
        } 
    ?>
    <center><button type='submit' id='GoBack' onclick="location.href='add_admin.php'">ADD AGAIN</button></center>
</body>
</html>
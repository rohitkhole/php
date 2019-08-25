// Demo to Use a Session Variable in another php file to fetch indivisual person's info.

<?php
------------------------------------------------------------
//include database connection and session files.

  session_start(); 
  include "dbconnect.php";
            OR
  <?php require_once("include/db.php"); ?>
  <?php require_once("include/session.php"); ?>
  -----------------------------------------------------------
  
	global $conn; //getting connection
  
  // getting unique id to fetch unique row using session variable 
  // here id is unique key in database with fields name, email, salary etc.
	$id = $_SESSION['id']; 
  
	echo $id; // checking it's fetching or not.
  
  // fetching indivisual unique row accoring to session id.
	$query = "SELECT * FROM table_name WHERE id = '$id' ";
  
  //execute query
	$execute = mysqli_query($conn, $query) or die('Error1');
	while($row=mysqli_fetch_array($execute,MYSQLI_ASSOC))
	 {
   // getting all fields associate with that id.
		$id=$row["id"];
		$name=$row["name"];
    $email=$row["email"];
		$salary=$row["salary"];
    
    // print related information.
		echo $id;
		echo $name;
		echo $email;
    echo $salary;
	 }
?>

<?php

 $host = 'database-1.c4fnwjtjgkok.us-east-1.rds.amazonaws.com';
 $user = 'hwaiearn';
 $password = 'lab-password';
 $dbname = 'cloud';

 

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

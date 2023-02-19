<?php   
function OpenCon()
{
  
    $dbhost = "localhost";
    $dbuser = "eric";
    $dbpass = "eric";
    $db = "studentdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
 }
 
function CloseCon($conn)
 {
    $conn -> close();
 }
   
?>
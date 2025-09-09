<?php
$host = "Localhost";
$name = "root";
$password = null;
$databse = "monneys_bookstore";

$conn = new mysqli($host,$name,$password,$databse);
if($conn-> connect_error){
    echo "Connection failed".$conn->connect_error;
};


?>
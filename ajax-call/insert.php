<?php

// Connection
$conn = mysqli_connect("localhost","root","Safi1994?","test") OR die("Connection failed");

$fname = $_POST['fn'];
$lname = $_POST['ln'];

$sql = "INSERT INTO students(first_name,last_name) VALUES('{$fname}','{$lname}')";

if(mysqli_query($conn, $sql)){
    echo 1;

}else{
   echo 0;
}
mysqli_close($conn);
?>
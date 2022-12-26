<?php
// Connection
$conn = mysqli_connect("localhost","root","Safi1994?","test") OR die("Connection failed");
// Select query
$sql = "UPDATE students SET first_name = '{$_POST['fname']}' , last_name =  '{$_POST['lname']}' WHERE id = {$_POST['id']}";

if(mysqli_query($conn, $sql)){
echo 1;
}else{
    echo 0;
}

?>
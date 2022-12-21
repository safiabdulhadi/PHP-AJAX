<?php
// database connection
$conn = mysqli_connect("localhost","root","Safi1994?","test") OR die("Connection failed");

$id = $_POST["id"];

$sql = "DELETE FROM students WHERE id = '$id'";

if(mysqli_query($conn, $sql)){
    echo 1;

}else{
   echo 0;
}

mysqli_close($conn);

?>
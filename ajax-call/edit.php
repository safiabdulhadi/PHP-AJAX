<?php
// Connection
$conn = mysqli_connect("localhost","root","Safi1994?","test") OR die("Connection failed");
// Select query
$sql = "SELECT * FROM students WHERE id = {$_POST['id']}";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

        $output = "
                    <input type='hidden' id='eid' value='{$row['id']}'>
                    <input type='text' id='efname' value='{$row['first_name']}'>
                    <input type='text' id='elname' value='{$row['last_name']}'>
                    <button>Update</button>

                ";


    echo $output;


    mysqli_close($conn);

?>
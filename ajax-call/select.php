<?php
// Connection
$conn = mysqli_connect("localhost","root","Safi1994?","test") OR die("Connection failed");
// Select query
$sql = "SELECT * FROM students";
$result = mysqli_query($conn,$sql);

// Checking for Record
if(mysqli_num_rows($result) > 0){

    $output = "";
    while($row = mysqli_fetch_array($result)){

        $output .= "

        <tr>
            <td>{$row['id']}</td>
            <td>{$row['first_name']} {$row['lat_name']}</</td>
        </tr>
        ";

    }
    echo $output;

}else{
    echo "<h3>No records found</h3>";
}

?>
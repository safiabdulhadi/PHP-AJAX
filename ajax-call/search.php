<?php
// Connection
$conn = mysqli_connect("localhost","root","Safi1994?","test") OR die("Connection failed");
// Select query
$sql = "SELECT * FROM students WHERE first_name LIKE '%{$_POST['searchTerm']}%'";
$result = mysqli_query($conn,$sql);

// Checking for Record
if(mysqli_num_rows($result) > 0){

    $output = "";
    while($row = mysqli_fetch_assoc($result)){

        $output .= "

        <tr>
            <td>{$row['id']}</td>
            <td>{$row['first_name']} {$row['last_name']}</</td>
            <td style='width: 120px'>
            <button class='delete-btn' style='background-color: red; color:white;' data-id='{$row['id']}' >Delete</button>
            <button class='edit-btn' style='background-color: yellow; color:black;' data-id='{$row['id']}' >Edit</button>
            </td>
        </tr>
        ";

    }
    echo $output;

}else{
    echo "<h3>No records found</h3>";
}

?>
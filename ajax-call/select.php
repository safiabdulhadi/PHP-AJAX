<?php
// Connection
$conn = mysqli_connect("localhost","root","Safi1994?","test") OR die("Connection failed");
// Select query

// PAGE
if(isset($_POST['page'])){
    $page = $_POST['page'];
}else{
    $page = 1;
}
 // LIMIT
 $limit = 3;

 $offset = ($page -1) * $limit;
$sql = "SELECT * FROM students LIMIT {$offset},{$limit}";
$result = mysqli_query($conn,$sql);

// Checking for Record
if(mysqli_num_rows($result) > 0){

    $output = "

            <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>

    ";
    while($row = mysqli_fetch_assoc($result)){

        $output .= "

        <tr>
            <td>{$row['id']}</td>
            <td>{$row['first_name']} {$row['last_name']}</</td>
            <td>
            <button class='delete-btn' style='background-color: red; color:white;' data-id='{$row['id']}' >Delete</button>
            <button class='edit-btn' style='background-color: yellow; color:black;' data-id='{$row['id']}' >Edit</button>
            </td>
        </tr>
        ";

    }

    // SQL FOR PAGIN
    $sql_pag = "SELECT * FROM students ";
    // RUN SQL
    $result_pag = mysqli_query($conn, $sql_pag);
// TOTAL RECORDS
    $total_records = mysqli_num_rows($result_pag);


    $total_pages = ceil($total_records / $limit);

    $output .="
                </tbody>
                </table>
                <div class='pagination'>";
    for($i = 1; $i<= $total_pages ; $i++){

       $output .= "<a href='' id='$i'>{$i}</a>";

    }

   $output.=  '</div>';

    echo $output;

}else{
    echo "<h3>No records found</h3>";
}

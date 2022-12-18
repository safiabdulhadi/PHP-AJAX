<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP AJAX</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main-wrapper">

        <!-- Header 1 -->

        <div class="header-1">
            <h1>PHP With AJAX</h1>
        </div>

        <div class="header-2">
            <!-- <button id="load-btn">Load Data</button> -->
            <input type="button" id="fname" placeholder="Lirst name">
            <input type="button" id="lname" placeholder="Last name">
            <button>Add</button>
        </div>


        <!-- Body -->
        <div class="body">
            <table>

                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                    </tr>
                </thead>
                <tbody id="record-table">

                </tbody>
            </table>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function(){

            $('#load-btn').click(function(){

                $.ajax({
                    url: "ajax-call /select.php",
                    type: "POST",
                    success: function(data){
                     $('#record-table').html(data);
                    }

                });
            });
        });
    </script>
</body>

</html>
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
            <form id="form">
                <input type="text" id="fname" placeholder="First name">
                <input type="text" id="lname" placeholder="Last name">
                <button id="add-btn">Add</button>
            </form>
        </div>


        <!-- Body -->
        <div class="body">
            <table>

                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody id="record-table">

                </tbody>
            </table>
        </div>
        <div id="success-msg"></div>
        <div id="error-msg"></div>
    </div>

    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function() {
         // Retrive DATA
            function loadData() {
                $.ajax({
                    url: "ajax-call /select.php",
                    type: "POST",
                    success: function(data) {
                        $('#record-table').html(data);
                    }

                });
            }
            loadData();

            // IINSERT DATA
            $('#form').on('submit', function(e) {
                e.preventDefault();
                let fname = $('#fname').val();
                let lname = $('#lname').val();

                // CHECK FOR EMPTY FILED
                if (fname === "" || lname === "") {
                    $("#errror-msg").slideDown().html("All fileds are required !");
                    $("#success-msg").slideUp();
                } else {
                    // Ajax call
                    $.ajax({

                        url: "ajax-call/insert.php",
                        type: "POST",
                        data: {
                            fn: fname,
                            ln: lname
                        },
                        success: function(data) {
                            if (data == 1) {
                                loadData();
                                $("#success-msg").slideDown().html("Record added successfully !");
                                $("#error-msg").slideUp();
                                $("#form").trigger("reset");
                            } else {
                                $("$error-msg").slideDown().html("Record couldn't be added");
                                $("#success-msg").slideUp();
                            }
                        }

                    });
                }

            });


            // Delete Data
     $(document).on('click', '.delete-btn', function(){
        // let id = $(this).attr('data-id');
        // second way
        if(confirm('Are you sure you want to delete it ?')){
        let id = $(this).data('id');
        $.ajax({
            url:" ajax-call/delete.php",
            type: "POST",
            data : {id:id},
            success: function (data){
                if(data == 1){
                    loadData();
                $("#success-msg").slideDown().html("Record deleled Successfully !");
                    $("#errror-msg").slideUp();
                    setTimeout(function(){
                        $("#success-msg").slideUp();
                    }, 5000);
                }else{
                $("#errror-msg").slideDown().html("Record couldn' be deleled Successfully !");
                    $("#errror-msg").slideUp();
                    setTimeout(function(){
                        $("#errror-msg").slideUp();
                    }, 5000);
                }
            }
        });
    }
     });

        });
    </script>
</body>

</html>
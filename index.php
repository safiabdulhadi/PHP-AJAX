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

            <div id="search">
                <input type="text" placeholder="Search ....">
            </div>

            <div id="record-table">


            </div>

        </div>
        <div id="success-msg"></div>
        <div id="error-msg"></div>


        <!-- Model Box  -->
        <div class="modal-wrapper">
            <div class="modal-box">
                <form action="" id="update-form">

                </form>
                <span id="close-btn">X</span>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script>
        // RETRIVE DATA
        $(document).ready(function() {
            // Retrive DATA
            function loadData(page) {
                $.ajax({
                    url: "ajax-call /select.php",
                    type: "POST",
                    data: {page: page},
                    success: function(data) {
                        $('#record-table').html(data);
                    }

                });
            }
            loadData(1);


                // CLICK EVENT FOR PAGINATION
                $(document).on('click','.pagination a ', function(e){
                    e.preventDefault();

                    page_no = $(this).attr('id');
                    loadData(page_no);
                });


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
            $(document).on('click', '.delete-btn', function() {
                // let id = $(this).attr('data-id');
                // second way
                if (confirm('Are you sure you want to delete it ?')) {
                    let id = $(this).data('id');
                    $.ajax({
                        url: " ajax-call/delete.php",
                        type: "POST",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            if (data == 1) {
                                loadData();
                                $("#success-msg").slideDown().html("Record deleled Successfully !");
                                $("#errror-msg").slideUp();
                                setTimeout(function() {
                                    $("#success-msg").slideUp();
                                }, 5000);
                            } else {
                                $("#errror-msg").slideDown().html("Record couldn' be deleled Successfully !");
                                $("#errror-msg").slideUp();
                                setTimeout(function() {
                                    $("#errror-msg").slideUp();
                                }, 5000);
                            }
                        }
                    });
                }
            });

            // Update DATA
            $(document).on('click', '.edit-btn', function() {
                $('.modal-wrapper').css('display', 'none');
                let id = $(this).data('id');
                $.ajax({
                    url: "ajax-call/edit.php",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $("#update-form").html(data);
                    }

                });
            });
            // CLOSE MODAL BOX

            $('#close-btn').on('click', function() {
                $('.modal-wrapper').css('display', 'none');
            });

            // UPDATE RECORD
            $("#update-form").on('sumbit', function(e) {
                e.preventDefault();

                let id = $("#eid").val();
                let fname = $("#efname").val();
                let lname = $("#lfname").val();
                $.ajax({
                    url: "ajax-call/update.php",
                    type: "POST",
                    data: {
                        id: id,
                        fname: fname,
                        lname: lname
                    },
                    success: function(data) {
                        if (data == 1) {
                            loadData();
                            $("#success-msg").slideDown().html("Record updated successfully !");
                            $("#error-msg").slideUp();
                            $('.modal-wrapper').css('display', 'none');
                        } else {
                            $("$error-msg").slideDown().html("Record couldn't be updated!");
                            $("#success-msg").slideUp();
                        }
                    }

                });

            });
            // LIVE SEARCH

            $(document).on('keyup', '#search input', function() {

                let searchTerm = $(this).val();
                // AJAX CALL
                $.ajax({
                    url: "ajax-call/search.php",
                    type: "POST",
                    data: {
                        searchTerm: searchTerm
                    },
                    success: function(data) {
                        $('#record-table').html(data);
                    }

                });
            });

        });
    </script>
</body>

</html>
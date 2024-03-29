<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="../fa/css/all.css">
    <link rel="stylesheet" href="css/admin.css">
    

</head>
<body>
    

<?php
    include_once 'sidenav.php';
?>

<div id="main" class="bg-light">
    <?php
        include_once 'navbar.php';
    ?>
    <div class="site_content" id="site_content">
         
    </div>


</div>




<script src="js/jquery.js"></script>
<script src="../bootstrap4/js/bootstrap.bundle.js"></script>
<script src="js/admin.js"></script>


    <script>
         function count_no_notice() {
        $.ajax({
            type: 'post',
            url:'./backend/notification.php',
            dataType: 'json',
            success: function(res){
                if (res.status == 'success') {
                    $('#msg_icon').text(res.no_notice);

                }else{
                    alert(res.message);
                }
                
            },
            error:  function (xhr,status,message) {
                console.log(message);
            }
        });
        
    }
    count_no_notice();
    </script>
</body>
</html>
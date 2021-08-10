<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="../fa/css/all.css">
    <link rel="stylesheet" href="css/admin.css">
    <!-- Scripts -->
    <script src="../js/jquery.js"></script>
    <script src="../bootstrap4/js/bootstrap.bundle.js"></script>
</head>
<body  style="background-color: #3f5378;">
    <div  style="margin:10vh auto; text-align:center;" class="p-2">
        <img src="img/logo.png" alt="icon" style="max-height:90px; margin:10px;">
                <span style="font-size:20px; color:white "> <b>Admin Login</b></span>
        <div id="form_container" class="p-4 bg-light" >
        
            <form action="" id="formlog" class="text-left">
            <div class="form-group">
                <label for="username">
                  <i class="fa fa-user"></i>
                  Email Or Phone
                </label>
                <input type="text" id="uname" name="uname" class="form-control" style="box-shadow: 3px 3px  6px  #3f5378 !important;" >
            </div>
           <div class="form-group">
                <label for="pass" >
                    <i class="fa fa-key"></i>
                    Password
                </label>
                <div class="input-group">
                    <input type="password" id="pass" name="pass" class="form-control"  style="box-shadow: 3px 3px  6px  #3f5378 !important;">
                    <div class="input-group-append" style="cursor:pointer; box-shadow: 3px 3px  5px  #3f5378 !important;" id="pass_eyes">
                        <span class="input-group-text">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
           </div>
            <div class="form-group">
                <input type="checkbox" id="rememb">
                <label for="rem">Remember me</label>
            </div>
            <div class="mt-3 text-right">
                 I don't have account! <a href="register.php">Register.</a>
                <button class="btn text-light"  style="background-color: #3f5378;box-shadow: 3px 3px  6px  #3f5378 !important;"> 
                    <i class="fa fa-sign-in-alt" id="signicon"></i> 
                    Login
                </button>
            </div>
            
            </form>
        </div>
    </div>


<script src="js/admin.js"></script>

<script>
    $('#formlog').on('submit',function(e) {
        e.preventDefault();

        let data={
            admin_id: $('#uname').val(),
            admin_pass: $('#pass').val(),
            remember: $('#rememb').prop('checked')
        }

        $.ajax({
            type:'post',
            url:'backend/login_end.php',
            data:data,
            dataType:'json',
            beforeSend:function () {
                $('#signicon').removeClass('fa-sign-in-alt');
                $('#signicon').addClass('fa-spinner fa-pulse');
                
            },
            success:function(resp){
                if(resp.status == 'success'){
                    // console.log(resp);
                    location.href='index.php';
                }else{
                   alert(resp.message);
                }
            },
            error:function(xhr, status, message){
                console.log(status,message);
            },
            complete:function(){
                $('#signicon').addClass('fa-sign-in-alt');
                $('#signicon').removeClass('fa-spinner fa-pulse');
            }

        })
        
    })

</script>
</body>
</html>
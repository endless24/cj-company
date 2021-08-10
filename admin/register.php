<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="icon" href="img/logo.png">
        <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
        <link rel="stylesheet" href="../fa/css/all.css">
        <link rel="stylesheet" href="css/admin.css">
        <!-- Scripts -->
        <script src="../js/jquery.js"></script>
        <script src="../bootstrap4/js/bootstrap.bundle.js"></script>
    </head>
    <body style="background-color: #3f5378;">
        <div  style="margin:6vh auto; text-align:center;" class="p-2">
            <img src="img/logo.png" alt="icon" style="max-height:90px; margin:10px;">
            <span style="font-size:20px; color:white "> <b>Admin register</b></span>
            <div id="form_container" class="p-4 bg-light" >
                <form action="" id="formreg" class="text-left">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fname"><i class="fa fa-user"></i> First name</label>
                                <input type="text" id="fname" name="fname" class="form-control" style="box-shadow: 3px 3px  6px  #3f5378 !important;" >
                            </div>
                            <div class="col-md-6 " >
                                <label for="lname"><i class="fa fa-user"></i> Last Name</label>
                                <input type="text" id="lname" name="lname" class="form-control" style="box-shadow: 3px 3px  6px  #3f5378 !important;">  
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone"><i class="fa fa-phone-alt"></i> Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control" required style="box-shadow: 3px 3px  6px  #3f5378 !important;">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="username">
                                    <i class="fa fa-envelope"></i>
                                    Email
                                </label>
                                <input type="text" id="email" name="email" class="form-control" required  style="box-shadow: 3px 3px  6px  #3f5378 !important;">
                            </div>
                            <div class="col-md-6">
                                <label for="pass">
                                    <i class="fa fa-key"></i>
                                    Password
                                </label>
                                <div class="input-group">
                                    <input type="password" id="pass" name="pass" class="form-control" required style="box-shadow: 3px 3px  6px  #3f5378 !important;" >
                                    <div class="input-group-append" style="cursor:pointer; box-shadow: 3px 3px  6px  #3f5378 !important;" id="pass_eyes">
                                        <span class="input-group-text" >
                                            <i class="fa fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rem">Uplade Image</label>
                        <input type="file" id="image" name="image" class="form-control" style="box-shadow: 3px 3px  6px  #3f5378 !important;">
                    </div>
                    <div class="mt-3 text-right">
                        Already have account? <a href="login.php">Login.</a>
                        <button class="btn text-light " style="box-shadow: 3px 3px  6px  #3f5378 !important; background-color: #3f5378"> 
                            <i class="fa fa-sign-in-alt" id="regicon"></i> 
                            Register
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>


        <script src="js/admin.js"></script>

        <script>
            $('#formreg').on('submit',function(e) {
                e.preventDefault();

                let file_image = document.getElementById('image').files[0];

                let form_inputdata = new FormData();

                form_inputdata.append('image', file_image);
                form_inputdata.append('firstname', $('#fname').val());
                form_inputdata.append('lastname', $('#lname').val());
                form_inputdata.append('phone', $('#phone').val());
                form_inputdata.append('email', $('#email').val());
                form_inputdata.append('password', $('#pass').val());
                form_inputdata.append('action', 'save');

                $.ajax({
                    type:'post',
                    url:'backend/register_bkend.php',
                    data:form_inputdata,
                    processData: false,
                    contentType: false,
                    dataType:'json',
                    cache:false,
                    beforeSend: function () {
                        $('#regicon').removeClass('fa-sign-in-alt');
                        $('#regicon').addClass('fa-spinner fa-pulse');
                        
                    },
                    success: function (res){
                        if(res.status == 'success') {
                            alert(res.message);
                            location.href='login.php';  
                        }else{
                            alert(res.message);
                        }
                    },
                    error:function (xhr,status,message){
                        console.log(message);

                    },
                    complete: function(){
                    $('#regicon').addClass('fa-user-plus');
                    $('#regicon').removeClass('fa-spinner fa-pulse'); 
                    
                    }

                })
                
            })

        </script>
    </body>
</html>



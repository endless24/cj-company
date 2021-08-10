<div class="container py-4">
    <div class="alert alert-info" style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
        <strong>
            <span class="text-capitalize" id="prof">'s</span>
        </strong>
    </div>
   <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="profi">
                    <div class="card-body bg-light text-center">
                        <div class="p-1 ">
                            <img src="img/user.png" alt="" id="pro_img"  class="img-responsive rounded-circle  bg-light" style="width:9.7rem; height:9.7rem; border:1px solid ">
                            <div class="text-dark pt-2 text-capitalize" id="admin_name" >Admin Name</div>
                                <div class="d-none">
                                    <input type="file" id="file_upload">
                                </div>
                            </div>
                            <div class="pt-2" style="height:40px;">
                                <button class="btn text-light " id="btn_upload" style="display:none;margin:auto; background-color: #425274; box-shadow: 3px 3px  6px  #3f5378 !important;">Upload Image </button>
                            </div>
                        </div>
                    <div id="admin_details" class="  text-light">
                        <div class="p-3 row ">
                            <span class=" col-md-3"> 
                                <strong>Firstname: </strong><span id="fname"></span>
                            </span>

                            <span class="col-md-3 ">
                                <strong>Lastname: </strong><span id="lname"></span>
                            </span>

                            <span class="col-md-3">
                                <strong>Phone: </strong><span id="phone"></span>
                            </span>

                            <span class="col-md-3">
                                <strong>Email: </strong><span id="email"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
<div class="m-4"></div>
<div class="container">
    <div class="container">
        <div class="card" style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
        <div class="card-header text-light" id="admin_details"> <h3>Edit Profile</h3></div>
            <div class="card-body">
                <div class="row">
                    <form id="editpro">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fa fa-user"></i>
                                    <label for="fname"> Firstname</label>
                                    <input type="text" name="firstname"  id="firstname" class="form-control " style=" box-shadow: 3px 3px  6px  #3f5378 !important;" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fa fa-user"></i>
                                    <label for="lname"> Lastname</label>
                                    <input type="text" name="lastname" id="lastname"  class="form-control" style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <i class="fa fa-phone"></i>
                                    <label for="phone"> Phone</label>
                                    <input type="tel" name="phones" id="phones" disabled class="form-control" style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fa fa-envelope"></i>
                                    <label for="email"> email</label>
                                    <input type="email" name="emails" id="emails"  disabled class="form-control" style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group float-right">
                            <button class=" btn btn-md text-light" style="background-color: #3f5378;box-shadow: 3px 3px  6px  #3f5378 !important;">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                   
                   
                    
                   

<script>

   $(document).ready(function(){
       function fetch_pp() {
            $.ajax({
                type: 'post',
                url: 'backend/user_admin.php',
                dataType: 'json',
                success: function(res){
                    if(res.status == 'success'){
                        $('#pro_img').attr('src', 'img/profile_image/' + res.user.image);
                        $('#fname').text(res.user.firstname);
                        $('#lname').text(res.user.lastname);
                        $('#phone').text(res.user.phone);
                        $('#email').text(res.user.email);
                        $('#admin_name').text(res.user.firstname + ' ' + res.user.lastname);
                        $('#prof').text(res.user.firstname + "'s" + ' '+ "Profile");

                        $('#firstname').val(res.user.firstname);
                        $('#lastname').val(res.user.lastname);
                        $('#phones').val(res.user.phone);
                        $('#emails').val(res.user.email);
                        fetch_edit();
                    }else{
                        alert(res.message);
                    }
                },
                error: function (xhr,status,message) {
                    console.log(message);
                }
            });
       }
       fetch_pp();
        

       function fetch_edit() {
            $('#editpro').on('submit', function (ev) {
                ev.preventDefault();
                
                let data = {
                    firstnam:$('#firstname').val(),
                    lastnam:$('#lastname').val(),
                    fone:$('#phones').val(),
                    mail:$('#emails').val()
                }
                
                $.ajax({
                    type:'post',
                    url:'./backend/edit_profile.php',
                    data:data,
                    dataType:'json',
                    success: function (res) {
                        if (res.status == 'success') {
                            alert(res.message);
                            fetch_pp();
                        }else{
                            alert(res.message);
                        }
                    }

                })
            })
       }
       

        // profile hidden input upload
        $('#pro_img').on('click',function () {
            $('#file_upload').trigger('click');
            
        });
        // image upload
        $('#file_upload').on('change', function (e) {
            $file = e.target.files[0];
            if ($file.type == 'image/jpeg'|| $file.type == 'image/jpg' || $file.type == 'image/png' ) {
            
                let reader = new FileReader();
                reader.onload=function(ev){
                $('#pro_img').fadeOut();
                $('#pro_img').attr('src',ev.target.result)
                $('#pro_img').fadeIn();
                $('#btn_upload').slideDown('slow');
                $('#btn_upload').css('display','block');

                $('#btn_upload').on('click',function () {
                    $('#btn_upload').hide(1100);
                })
                }
                reader.readAsDataURL( $file);
            }else{
                        alert('Invalid Image File')
                
                }
            
            
        });

        $('#btn_upload').on('click', function () {
            $file = $('#file_upload')[0].files[0];
            if($file.type == 'image/jpeg' || $file.type == 'image/png' || $file.type == 'image/jpg'){
                let data = new FormData();
                data.append('image',$file )
                $.ajax({
                    type:'post',
                    url:'backend/upload_profile.php',
                    data:data,
                    dataType:'json',
                    processData:false,
                    contentType:false,
                    success: function (res) {
                        // console.log(res);
                      if(res.status == 'success') {
                        $('#side_image').fadeOut();
                        $('#side_image').attr('src', 'img/profile_image/' + res.image);
                        $('#nav_pics').attr('src', 'img/profile_image/' + res.image);
                        $('#side_image').fadeIn();
                      }
                        
                    },
                    error: function (xhr, status,message) {
                        console.log(message);
                    }



                });
            }
           
        })

    })


</script>
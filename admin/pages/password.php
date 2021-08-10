<div  style="margin:10vh auto; text-align:center;" class="p-4">
   
    <div id="form_container"  style="box-shadow: 3px 3px  6px  #3f5378 !important;">
        <div  class="p-3" style="font-size:1.5rem; background-color:#3f5378;">
            <b  style="text-shadow:0 5px 0 black; color:white">Change Password</b>
        </div>
        <form action="" id="formpass" class="text-left p-4 my-2">
        <div class="form-group">
            <label for="username">
                <i class="fa fa-key"></i>
                Old Password
            </label>
            <input type="password" id="oldpass" name="oldpass" class="form-control"   style="box-shadow: 3px 3px  6px  #3f5378 !important;" >
        </div>
        <div class="form-group">
            <label for="pass" >
                <i class="fa fa-key"></i>
                New Password
            </label>
            <div class="input-group">
                <input type="password" id="newpass" name="newpass" class="form-control"    style="box-shadow: 3px 3px  6px  #3f5378 !important;">
            </div>
        </div>
        <div class="form-group">
            <label for="pass" >
                <i class="fa fa-key"></i>
                Confirm Password
            </label>
            <div class="input-group">
                <input type="password" id="cpass" name="cpass" class="form-control"  style="box-shadow: 3px 3px  6px  #3f5378 !important;">
            </div>
        </div>
        <div class="mt-3 text-right">
            <button class="btn text-light"  style="background-color: #3f5378;box-shadow: 3px 3px  6px  #3f5378 !important;"> 
                <i class="fa fa-sign-in-alt" id="signicon"></i> 
                Update
            </button>
        </div>
        
        </form>
    </div>
</div>



<script>

    $('#formpass').on('submit', function(ev){
        ev.preventDefault();
        $pass = $('#newpass').val();
        $cpass = $('#cpass').val();
        if ($pass != $cpass) {
            alert('Password Missmatched');
        } else {
            let mydata = {
                action:'update',
                old_pass:$('#oldpass').val(),
                new_passp:$('#newpass').val(),
            }

            $.ajax({
                type:'post',
                url:'./backend/chang_pass.php',
                data: mydata,
                dataType:'json',
                success: function(res) {
                   if (res.status == 'success') {
                    alert(res.message);
                    $('#formpass').trigger('reset');
                   }
                },
                error: function (xhr, status, messege){
                    console.log(message);
                }

            }) 
        }
    });

</script>
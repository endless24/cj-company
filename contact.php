<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact us</title>
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="fa/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="./imgs/logo.png">
    
</head>
<body class="bg-light">

    <?php include_once "tools/head.php" ?>
    
    <div id="image" class="container-fluid">
        <!-- <h1 id="log">CONTACT-US</h1> -->
    </div>
    <div class="container">
        <div id="box" class="row">
            <div class="col-sm-6  text-dark p-3 text-align-justified">
                <h1 id="first">How To Find Us.</h1>
                <p>if you have any questions, fill in the  contact form
                    and <br>we will answer you shortly. if you living nearby,
                    come  visit <br><b> Cj Company</b> in our confortable office.
                </p>
                <h5>Headquarter</h5>
                <p> <i class="fa fa-map-marker"></i> NO 182, ANOKWUSTREET, BYTETLOWROAD, OWERRI, IMO <br>
                    <br>
                    <i class="fa fa-phone-volume"></i> 0817386450
                    <br>
                    <i class="fa fa-envelope "></i> cjjioke@yahoo.com

                 </p>
            </div>

            <div class="col-md-6 p-3 text-dark">
                <h1 id="second" class="mb-5">Get In Touch.</h1>
                <form id="formss">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" class="col-md-12 form-control  bg-light " id="name" required>
                            <label for=""  class="mb-4">Name:</label>   
                        </div>

                        <div class="col-sm-6">
                            <input type="email" class="col-md-12 bg-light form-control " id="email" required>
                            <label for="" class="mb-4">Email:</label>
                        </div>

                        <div class="col-sm-12">
                            <textarea class="col-sm-12 bg-light form-control  "  placeholder="Message..." id="message" required></textarea>
                        </div>
                       <div class=" col-12 mb-5">
                            <button type="submit" class="btn btn-large   col-12 mt-3 text-white" style=" background-color: #3f5378;  box-shadow: 3px 3px  6px  #3f5378 !important;">
                                <span class="fa fa-paper-plane"></span> 
                                Submit
                            </button>
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <?php include_once "tools/footer.php" ?>

        <script src="js/jquery.js"></script>
        <script src="bootstrap4/js/bootstrap.bundle.js"></script>
        <script src="js/custom.js"></script>

        <script>

            $('#formss').on('submit',function(ev){
                ev.preventDefault();

                let data={
                    cont_name:$('#name').val(),
                    cont_email:$('#email').val(),
                    cont_masg:$('#message').val()
                }

                $.ajax({
                    type:'post',
                    url:'frontend/contact.php',
                    data: data,
                    dataType: 'json',
                    success:function(res) {
                        if (res.status == 'success') {
                            alert(res.message);
                            $('#formss').trigger('reset');
                        
                        }else{
                            alert(res.message);
                        }
                       
                    }
                });
            });

        </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CJ-CHIJIOKE</title>
        <link rel="stylesheet" href="bootstrap4/css/bootstrap.css">
        <link rel="stylesheet" href="fa/css/all.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="./imgs/logo.png">
    </head>
    <body class="bg-light">
        <?php include_once "tools/head.php" ?>
        <?php include_once "modal.php" ?>

        
        <div class="container-fluid ">
            <div class="container ">
                <div class="row my-4">
                    <div class="col-md-9 ">
                        <div class="bg-dark rounded-lg">
                            <button  class="btn btn-primary btn-sm float-right mt-1 mr-1" data-toggle="modal" data-target="#del_cart_Modal">Clear Cart</button>
                            <h5 class="py-2 px-3 text-white">
                            Your Cart <span id="no_cart"> </span> (item)
                            </h5>
                           
                        </div>
                        <div class="container mb-3">
                            <div class="row" id=get_cart>
                                   <div class="card mt-3   col-md-12" id="carts">
                                       <div class="card-body p-2 pb-1 table-responsive">
                                            <table class="table table-hover " >
                                                <thead id="cart_tbl">
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Photo</th>
                                                        <th>Name</th>
                                                        <th >Quantity</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody">
                                                
                                                </tbody>
                                                <button class="btn btn-primary">Check Out</button>
                                            </table>
                                       </div>
                                   </div>
                                </div>
                        </div>
                            
                    </div>
                    
                    <div class="col-md-3">
                        <!-- <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card sidecard">
                                    <div class="card-header bg-white p-0">
                                        <h5 class="pl-3"><b class="sidcat">Most Viewed Today</b></h5>
                                    </div>
                                    <div class="card-body">
                                    
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row  mb-3 ">
                            <div class="col-md-12">
                                <div class="card sidecard">
                                    <div class="card-header bg-white p-0">
                                    <h5 class="pl-3"><b class="sidcat">Become A Subcriber</b></h5>
                                    </div>
                                    <div class="card-body p-1 " style="word-spacing:-1px ">
                                    <p class="pl-2 pb-0"> 
                                        Get free updates on the latest products and discounts,
                                        straight to your inbox.
                                    </p>
                                    <div class=" col-md-12 pl-2 py-0 " id="Subemail">
                                        <form >
                                            <div class="input-group ">
                                                <input type="email"  name="email"  id="email"  class="form-control" />
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">
                                                        <i class="fa fa-envelope"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div><div class="row  mb-3">
                            <div class="col-md-12">
                                <div class="card sidecard">
                                    <div class="card-header bg-white p-0">
                                        <h5 class="pl-3"><b class="sidcat"> Follow us on Social Media</b></h5>
                                    </div>
                                    <div class="card-body p-2">
                                        <a href="#"><i class="fab fa-facebook fa-2x mr-1"></i></a>
                                        <a href="#"><i class="fab fa-twitter fa-2x mr-1"></i></a>
                                        <a href="#"><i class="fab fa-instagram fa-2x mr-1"></i></a>
                                        <a href="#"><i class="fab fa-telegram fa-2x mr-1"></i></a>
                                        <a href="#"><i class="fab fa-google-plus fa-2x text-danger"></i></a>
                                        <a href="#"><i class="fab fa-linkedin rounded-circle fa-2x mr-1"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

        



        <script src="js/jquery.js"></script>
        <script src="bootstrap4/js/bootstrap.bundle.js"></script>
        <script src="js/custom.js"></script>
      
    </body>
</html>

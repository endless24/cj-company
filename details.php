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
       
        <div class="container-fluid ">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-9" >
                <div class="bg-dark rounded-lg">
                    <h5 class="py-2 px-3 text-white">
                       Product Details
                    </h5>
                </div>
                <div class="container">
                    <div class="row mt-4" id="details">
                       
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
                            <div class="card-body p-1">
                            <p class="pl-2 pb-0"> Get free updates on the latest products and discounts,
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


    
     
        <?php include_once "tools/footer.php" ?>

        <script src="js/jquery.js"></script>
        <script src="bootstrap4/js/bootstrap.bundle.js"></script>
        <script src="js/custom.js"></script>
        
      <script>


                // Record Views
            function recordViews() {
                let url = new URL(location.href);
                $pid = url.searchParams.get('product_id');
                if($pid != '' && $pid != null){
                    $.ajax({
                        type:'post',
                        url: './frontend/views.php',
                        dataType: 'json',
                        data: {product_id : $pid},
                        success: function(response){
                            console.log(response);
                        }
                    })
                }
            }
            recordViews();


            function numberFormat(x) {
             return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
             }

            let pageUrl = new URL(window.location.href);
            let id  = pageUrl.searchParams.get('product_id');
            function pro_details() {
                    $.ajax({
                    type: 'post',
                    url: 'http://localhost/cj-company/frontend/all_product.php',
                    data: { action: 'details', product_id:id },
                    dataType: 'json',
                    cache: false,
                    success: function(res){
                        // console.log(res);
                        if (res.status == 'success') {
                                $list ='';
                                res.detail.forEach(function (list) {
                                    // console.log(list);
                                                $list +=` <div class="col-md-5">
                                                                <img src="imgs/product_img/${list.image}" alt="" style="width:100%; min-height:200px">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h4 class="mb-3 pt-2">
                                                                    ${list.product}
                                                                </h4>
                                                                <div class="py-2">
                                                                    <h4><b>&#8358;${numberFormat(list.price)}</b></4>
                                                                </div>
                                                                <div class="py-1">
                                                                    <span><b>category:</b></span>
                                                                    <a href="#" style="text-decoration:none">
                                                                    ${list.category}
                                                                    </a>
                                                                </div>
                                                                <div class="mt-4">
                                                                    <button type='button' id='${list.id}' class="btn btn-warning">
                                                                    <i class='fa fa-shopping-cart'style="font-size:15px" id="add_cart"> Add to Cart</i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-10">
                                                                <div class="py-3 ">
                                                                    <span><b>descriptions:</b></span>
                                                                    <p class="text-justify">
                                                                    ${list.Description}
                                                                    </p>
                                                                </div>
                                                            </div>`
                                });
                                $('#details').html($list);
                            }
                    }
                })
                
            }
            pro_details();



      </script>

    </body>
</html>

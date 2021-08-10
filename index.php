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
        <?php include_once "tools/banner.php" ?>
        <?php include_once "tools/body.php" ?>
        <?php include_once "tools/footer.php" ?>


      
    
     

        <script src="js/jquery.js"></script>
        <script src="bootstrap4/js/bootstrap.bundle.js"></script>
        <script src="js/custom.js"></script>

        <script>
        function numberFormat(x) {
             return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
             }

            $(document).ready(function () {
                    
                    $.ajax({
                    type:'post',
                    url: 'frontend/all_product.php',
                    data:{action:'get_products'},
                    dataType:'json',
                    success: function (res) {
                        if (res.status == 'success') {
                            $list ='';
                            res.product_list.forEach(function (list) {
                                // console.log(list);
                                $list +=`<div class="card p-2 col-md-2 mb-2 m-2 " id="pro_card" >
                                           <a href="details.php?product_id=${list.id}"  style="text-decoration:none" >
                                            <div class="card-body p-1">
                                                <div class="  bg-white card-img-top card-image" >
                                                    <img src="imgs/product_img/${list.image}" alt="" class="img-responsive rounded"  style="max-width:100%" >
                                                </div>
                                            </a>
                                            </div>
                                            <div class="pl-1 py-3"> 
                                                <div><a href="details.php?product_id=${list.id}" style="text-decoration:none">${list.product}</a></div>
                                                <div class="pt-2">&#8358;${numberFormat(list.price)}</div>
                                            </div>
                                            <div class="card-footer  bg-white pl-1" id='${list.id}' >
                                                <button   class="px-2 col-12 btn btn-warning"  id="addcart" > 
                                                  <small  > Add to Cart <i class="fa fa-shopping-cart"></i></small>
                                                </button>
                                            </div>
                                        </div>`
                            });
                            $('#get_pro').html($list);
                        }
                    }
                });
        
            })

             
       
        </script>
    </body>
</html>

<div class="pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card" style="box-shadow: 3px 3px  6px  #3f5378 !important;">
                    <div class="card-body">
                        <h1 id='no_users'>0</h1>
                        <div style="font-size:1.2rem;"> <i class="fa fa-clipboard-list"></i> Categories</div>
                        <small> <a href="index.php#category" class="nav-link pagenav" id="category"   >View registered Category</a></small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card" style="box-shadow: 3px 3px  6px  #3f5378 !important;">
                    <div class="card-body">
                        <h1 id='no_product'>0</h1>
                        <div style="font-size:1.2rem;"> <i class="fab fa-medapps"></i> Products</div>
                        <small><a href="index.php?#product" class="nav-link pagenav" id="product">View Product</a></small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card" style="box-shadow: 3px 3px  6px  #3f5378 !important;">
                    <div class="card-body">
                        <h1 id='no_visits'>0</h1>
                        <div style="font-size:1.3rem;"> <i class="fa fa-user-friends"></i> Visitors</div>
                        <small><a href="index.php?#visitors" class="nav-link pagenav">View Number of Visitors</a></small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card" style="box-shadow: 3px 3px  6px  #3f5378 !important;">
                    <div class="card-body">
                        <h1 id='no_views'>0</h1>
                        <div style="font-size:1.1rem;"> <i class="fa fa-eye"></i>  Total Product Viewed</div>
                        <small><a href="#" class="nav-link">Number Of Product Viewed</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
         <?php   include_once "../charts/category_analysis.html"?>

    </div>
    <div class="col-md-6 ">
      <?php   include_once "../charts/chartss.html"?>
    </div>
</div>

<!-- <div class="container pt-4 ">
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-">
                <div class="card-body p-0">
                    <img src="img/maz.jpg"  alt=""style="width:100%">
                </div>
            </div>
        </div>
        <div class="col-md-6" >
        <div class="card" >
                <div class="card-body  bg-danger p-0" >
                    <img src="img/chartt.png"  alt=""style="width:100%;height:270px!important">
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="container-fluid pt-4 ">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-secondary">
             <img src="img/tre.jpg"  alt=""style="width:100%">
                </div>
            </div>
        </div>
    </div>
</div>
 -->






<script>
    function count_no_cat() {
        $.ajax({
            type: 'post',
            url:'./backend/add_category.php',
            data:{action:'count'},
            dataType: 'json',
            success: function(res){
                if (res.status == 'success') {
                    // $('#counter').text(res.no_categories);
                    $('#no_users').text(res.no_categories);
                    // catlist();
                }else{
                    alert(res.message);
                }
                
            },
            error:  function (xhr,status,message) {
                console.log(message);
            }
        });
        
    }
     count_no_cat();


    function count_no_pro() {
        $.ajax({
            type: 'post',
            url:'./backend/add_product.php',
            data:{action:'count'},
            dataType: 'json',
            success: function(res){
                if (res.status == 'success') {
                    $('#no_product').text(res.no_product);
                    // fetchprod();
                }else{
                    alert(res.message);
                }
                
            },
            error:  function (xhr,status,message) {
                console.log(message);
            }
        });
        
    }
     count_no_pro();

  
     function count_no_visits() {
        $.ajax({
            type: 'post',
            url:'./backend/visitors.php',
            data:{action:'no_visits'},
            dataType: 'json',
            success: function(res){
                if (res.status == 'success') {
                    $('#no_visits').text(res.no_visits);
                }else{
                    alert(res.message);
                }
                
            },
            error:  function (xhr,status,message) {
                console.log(message);
            }
        });
        
    }
    count_no_visits();



    function count_no_views() {
        $.ajax({
            type: 'post',
            url:'./backend/view.php',
            dataType: 'json',
            success: function(res){
                if (res.status == 'success') {
                    $('#no_views').text(res.no_views);
                    // console.log(res);
                }else{
                    alert(res.message);
                }
                
            },
            error:  function (xhr,status,message) {
                console.log(message);
            }
        });
        
    }
    count_no_views();

</script>
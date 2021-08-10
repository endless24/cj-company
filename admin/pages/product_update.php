<div class="container pt-4">

<div class="alert alert-info" style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
    <strong>
        <span id="counterp"></span> product in store.
    </strong>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 mb-4 mb-4">
            <!-- Add Category card -->
            <div class="card"  style=" box-shadow: 3px 3px  6px  #3f5378 !important;">

                <div class="card-header text-light"  style="background-color: #3f5378;">
                    <strong class="card-title">
                        <i class="fa fa-plus"></i> Update a Product
                    </strong>
                </div>

                <div class="card-body">
                    <form id="frm_product_update" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product">Product</label>
                            <input type="text"  class="form-control" name="products" id="products" placeholder="Enter product name" required autofocus style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
                        </div>
                        <div class="form-group">
                            <label for="cat">Category</label>
                            <select name="cat" id="cat"  class="form-control" required  style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
                                <option value="df">Select Category</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="price">Price</label>
                                <input type="text" placeholder="Enter product price" class="form-control" name="price" id="price" required style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
                            </div>
<!-- 
                            <div class="col-md-6">
                                <label for="discount">Discount <small>(If any!)</small></label>
                                <input type="text" placeholder="Enter Discount" class="form-control" name="discount" id="discount">
                            </div> -->
                        </div>
                        <div class="form-group">
                            <label for="image">Product Image</label><br>
                            <img src="" alt="Image Not found" style="max-width:100%;" id="pro_image_preview">
                            <input type="file" name="image" id="image" class="form-control"  style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
                        </div>


                        <div class="form-group">
                            <label for="desc">Product Description</label>
                            <textarea name="desc" id="desc" rows="5" class="form-control" style=" box-shadow: 3px 3px  6px  #3f5378 !important;"></textarea>
                        </div>
                        
                        <div class="form-group float-right">
                            <button class="btn  btn-sm text-white" style=" background-color: #3f5378; box-shadow: 3px 3px  6px  #3f5378 !important;" >
                                <i class="fa fa-save"></i> Update product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4 ">
            <div class="card"  style=" box-shadow: 3px 3px 6px  #3f5378 !important;">
                <div class="card-header text-light"  style="background-color: #3f5378;">
                    <strong class="card-title">
                        <i class="fa fa-list"></i> List of Products
                    </strong>
                </div>

                <div class="card-body p-0" style="max-height:810px; overflow-y:auto; overflow-x:hidden;">
                    <ul class="list-group" id="complete_list">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>    
</div>


<div class="modal fade" id="customModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    
                </div>
            </div>
        </div>
    </div>

<script>
    var catid;
    $url = new URL(window.location.href);
    $id = $url.searchParams.get('id')
    // console.log($id);
        $.ajax({
            type: 'post',
            url: './backend/add_product.php',
            data: {action:'view', id:$id},
            dataType: 'json',
            success: function(response){
                if(response.status == 'success'){
                    catid = response.product.category;
                    $('#products').val(response.product.product);
                    $('#price').val(response.product.price);
                    $('#desc').val(response.product.Description);
                    $('#pro_image_preview').attr('src', '../imgs/product_img/' + response.product.image);
                   
                    
                }
            }
        });

        $('#frm_product_update').on('submit', function(e){
        e.preventDefault();
        let image_file;
        console.log(document.getElementById('image').files);
        if(document.getElementById('image').files.length > 0){
            image_file = document.getElementById('image').files[0];
        }else{
            image_file = '';
        }
        // instantiate an object of  the class FormData()
        let form_data = new FormData();
        // Append the data to the form data object
        form_data.append('image', image_file);
        form_data.append('product_name', $('#products').val());
        form_data.append('price',  $('#price').val());
        form_data.append('desc',  $('#desc').val());
        form_data.append('category',  $('#cat').val());
        form_data.append('id', $id);
        form_data.append('action', 'update');

        $.ajax({
            type: 'post',
            url: './backend/add_product.php',
            data: form_data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response){
                if(response.status == 'success'){
                    $('#frm_add_product').trigger('reset');
                    alert(response.message)
                    window.location.href = 'http://localhost/cj-company/admin/index.php?#product'
                }else{
                    alert(response.message)
                }
            }
        })

    })

    function fetchprod(){
        $.ajax({
            type:'post',
            url:'./backend/add_product.php',
            data:{action:'get_products'},
            dataType:'json',
            success: function(res){
                if(res.status === 'success'){
                    $list = '';
                    res.product_list.forEach(function (list) {
                        // console.log(list);
                        $list += `<li class="list-group-item row m-3 " id="${list.id}" style="box-shadow: 3px 3px  6px  #3f5378 !important;">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <img src="../imgs/product_img/${list.image}" style="max-width:30%" />
                                            <h3 class="my-3">${list.product}</h3>
                                                <small class="mr-2"><i class="fa fa-eye "></i> Views</small>
                                                <small><i class="fa fa-thumbs-up"></i> Like</small>
                                        </div>
                                        <div class="col-md-2">
                                            
                                            <span class="float-right py-1 px-2 del_product m-2   rounded-circle" role="button" style=" background-color:#3f5378;">
                                                <i class="fas fa-trash text-light" title="Delete"></i>
                                            </span>
                                            <a href="?id=${list.id}#product_update" class="float-right m-2 rounded-circle  py-1 px-2  product_update" role="button" style=" background-color:#3f5378;">
                                                <i class="fas fa-edit text-light" title="Edit"></i>
                                            </a>
                                            <span class="float-right py-1 px-2 view_product rounded-circle m-2" role="button" style=" background-color:#3f5378;">
                                                <i class="fas fa-eye text-light" title="View"></i>
                                            </span>
                                            
                                        </div>
                                    </div>
                                </li>`;
                    });
                    $('#complete_list').html($list);
                }
            },
            error: function (xhr,status,message){
                console.log(message);
                
            }
        });
    }
    fetchprod();

    
    function fetchCat() {
        $.ajax({
            type: 'post',
            url: './backend/add_category.php',
            data: {action: 'fetch_category'},
            dataType: 'json',
            success: function(response){
                if(response.status === 'success'){
                    $html = '<option value="">Select Category</option>';
                    response.cat_list.forEach(function(list){
                        $html += `<option value="${list.category}">${list.category}</option>`;
                    });
                    $('#cat').html($html);
                }
            }
        })
    }
    fetchCat();


    function count_no_pro() {
        $.ajax({
            type: 'post',
            url:'./backend/add_product.php',
            data:{action:'count'},
            dataType: 'json',
            success: function(res){
                if (res.status == 'success') {
                    $('#counterp').text(res.no_product);
                    fetchprod();
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



    $('#frm_add_product').on('submit', function(e){
        e.preventDefault();
        let image_file = document.getElementById('image').files[0];
        let form_data = new FormData();
        form_data.append('image', image_file);
        form_data.append('product_name', $('#products').val());
        form_data.append('produc_price', $('#price').val());
        form_data.append('desc',  $('#desc').val());
        form_data.append('category',  $('#cat').val());
        form_data.append('action', 'add');
        $.ajax({
            type: 'post',
            url: './backend/add_product.php',
            data: form_data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res){
                // console.log(res);
                if(res.status == 'success'){
                    $('#frm_add_product').trigger('reset');
                    alert(res.message);
                    fetchprod();
                    count_no_pro();
                }else{
                    alert(res.message)
                }
            },
            error: function (xhr,status,message) {
                console.log(message);
            }
        })

    });

    $('#complete_list').on('click', '.view_product', function () {
        $id = $(this).parent('div').parent('div').parent('li').attr('id');
        $.ajax({
            type: 'post',
            url: './backend/add_product.php',
            data: {action:'view', id:$id},
            dataType: 'json',
            success: function(response){
                if(response.status == 'success'){
                    // console.log(response);
                    $('#customModal').on('show.bs.modal', function(){
                        $('#customModal .modal-body').addClass('p-0')
                        $('#customModal .modal-body').html(`
                            <div class="card">
                                <div class="card-body p-0">
                                   <div class="row">
                                        <div class="col-md-6">
                                             <img src="../imgs/product_img/${response.product.image}" class="card-img-top img-responsive" />
                                        </div>
                                        <div class="col-md-6 text-left p-3 ">
                                           <div class="row">
                                                <div class="col-sm-12 py-3 my-2" >
                                                    <span class="p-3 " style=" box-shadow: 3px 3px  6px  #3f5378 !important; border-radius:10px;">
                                                        <strong>Product Name:</strong>  ${response.product.product}
                                                    </span>
                                                </div>
                                                <div class="col-sm-12 py-3 my-2">
                                                    <span class="p-3 " style=" box-shadow: 3px 3px  6px  #3f5378 !important; border-radius:10px;"> 
                                                        <strong>Category:</strong> ${response.product.category}
                                                    </span>
                                                </div>
                                                <div class="col-sm-12 py-3 my-2">
                                                    <span > 
                                                    <strong class="p-3" style=" box-shadow: 3px 3px  6px  #3f5378 !important; border-radius:10px;">Description:</strong> <br class="mb-4"> ${response.product.Description}
                                                    </span>
                                                </div>
                                               
                                           </div>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        `);
                    });
                    $('#customModal').modal('show');
                }else{
                    $('#customModal').on('show.bs.modal', function(){
                        $('#customModal .modal-body').html(`
                            <i class="fa fa-times-circle text-danger" style="font-size:1.3rem"></i>
                            <strong>${response.message}</strong>
                        `);
                    });
                    $('#customModal').modal('show');
                }
            }
        });
    });

    $('#complete_list').on('click', '.del_product', function () {
        $id = $(this).parent('div').parent('div').parent('li').attr('id');
        $html = `
            <i class="fa fa-times-circle fa-2x text-danger"></i>
            <h4>Are you sure you want to delete this product?</h4>
            <button class="btn btn-primary btn-sm" data-dismiss="modal">
                <i class="fa fa-times-circle"></i> Cancel
            </button>
            <input type="hidden" id="category" value="${$id}">
            <button class="btn btn-danger btn-sm" id="confirmDelete">
                <i class="fa fa-trash"></i> Delete
            </button>
        `;

        $('#customModal').on('show.bs.modal', function(){
            $('#customModal .modal-body').html($html);
        });
        $('#customModal').modal('show');
    });

    function deleteProduct(proId) {
        $.ajax({
            type: 'post',
            url: './backend/add_product.php',
            data: {action:'delete', id:proId},
            dataType: 'json',
            success: function(response){
                if(response.status === 'success'){
                    $('#customModal').on('show.bs.modal', function(){
                        $('#customModal .modal-body').html(`
                            <i class="fa fa-check-circle text-success" style="font-size:1.3rem; padding:20px;"></i>
                            <strong>${response.message}</strong>
                        `);
                    });
                    $('#customModal').modal('show');
                    fetchprod();
                }else{
                    $('#customModal').on('show.bs.modal', function(){
                        $('#customModal .modal-body').html(`
                            <i class="fa fa-times-circle text-danger" style="font-size:1.3rem"></i>
                            <strong>${response.message}</strong>
                        `);
                    });
                    $('#customModal').modal('show');
                }
            }
        });
    }

    $('.modal-body').on('click', '#confirmDelete', function(){
        $id = $(this).siblings('input').val();
        $('#customModal').modal('hide')
        $('#customModal').on('hidden.bs.modal', function(){
            deleteProduct($id)
        });
    });


</script>
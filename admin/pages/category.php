<div class="container pt-4">

    <div class="alert alert-info"style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
        <strong>
            <span id="counter"></span> Category Found.
        </strong>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <!-- Add Category card -->
                <div class="card "  style=" box-shadow: 3px 3px  6px  #3f5378 !important;">

                    <div class="card-header text-light" style="background-color: #3f5378;">
                        <strong class="card-title">
                            <i class="fa fa-plus"></i> Add Category
                        </strong>
                    </div>

                    <div class="card-body">
                        <form id="frm_add_cat">
                            <div class="form-group">
                                <label for="cat">Category</label>
                                <input type="text" name="cat" id="cat"  class="form-control" required style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
                            </div>

                            <div class="form-group float-right">
                                <button class="btn  btn-sm text-white" style=" background-color: #3f5378;  box-shadow: 3px 3px  6px  #3f5378 !important;">
                                    <i class="fa fa-save"></i> Save Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- List of Category card -->
                <div class="card" style=" box-shadow: 3px 3px  6px  #3f5378 !important;">

                    <div class="card-header text-light"  style="background-color: #3f5378;">
                        <strong class="card-title">
                            <i class="fa fa-list"></i> List of Category
                        </strong>
                    </div>

                    <div class="card-body p-0" style="max-height:400px; overflow:auto;">
                        <ul class="list-group" id="complete_list">
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <div class="modal fade" id="cCatDel">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    Confirm Delete?             
                </div>
                <div class="modal-body text-center">
                    <i class="fa fa-times-circle fa-2x text-danger"></i>
                    <h4>Are you sure you want to delete <span id="cat_span"></span> category?</h4>
                    <input type="hidden" id="category">
                </div>
                <div class="modal-footer py-1 px-2">
                    <button class="btn btn-primary btn-sm" data-dismiss="modal">
                        <i class="fa fa-times-circle"></i> Cancel
                    </button>
                    <button class="btn btn-danger btn-sm" id="catdel_btn">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alertModal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    function catlist(){
        $.ajax({
            type:'post',
            url:'./backend/add_category.php',
            data:{action:'list'},
            dataType:'json',
            success: function (res) {
                if (res.status =='success') {
                    $list='';
                    res.category_list.forEach( function (category) {
                        $list+=` <li class="list-group-item m-2 p-2" id="listcat">
                                ${category}
                                <span class="float-right py-1 px-2 del_category"  id="${category}">
                                        <i class="fas fa-trash text-light p-2 rounded-circle" title="delete category" style=" background-color:#3f5378;"></i>
                                 </span>
                                </li >`
                    });
                    $('#complete_list').html($list);
                }else{
                    console.log(res.message);
                }
                
            },
            error: function (xhr,status,message) {
                console.log(message);
            }
        });
    }


    function count_no_cat() {
        $.ajax({
            type: 'post',
            url:'./backend/add_category.php',
            data:{action:'count'},
            dataType: 'json',
            success: function(res){
                if (res.status == 'success') {
                    $('#counter').text(res.no_categories);
                    catlist();
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



    $('#frm_add_cat').on('submit', function (ev) {
        ev.preventDefault();
        $categorys = $('#cat').val();

        $.ajax({
            type:'post',
            url:'./backend/add_category.php',
            data:{action:'add', category: $categorys },
            dataType:'json',
            success:function (res){
                if(res.status == 'success') {
                    $('#frm_add_cat').trigger('reset');
                    count_no_cat();
                }else{
                    alert(res.message);
                }
                
            },
            error:function (xhr,status,message){
                console.log(message);
            }
        });
    })

    $('#complete_list').on('click', '.del_category', function(){
        $category = $(this).attr('id');
        $('#cCatDel').on('show.bs.modal', function(){
            $('input[id=category]').val($category)
            $('#cat_span').text($category)
        })
        $('#cCatDel').modal('show');

    });

    $('#catdel_btn').on('click', function(){
        $category = $('input[id=category]').val();
        $.ajax({
            type: 'post',
            url: './backend/add_category.php',
            data: {action:'delete', category: $category},
            dataType: 'json',
            success:function(res){
                if(res.status == 'success'){
                    console.log(res.status);
                    $('#alertModal').on('show.bs.modal', function(){
                        $('#alertModal .modal-body').html(`<i class="fa fa-check-circle fa-2x text-success"></i>
                    <h4>${res.message}</h4>`)
                    })
                    $('#cCatDel').modal('hide');

                    $('#cCatDel').on('hidden.bs.modal', function(){
                        $('#alertModal').modal('show'); 
                        count_no_cat();
                    });
                    
                }else{
                    $('#alertModal').on('show.bs.modal', function(){
                        $('#alertModal .modal-body').html(`<i class="fa fa-times-circle fa-2x text-danger"></i>
                    <h4>${res.message}</h4>`)
                    })
                    $('#cCatDel').modal('hide');

                    $('#cCatDel').on('hidden.bs.modal', function(){
                        $('#alertModal').modal('show'); 
                    });
                }
            },
            error: function(xhr, status, msg){
                console.log(msg);
            }
        });
    });


</script>
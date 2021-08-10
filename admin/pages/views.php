
<div class="container pt-4">

    <div class="alert alert-info"style=" box-shadow: 3px 3px  6px  #3f5378 !important;">
        <strong>
            <span id="counter"></span>Viewed Found.
        </strong>
    </div>
    <div class="pt-3">
        <div class="container">
            <div class="row" id="viewers">
                
            </div>
        </div>
    </div>
</div>


<div class="modal fade " id="proModal">
    <div class=" modal-dialog modal-dialog-centered ">
       <div class="modal-content">
            <div class="modal-body p-0 ">
                
            </div>
       </div>
    </div>
</div>

<script>
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
                    $list += ` <div class=" col-md-4 mb-3" >
                                    <div class="card" id="${list.id}" style="box-shadow: 3px 3px  6px  #3f5378 !important;" >
                                        <div class="card-header text-center bg-white p-0">
                                            <img src="../imgs/product_img/${list.image}" alt="" class="img-responsive rounded"  style="max-width:100%; max-height:9.9rem">
                                        </div>
                                        <div class="card-body  pl-3">
                                            <section class="my-3">${list.product}</section>
                                           <a href="?prodcut_id=${list.id}#views" id="pro_id" style=" text-decoration:none"  data-toggle="modal" data-target="#myModal" > <span class="mr-2"><i class="fa fa-eye "></i> ${list.no_views} Views</span></a>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    $('#viewers').html($list);
                }
            },
            error: function (xhr,status,message){
                console.log(message);
                
            }
        });
    }
    fetchprod();



    $('#viewers').on('click','#pro_id', function () {
        $pid = $(this).parent('div').parent('div').attr('id');
        // console.log( $pid);
        function fetchprod_modal(){
            $.ajax({
                type:'post',
                url:'./backend/add_product.php',
                data:{action:'view', id:$pid},
                dataType:'json',
                success: function(res){
                    if(res.status === 'success'){
                        console.log(res);
                        $('#proModal').on('show.bs.modal', function(){
                          $('#proModal .modal-body');
                            $('#proModal .modal-body').html(`
                                <div class="card">
                                    <div class="card-body p-1">
                                        <div class="row">
                                            <div class="col-md-8" >
                                                <img src="../imgs/product_img/${res.product.image}" alt="" style="max-width:100%">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row pl-3">
                                                    <div class="col-md-12 mt-5 ">
                                                    <span class="px-4 py-1" style=" box-shadow: 3px 3px  6px  #3f5378 !important; border-radius:10px;">
                                                        ${res.product.product}
                                                    </span>
                                                   </div>
                                                    <div class="col-md-12 mt-4">
                                                        <span class="px-4 py-1" style=" box-shadow: 3px 3px  6px  #3f5378 !important; border-radius:10px;">
                                                            ${res.product.price}
                                                        </span>
                                                    </div>
                                                    <div class="col-md-12 mt-4">
                                                        <span class="px-4 py-1" style=" box-shadow: 3px 3px  6px  #3f5378 !important; border-radius:10px;">
                                                             ${res.product.category}
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <img src="img/max.jpg" alt="" style="max-width:100%; max-height:100%">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            `);
                        });

                        $('#proModal').modal('show');
                    }
                },
                error: function (xhr,status,message){
                    console.log(message);
                    
                }
            });
        }
        fetchprod_modal();
    })
   

</script>
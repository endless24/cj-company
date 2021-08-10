// scearch on admin nav
$(document).ready(function(){
        $('#mb-search-btn').on('click', function () {
            $('#topsearch').slideToggle('fast');
            $('#toplogin').slideToggle('fast');
        });

        // script for adding quatity
        $('#carts').on('click', '#add', function () {
            $qty = parseInt($('#det-qty').val());
            $('#det-qty').val($qty + 1);
        });
        $('#carts').on('click', '#minus', function () {
            $qty = parseInt($('#det-qty').val());
            if($qty > 0){
                $('#det-qty').val($qty - 1);
            }
        });
        // records of visitors
        function recordVisits() {
            $.ajax({
                type:'get',
                url: './frontend/visitors.php',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                }
            })
        }
        recordVisits();


        // add to cart in th product details page
        $('#details').on('click','#add_cart', function () {
            $id = $(this).parent('button').attr('id');
            $.ajax({
                    type:'post',
                    url: './frontend/cart.php',
                    dataType: 'json',
                    data: {action : 'add', id: $id},
                    success: function(res){
                        alert(res.message);
                        getCartItems();
                        
                    }
                })
        })
        
        // add to cart in the main page
        $('#get_pro').on('click','#addcart', function () {
            $id = $(this).parent('div').attr('id');
            console.log( $id);
            $.ajax({
                type:'post',
                url: './frontend/cart.php',
                dataType: 'json',
                data: {action : 'add', id: $id},
                success: function(res){
                    alert(res.message);
                    getCartItems();
                    
                }
            })
        })
    

        function getCartItems(){
        $.ajax({
            type: 'post',
            url: 'frontend/cart.php',
            data: {action:'count'},
            dataType: 'json',
            success:function(res){
                if(res.status == 'success'){
                    if (res.no_items > 0) {
                        $('#msg_icon').text(res.no_items);
                        $('#cart_on').text(res.no_items);
                        $('#no_cart').text(res.no_items);
                    } else {
                        $('#msg_icon').text('');
                        $('#cart_on').text('');
                        $('#no_cart').text('');
                    }
                }else{
                    alert(res.message);
                }
            },
            error: function(xhr, status, msg){
                console.log(msg);
            }
        });
    }
    getCartItems();



    function numberFormat(x) {
        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }
    function fetchCartItems() {
        $.ajax({
            type: 'post',
            url: 'frontend/cart.php',
            data: {action: 'fetch_items'},
            dataType: 'json',
            success: function(res){
                if(res.status === 'success'){
                        // console.log(res);
                    $itemList = '';
                    $amount = 0;
                    res.items.forEach(function (item) {
                        $amount = $amount + (item.qty * item.product.price);
                                $itemList +=`
                                <tr id="${item.product.id}">
                                <td class="text-light " id="del_cart" >
                                    <button class="btn btn-danger btn-sm text-light ">Remove</button>
                                </td>
                                <td>
                                <img src="imgs/product_img/${item.product.image}" alt="" class="rounded" style="width:50px;">
                                </td>
                                <td>
                                    <strong>${item.product.product}</strong>
                                </td>
                                <td > 
                                <span class="input-group">
                                    <span class="row" >
                                            <div class="input-group-prepend">
                                                <button type="button" id='minus' class="btn btn-sm btn-dark"><i class='fa fa-minus'></i></button>
                                            </div>
                                                <input type='text' class="form-control" value='1' id="det-qty" style="width:50px;">
                                            <div class="input-group-append ">
                                                <button type='button' id='add' class="btn btn-dark btn-sm " ><i class='fa fa-plus'></i></button>
                                            </div>
                                        </span>
                                    </span>
                                    </td>
                                <td>&#8358; ${ numberFormat(item.product.price) }</td>
                            </tr>
                            
                        `;
                       
                    });
                     $itemList += `<tr>
                        <td colspan="4" class="text-right">
                            <strong>Total Amount:</strong>
                        </td>
                        <td>&#8358; ${ numberFormat($amount)}</td>
                        </td>
                        
                    </tr>
                    `;
                    $('#cart_amt').text( numberFormat($amount));
                    $('#tbody').html($itemList);
                    
                 }
                
            }
        });
    }
    fetchCartItems();

    // button to clear cart table
    $('#btn_claer').on('click', function(){
        $.ajax({
            type: 'post',
            url: 'frontend/cart.php',
            data: {action: 'clear_cart'},
            dataType: 'json',
            beforeSend: function(){
                $('#del_cart_Modal').modal('hide');
            },
            success: function(res){
                if(res.status === 'success'){
                    console.log(res);
                    $('#confirm_cart_modal .modal-body h4').html(res.message);
                    $('#confirm_cart_modal').modal('show');
                    fetchCartItems(); 
                    getCartItems()
                }
            }
        })
    });

    // button to delete a cart on the table
    $('#tbody').on('click','#del_cart', function(){
        $id = $(this).parent('tr').attr('id');
        console.log($id);
        $.ajax({
            type: 'post',
            url: 'frontend/cart.php',
            data: {action:'delete_cart', id:$id},
            dataType: 'json',
            // beforeSend: function(){
            //     $('#del_cart').modal('hide');
            // },
            success: function(res){
                if(res.status === 'success'){
                    console.log(res);
                    $('#confirm_cart .modal-body h4').html(res.message);
                    $('#confirm_cart').modal('show');
                    fetchCartItems(); 
                    getCartItems()
                }
            }
        })
    });
    
});

//     $itemList = '';
                //     $amount = 0;
                //     response.items.forEach((item, i) => {
                //         $itemList += `<tr id="${item.product.id}">
                //                     <th scope="row">${i + 1}</th>
                //                     <td>${item.product.product}</td>
                //                     <td>${item.qty}</td>
                //                     <td>${item.product.price}</td>
                //                     <td>
                //                         <i class="fa fa-trash text-danger" role="button"></i>
                //                     </td>
                //                 </tr>`;
                //         $amount = $amount + (item.qty * item.product.price);
                //     });
                //     $itemList += `<tr>
                //                 <td colspan="3" class="text-end">
                //                     <strong>Total Amount:</strong>
                //                 </td>
                //                 <td>&#8358; ${ numberFormat($amount) }</td>
                //                 <td>
                //                 </td>
                //             </tr>`;

                //     $('#cart-table').html($itemList);
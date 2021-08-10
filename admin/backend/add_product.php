<?php
    include_once "server_con.php";

    $response =[];

    $action = $_POST['action'];

    if ($action == 'add') {
        $image = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];

        $image_name = pathinfo($image, PATHINFO_FILENAME);
        $image_ex = pathinfo( $image,PATHINFO_EXTENSION);
        $name2save =  $image_name . time() . '.' . $image_ex;

        $path2upload = '../../imgs/product_img/'. $name2save;
       
        if (move_uploaded_file($temp_name, $path2upload)) {
            $product = $_POST['product_name'];
            $desc = $_POST['desc'];
            $cat = $_POST['category'];
            $prices = $_POST['produc_price'];

           $check_pro = $conn->query("SELECT * FROM product_tbl WHERE product='$product'");
           $no_product = $check_pro->num_rows;
           if ($no_product > 0) {
               $response = [
                   'status' => 'Error',
                   'message' => 'Product already exsit'
               ];
           }else {
            $insert_prod = $conn->query("INSERT INTO product_tbl(product,category,price,image, description) 
            VALUES('$product','$cat','$prices','$name2save','$desc')");
             if($insert_prod){
                $response = [
                    'status' => 'success',
                    'message' => 'Product uploaded successfully!'
                ];
            }else{
                unlink($path2upload);
                $response = [
                    'status' => 'error',
                    'message' => 'An error occured! ' . $conn->error
                ];
            }
         }
           
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occured! Unable to upload image.'
            ];
        }
    }elseif($action == 'get_products'){
        $fetch = $conn->query("SELECT * FROM product_tbl ORDER BY created_at DESC");
        $list = [];
        while ($products = $fetch->fetch_array()) {
            $products['no_views'] = getProductView($products['id'], $conn);
            array_push($list, $products);
        }
        $response = [
            'status' => 'success',
            'product_list' => $list
    
          ];
    }elseif($action === 'count') {
        $products = $conn->query("SELECT * FROM product_tbl");
        if ($products) {
            $response = [
                'status' => 'success',
                'no_product' =>    $products->num_rows
            ];
        }else {
            $response = [
                'status' => 'error',
                'message' => 'An error occured!' .$conn->error
            ];
        }
    }elseif($action === 'view') {
        $id = $_POST['id'];
        $get_datas = $conn->query("SELECT * FROM product_tbl WHERE id='$id '");
        if($get_datas->num_rows > 0) {
            $product = $get_datas->fetch_array();
            $response = [
                'status' => 'success',
                'product' => $product
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occured! Product not found.'
            ];
        }
    
    }elseif ($action == 'delete') {
        $pro_id = $_POST['id'];
        $pro_data  = $conn->query("SELECT *FROM product_tbl WHERE id = ' $pro_id'");
        $product = $pro_data->fetch_array();

        $delete_pro = $conn->query("DELETE FROM product_tbl WHERE id = '$pro_id'");

       if ($delete_pro) {
            if (unlink('../../imgs/product_img/' .$product['image'])) {
                $response = [
                    'status' => 'success',
                    'message' => 'Product deleted successfully!'
                ];
            }else{
                $response = [
                    'status' => 'error',
                    'message' => 'An error occured! Unable to delete product image.'
                ];
            }
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occured! Product could not be deleted.'
            ];
        }
    }elseif ($action === 'view') {
        $id = $_POST['id'];
        $getdata = $conn->query("SELECT * FROM product_tbl WHERE id='$id'");
        if($getdata->num_rows > 0){
            $product = $getdata->fetch_array();
            $response = [
                'status' => 'success',
                'product' => $product
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occured! Product not found.'
            ];
        }

    }elseif ($action === 'update') {

        $product_id = $_POST['id']; //get the product id from the request
        $current_image = '';
        
        // Fetch the image
        $data = $conn->query("SELECT image FROM product_tbl WHERE id='$product_id'");
        $image_data = $data->fetch_array();
        $current_image = $image_data['image'];

        // Check the presence of image
        if(isset($_FILES['image'])){
            // Image Processing
            $image = $_FILES['image']['name'];
            $temp_img = $_FILES['image']['tmp_name'];

            $image_name = pathinfo($image, PATHINFO_FILENAME);
            $image_ext = pathinfo($image, PATHINFO_EXTENSION);
            $name2store = $image_name . time() . '.' . $image_ext;

            $path2upload = '../../img/product_img/' . $name2store;

            // Upload the new Image
            if(move_uploaded_file($temp_img, $path2upload)){
                // delete the $current_image
                unlink('../../img/product_img/' . $current_image);
            }else{
                $path2upload = '';
            }
        }else{
            $path2upload = '';
        }

            // Get other data
            $product = $_POST['product_name'];
            $price = $_POST['price'];
            $desc = $_POST['desc'];
            $cat_id = $_POST['category'];
            $name2store = $path2upload == '' ? $current_image : $name2store ;

            $update_product = $conn->query("UPDATE product_tbl SET product='$product', category='$cat_id', 
                price='$price', image='$name2store', Description='$desc' WHERE id='$product_id'");

            if($update_product){
                $response = [
                    'status' => 'success',
                    'message' => 'Updated successfully!'
                ];
            }else{
                unlink($path2upload); //Delete the image that has been uploaded
                $response = [
                    'status' => 'error',
                    'message' => 'An error occured! ' . $conn->error
                ];
            }
    }
       
    echo json_encode($response);

    function getProductView($pid, $conn)
    {
        $views = $conn->query("SELECT * FROM viewer_tbl WHERE product_id='$pid'");
        return $views->num_rows;
    }
?>
 
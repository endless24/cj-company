<?php

    // Include the server configuration
    include_once "server_con.php";

    // Initialize a response array
    $response = [];

    // Recieved Data
    $ip = $_SERVER['SERVER_ADDR'];
    $action = $_POST['action'];

    if ($action == 'add') {
       $id = $_POST['id'];
        
        // Check if the user exists
        $check_user = $conn->query("SELECT * FROM cart_tbl WHERE product_id='$id' AND user_ip='$ip'");
    
        // Check the number of rows/records
        $num_records = $check_user->num_rows;
        if($num_records > 0){
            $response = [
                'status' => 'error',
                'message' => 'Product already exists in cart!'
            ];
        }else{
            // Insert the  record 
            $insert = $conn->query("INSERT INTO cart_tbl(product_id, user_ip) 
                        VALUES('$id','$ip')");
            if($insert){
                $response = [
                    'status' => 'success',
                    'message' => 'Product added successfully!'
                ];
            }else{
                $response = [
                    'status' => 'error',
                    'message' => 'An error occurred! ' . $conn->error
                ];
            }
        }
    }elseif($action == 'count'){
        // Check if the user exists
        $count = $conn->query("SELECT * FROM cart_tbl WHERE user_ip='$ip'");
        $response = [
            'status' => 'success',
            'no_items' => $count->num_rows
        ];

    }elseif($action == 'fetch_items'){
        // Check if the user exists
        $items = $conn->query("SELECT * FROM cart_tbl WHERE user_ip='$ip'");
        $itemArray = [];
        if($items->num_rows > 0){
            while ($item = $items->fetch_array()) {
                $item['product'] = fetchProductWithID($item['product_id'], $conn);
                array_push($itemArray, $item);
            }
        }
        $response = [
            'status' => 'success',
            'no_items' => $items->num_rows,
            'items' => $itemArray
        ];

    }elseif($action == 'clear_cart'){
        $delete = $conn->query("DELETE FROM cart_tbl WHERE user_ip='$ip'");
        if($delete){
            $response = [
                'status' => 'success',
                'message' => 'Cart have been clear successfully!'
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occurred! ' . $conn->error
            ];
        }
    }elseif($action == 'delete_cart'){
        $id = $_POST['id'];
        $delete = $conn->query("DELETE FROM cart_tbl WHERE   product_id='$id' AND user_ip='$ip' ");
        if($delete){
            $response = [
                'status' => 'success',
                'message' => 'Cart have been deleted successfully!'
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occurred! ' . $conn->error
            ];
        }
    }
    echo json_encode( $response);

    function fetchProductWithID($id, $conn){
    $products = $conn->query("SELECT * FROM product_tbl WHERE id='$id'");
    return $product = $products->fetch_array();
}

?>
<?php

    include_once "server_con.php";

    $response = [];
     
    $action = $_POST['action'];

    if($action == 'get_products'){
        $fetch = $conn->query("SELECT * FROM product_tbl ORDER BY created_at DESC");
        $list = [];
        while ($products = $fetch->fetch_array()) {
            array_push($list, $products);
        }
        $response = [
            'status' => 'success',
            'product_list' => $list
    
        ];

    }else if($action == 'details'){
        $post_id = $_POST['product_id'];
        $fetch_post = $conn->query("SELECT * FROM product_tbl WHERE id='$post_id'");
        $list = [];
        while ($products = $fetch_post->fetch_array()) {
            array_push($list, $products);
        }
        $response = [
            'status' => 'success',
            'detail' => $list
    
        ];
    }
    echo json_encode($response);
?>
<?php
    include_once "server_con.php";

    $response = [];

    $action = $_POST['action'];

    if ($action === 'count') {
        $categories = $conn->query("SELECT * FROM category_tbl");
        if ($categories) {
            $response = [
                'status' => 'success',
                'no_categories' =>  $categories->num_rows
            ];
        }else {
            $response = [
                'status' => 'error',
                'message' => 'An error occured!' .$conn->error
            ];
        }
    }elseif ($action =='add') {
        $category = $_POST['category'];

        $insert_cat = $conn->query("INSERT INTO category_tbl(category)  VALUES(' $category')");
        if( $insert_cat) {
            $response = [
                'status'=> 'success',
                'message' => 'Category Inserted Successfully!',
            ];
        }else {
            $response = [
                'status' => 'error',
                'message' => 'An error Occured'.' '.$conn->error
            ];
        }
        
    }elseif ($action =='list') {
        $categories = $conn->query("SELECT category FROM category_tbl");
        if($categories){
            $list =[];
            while ($cat_data = $categories->fetch_array()) {
                array_push($list,$cat_data['category']);
            }
            $response = [
                'status' => 'success',
                'category_list' => $list 
            ];
        }else {
            $response = [
                'status' => 'error',
                'message' => 'An error Occuured!'.$conn->error
            ];
        }
    }elseif ($action =='delete') {
        $category = $_POST['category'];
        $delete_cat = $conn->query("DELETE FROM category_tbl WHERE category='$category'");
        if ( $delete_cat) {
            $response = [
                'status' => 'success',
                'message' => 'category deleted successfully!'
            ];
        }else {
            $response = [
                'status' => 'error',
                'message' => 'An errror Occured!'
            ];
        }
    }elseif($action == 'fetch_category'){
        $categories = $conn->query("SELECT * FROM category_tbl");
        if($categories){
            $list = [];
            while ($data = $categories->fetch_array()) {
                $category_array = ['category' => $data['category'] ];
                array_push($list, $category_array);
            }
            $response = [
                'status' => 'success',
                'cat_list' => $list,
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occured! ' . $conn->error
            ];
        }
    }

    echo json_encode($response);
?>
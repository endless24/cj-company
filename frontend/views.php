<?php

        // Include the server configuration
        include_once "server_con.php";

        $ip = $_SERVER['SERVER_ADDR'];
        $device = $_SERVER['HTTP_USER_AGENT'];
        $product_id = $_POST['product_id'];

        $view_exist = $conn->query("SELECT * FROM viewer_tbl WHERE user_ip='$ip' AND product_id='$product_id'");

        if($view_exist->num_rows > 0){
            $today = date('d/m/Y');
            $exists = false;
            while ($views = $view_exist->fetch_array()) {
                $saved_date = date( 'd/m/Y', strtotime($views['date_visited']));
                if($saved_date == $today){
                    $exists = true;
                }
            }
            
            if ($exists == false) {
                $insert_view = $conn->query("INSERT INTO viewer_tbl(user_ip, product_id, device) VALUES('$ip', '$product_id', '$device')");
            }
        }else{
            $insert_view = $conn->query("INSERT INTO viewer_tbl(user_ip, product_id, device) VALUES('$ip', '$product_id', '$device')");
            
        }
?>
<?php
    include_once "server_con.php";

    $ip = $_SERVER['SERVER_ADDR'];
    $device = $_SERVER['HTTP_USER_AGENT'];

    $visit_exist = $conn->query("SELECT * FROM visitor_tbl WHERE user_ip='$ip'");

    if($visit_exist->num_rows > 0){
        $today = date('d/m/Y');
        $exists = false;
        while ($vists = $visit_exist->fetch_array()) {
            $saved_date = date( 'd/m/Y', strtotime($vists['visited_time']));
            if($saved_date == $today){
                $exists = true;
            }
        }
        
        if ($exists == false) {
            $insert_visit = $conn->query("INSERT INTO visitor_tbl(user_ip, device) VALUES('$ip','$device')");
        }
    }else{
        $insert_visit = $conn->query("INSERT INTO visitor_tbl(user_ip, device) VALUES('$ip','$device')");
    }
?>
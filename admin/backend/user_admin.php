<?php
    session_start();

    include_once "server_con.php";

     $response = [];

    if(isset($_SESSION['active_user']) and $_SESSION['active_user'] != '') {
        $userid = $_SESSION['active_user'];
        $query = $conn->query("SELECT * FROM tbl_admin   WHERE email='$userid' OR phone='$userid'");
        if($query->num_rows > 0) {
            $user =  $query->fetch_array();
            $response=[
                'status'=> 'success',
                'user' => $user
            ];
        }else {
            $response=[
                'status' => 'error',
                'message' => 'User Cannot Be Found!'
            ];
        }

    }else {
        $response=[
            'status' => 'error',
            'message' => 'No User Was found!'
        ];
    }
    echo json_encode($response);
?>
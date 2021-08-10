<?php
    session_start();
    
    include_once "server_con.php";


    $userid = $_POST['admin_id'];
    $pass = md5($_POST['admin_pass']);
    $rem = $_POST['remember'];

    $response = [];

    $check_user = $conn->query("SELECT * FROM tbl_admin WHERE (email='$userid' OR phone='$userid') AND password='$pass'");

    $num_records = $check_user->num_rows;

    if($num_records > 0){
        $_SESSION['active_user'] = $userid;
        $response = [
            'status' => 'success',
            'message' => 'Login Successfully'
        ];
    }else{
        $response = [
            'status' => 'error',
            'message' => 'Invalid Username or Password'
        ];
    }


    echo json_encode($response);

?>
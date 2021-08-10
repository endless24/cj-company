<?php
    session_start();

    include_once "server_con.php";

    $response = [];

    if(isset($_SESSION['active_user']) and $_SESSION['active_user'] != '') {
        $userid = $_SESSION['active_user'];
        $cure_pass = md5($_POST['old_pass']);
        $new_pass = md5($_POST['new_passp']);

        $query = $conn->query(" SELECT * FROM tbl_admin WHERE password = '$cure_pass'");

        if ($query->num_rows >0) {
            $update_pass = $conn->query("UPDATE tbl_admin SET password ='$new_pass' WHERE email = '$userid'");
            if( $update_pass) {
                $response = [
                    'status' => 'success',
                    'message' => 'Password Updated Successfully!' 
                ];
            }else {
                $response = [
                    'status' => 'error',
                    'message' => 'An Error Occured!' 
                ];
            }
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Invalid Pasword!' 
                ];
        }
        
        
        
    }
    echo json_encode($response);
?>
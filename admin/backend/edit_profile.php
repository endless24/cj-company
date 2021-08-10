<?php
     session_start();
    include_once "server_con.php";

    $response = [];

    if(isset($_SESSION['active_user']) and $_SESSION['active_user'] != '') {
        $userid = $_SESSION['active_user'];
        $fname = $_POST['firstnam'];
        $lname = $_POST['lastnam'];
        $phone = $_POST['fone'];
        $email = $_POST['mail'];

        $query = $conn ->query(" SELECT * FROM tbl_admin WHERE email='$userid' OR phone='$userid' ");
        if($query->num_rows > 0) {
            $user = $query->fetch_array();
            $id =  $user['sn'];
            $update = $conn->query("UPDATE tbl_admin SET firstname ='$fname', lastname='$lname', phone = '$phone', email ='$email' WHERE sn = '$id'");
            if($update) {
                $response = [
                    'status'=> 'success',
                    'message' => 'Updated successfully'
                ];
            }else {
                $response = [
                    'status'=> 'error',
                    'message' => 'An error occured!'
                ];
            }
        }
    }
    echo json_encode($response);
?>
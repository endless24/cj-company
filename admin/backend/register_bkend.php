<?php
 
    include_once 'server_con.php';

    $response = [];

    $action = $_POST['action'];

    if ($action === 'save') {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        
        $check = $conn->query("SELECT * FROM tbl_admin WHERE phone='$phone' OR email='$email'");

        if($check->num_rows > 0){
            $response = [
                'status' => 'error',
                'msg' =>'User already exists.'
            ];
        } else {
            $insert = $conn->query("INSERT INTO tbl_admin(firstname, lastname, phone, email, password) VALUES('$fname', '$lname', '$phone', '$email', '$password')");
            if ($insert) {
                $response = [
                    'status' => 'success',
                    'msg' => 'Record Stored Successfully'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'msg' =>'An unexpected error occured.'
                ];
            }
            
        }

        echo json_encode($response);

    }


?>
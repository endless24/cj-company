<?php
    include_once "server_con.php";

    $response = [];

    $contact_name = $_POST['cont_name'];
    $contact_email = $_POST['cont_email'];
    $contact_msg = $_POST['cont_masg'];

    $insert = $conn->query("INSERT INTO contact_tbl(name,email,message)
    VALUES('$contact_name','$contact_email','$contact_msg')");

    if ($insert) {
        $response = [
            'status' => 'success',
            'message' => 'Submitted Successfully!'
        ];
    }else {
        $response = [
            'status' => 'error',
            'message' => 'An error Occured!'.$conn->error
        ];
    }
    echo json_encode( $response);
?>
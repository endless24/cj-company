<?php
    include_once "server_con.php";

    $response = [];

    $fetch = $conn->query("SELECT * FROM contact_tbl WHERE status = 'unread'");

    if ($fetch) {
        $response = [
            'status' => 'success',
            'no_notice' =>$fetch->num_rows
        ];
    }else {
        $response = [
            'status' => 'error',
            'message' => 'An error occured!' .$conn->error
        ];
    }
echo json_encode($response);

?>
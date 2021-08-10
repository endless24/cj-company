<?php

    include_once "server_con.php";

    $response = [];

    $views = $conn->query("SELECT * FROM viewer_tbl");
    if ($views) {
        $response = [
            'status' => 'success',
            'no_views' =>  $views->num_rows
        ];
    }else {
        $response = [
            'status' => 'error',
            'message' => 'An error occured!' .$conn->error
        ];
    }

    echo json_encode($response);
?>
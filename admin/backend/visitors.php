<?php
    include_once "server_con.php";

    $action = $_POST['action'];

    $response = [];

   if ($action == 'no_visits') {
        $visits = $conn->query("SELECT * FROM visitor_tbl");
        if ($visits) {
            $response = [
                'status' => 'success',
                'no_visits' =>  $visits->num_rows
            ];
        }else {
            $response = [
                'status' => 'error',
                'message' => 'An error occured!' .$conn->error
            ];
        }
   }elseif($action == 'get_visits'){
    $fetch = $conn->query("SELECT * FROM visitor_tbl");
    $list = [];
    while ($visit = $fetch->fetch_array()) {
        array_push($list, $visit);
    }
    $response = [
        'status' => 'success',
        'visitor_list' => $list
      ];
    }elseif($action === 'delete'){
    $del_visite=$conn->query("DELETE FROM visitor_tbl");

        if($del_visite) {
            $response = [
                    'status' => 'success',
                    'message' => 'Delete Successfully!'
                ]; 
            }else {
                $response = [
                    'status' => 'Error',
                    'message' => 'An error occured'. $conn->error
            ];
        }

    }
    echo json_encode($response);


?>
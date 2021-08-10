<?php

// Include the server configuration
include_once "server_con.php";

// Initialize a response array
$response = [];

    $mons = getMonths();
    $data = [];
    foreach ($mons as $month) {
        $no_order = monthlyStats($month, $conn);
        array_push($data, $no_order);
    }

    $response = [
        'months' => getMonths(),
        'data' => $data
    ];


    echo json_encode($response);



    function getMonths()
    {
        $months = [];
        for ($i=6; $i >= 0; $i--) { 
            array_push($months, date('F' , strtotime('-' . $i . ' month')));
        }
        return $months;
    }

    function monthlyStats($month, $conn){
        // Check if the user exists
        $query = $conn->query("SELECT * FROM viewer_tbl");
        $counter = 0;
        while ($data = $query->fetch_array()) {
            $dbMonth = $data['visited_date'];
            if($month == date('F' , strtotime($dbMonth))){
                ++$counter;
            }
        }
        return $counter;
    }


?>
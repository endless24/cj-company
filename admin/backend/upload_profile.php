<?php
    session_start();

    include_once "server_con.php";

    $response=[];

    if(isset($_SESSION['active_user']) and $_SESSION['active_user'] != '') {
        $userid = $_SESSION['active_user'];
        $query = $conn ->query(" SELECT * FROM tbl_admin WHERE email='$userid' OR phone='$userid' ");
        if($query->num_rows > 0) {
           $image = $_FILES['image']['name'];
           $temp = $_FILES['image']['tmp_name'];
           $ext= pathinfo($image, PATHINFO_EXTENSION);
           $filename= pathinfo($image, PATHINFO_FILENAME);

            $name = $filename . time(). '.' .$ext;

            if (move_uploaded_file($temp,'../img/profile_image/'.$name )){
                $user = $query->fetch_array();
                $id = $user['sn'];
                $update = $conn->query("UPDATE tbl_admin SET image='$name' WHERE sn='$id'");
                if( $update) {
                    $response=[
                        'status'=> 'success',
                        'message' => 'Image has been uploaded and updated',
                        'image' =>  $name
                    ];
                }else {
                    unlink('../img/profile_image/'.$name);
                    $response=[
                        'status'=> 'error',
                        'massege'=>  'User info could not be updated'
                    ];
                }
            }else {
                $response=[
                    'status' => 'error',
                    'message' => 'Image could not be uploaded'
                ];
            }
        }else {
            $response=[
                'status' => 'error',
                'message' => 'User cannot be found!'
            ];
        }
    }else {
        $response=[
            'status' => 'error',
            'message' => 'No User was found!'
        ];
    }
    echo json_encode($response);
?>
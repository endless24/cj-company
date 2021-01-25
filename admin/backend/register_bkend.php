<?php
 
    include_once 'server_con.php';

    $response = [];

    $action = $_POST['action'];

    if ($action === 'save') {
        
        $image = $_FILES['image']['name'];
        $temp_img = $_FILES['image']['tmp_name'];

        $image_name = pathinfo($image, PATHINFO_FILENAME);
        $image_extn = pathinfo($image, PATHINFO_EXTENSION);
        $name2save = $image_name . time() . '.' . $image_extn;


        $path2upload = '../img/profile_image/' .$name2save;
        // if (move_uploaded_file($temp_img, $path2upload)) {
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $check_admin = $conn->query("SELECT * FROM tester WHERE email='" . $email . "'");

            $response = $check_admin->fetch_array();

        //     if($num_records > 0) {
        //         $response = [
        //             'status' => 'error',
        //             'message' => 'Admin with these credentials Already exist'
        //         ];

        //     }else{
        //             $insert_data = $conn->query("INSERT INTO tbl_admin(firstname,lastname,phone,email,password,image)
        //             VALUES(' $first_name','$last_name',' $phone',' $email','$password',' $name2save')");
                    

        //             if ($insert_data == true){
        //                 $response = [
        //                     'status'=> 'success',
        //                     'messages'=> 'Registered successfully!'
        //                 ];
        //             }else {
        //                 unlink($path2upload);
        //                 $response = [
        //                     'status'=> 'Error',
        //                     'massege'=> 'An error occured' .$conn->error
        //                 ];
        //             }
        //          }
           
        // }else{
        //     $response = [
        //         'status' => 'error',
        //         'message' => 'An error occured! Unable to upload image.'
        //     ];
        // }



    }
    echo json_encode($response);




?>
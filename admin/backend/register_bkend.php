<?php
 
    include_once 'server_con.php';

    $response = [];

    $action = $_POST['action'];

    if ($action === 'save') {
        // Collect data from request
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        // Prepare Images for Upload
        $image = $_FILES['image']['name'];
        $temp_img = $_FILES['image']['tmp_name'];

        $image_name = pathinfo($image, PATHINFO_FILENAME);
        $image_extn = pathinfo($image, PATHINFO_EXTENSION);
        $name2save = $image_name . time() . '.' . $image_extn;

        $path2upload = '../img/profile_image/' .$name2save;
        
        $check = $conn->query("SELECT * FROM tbl_admin WHERE phone='$phone' OR email='$email'");

        if($check->num_rows > 0){
            $response = [
                'status' => 'error',
                'message' =>'User already exists.'
            ];
        } else {
            // Upload Image
            if(move_uploaded_file($temp_img, $path2upload)) {
                $insert = $conn->query("INSERT INTO tbl_admin(firstname, lastname, phone, email, password, image)
                 VALUES('$fname', '$lname', '$phone', '$email', '$password','$name2save')");
                if ($insert) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Your Record Registered Successfully'
                    ];
                } else {
                    unlink($path2upload); 
                    $response = [
                        'status' => 'error',
                        'message' => 'An error occured! ' . $conn->error
                    ];
                }
            }else{
                $response = [
                    'status' => 'error',
                    'message' =>'An unexpected error occured.'
                ];
            }


        }

        echo json_encode($response);
    }

?>

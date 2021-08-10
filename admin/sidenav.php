
<?php
    include_once "backend/server_con.php";

    if(isset($_SESSION['active_user']) and $_SESSION['active_user'] != ''){
        $userid = $_SESSION['active_user'];
        
        $check_user = $conn->query("SELECT * FROM tbl_admin WHERE email='$userid' OR phone='$userid'");

        $user_detail = $check_user->fetch_array();
        $firstname = $user_detail['firstname'];
        $lastname = $user_detail['lastname'];
        $phone = $user_detail['phone'];
        $email = $user_detail['email'];
        $photo = $user_detail['image'];
    }else{
        header('location:login.php');
    }
?>




<div class="bg-dark" id="sidebar">
    <!-- Brand Logo -->
    <div class="py-2 text-center text-white shadow-sm bg-dark">
        <img src="img/logo.png" alt=" Logo" style="max-height:40px;">
    </div>
    <!-- Admin Detail -->
    <div class="my-3 py-1 text-center text-light" id="admin_detail">
        <img id="side_image" src="img/profile_image/<?php echo $photo ?>" alt=" " class="rounded-circle img-profile bg-light" style="width:7.8rem; height:7.8rem;" >
        <span class="d-block py-2">Welcome!</span>
        <span class="d-block my-1 text-capitalize">
           <?php echo $firstname .' '.$lastname?>
        </span>

    </div>

    <!-- Navigation Menu -->
    <div id="side_menu">
        <nav class="navbar p-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link active pl-4 pagenav mb-2" id="dashboard">
                        <i class="fa fa-tachometer-alt mr-2"></i>
                        Dashboard
                    </a>
                </li>
                  
                <li class="nav-item">
                    <a href="#" class="nav-link pagenav  pl-4 mb-2" id="category">
                        <i class="fa fa-layer-group mr-2"></i>
                        Manage Category
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link pagenav  pl-4 mb-2" id="product">
                        <i class="fa fa-tv mr-2"></i>
                        Manage Products
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link pagenav  pl-4 mb-2" id="views">
                        <i class="fa fa-eye mr-2"></i>
                        Manage Views
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link pagenav  pl-4 mb-2" id="visitors">
                        <i class="fa fa-users mr-2"></i>
                        Manage Visitors
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link pl-4 " data-toggle="collapse" data-target="#set_submenu">
                        <i class="fa fa-cog mr-2"></i>
                        settings
                        <i class="fas fa-angle-down float-right px-3 pt-2"></i>
                    </a>
                    <ul class="collapse" id="set_submenu">
                        <li class="nav-item">
                            <a href="#" class="nav-link pl-4 pagenav mb-2" id="profile">
                                <i class="fa fa-user mr-2"></i>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link pagenav mb-2" id="password">
                                <i class="fa fa-key mr-2"></i>
                                Change Password
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link  pl-4 mb-2" id="logout">
                        <i class="fa fa-sign-out-alt mr-2"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div id="overlay"></div>

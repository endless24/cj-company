<div class="container-fluid px-0 bg-dark shadow-sm"  id="top_menu">
    <div id="toggler" class="d-md-none">
        <span class="py-1 px-2 border float-right mt-2 mr-3" style="cursor:pointer;">
            <i class="fa fa-bars"></i>
        </span>
    </div>
    <nav class="navbar navbar-expand navbar-light">
        <ul class="nav navbar-nav ml-auto ">
             
           <li class="nav-item" >
            <div class="input-group mt-2 ml-auto " id="ingroup">
                <input type="text" name="search" id="search" class="form-control text-light" style="display:none">
            </div>
           </li>
            <li class="nav-item">
               <a href="#"  title="Search d-block" class="nav-link text-light px-3">
               <i class="fa fa-search "id="schtoggle"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" title="Notification" class="nav-link text-light px-3">
                    <i class="fa fa-bell"></i><span class="badge text-light" id="msg_icon">0</span>
                </a>
            </li>
            <li class="nav-item">
               <a href="#"  title="Help" class="nav-link text-light px-3">
               <i class="far fa-question-circle text-light"></i>
                </a>
            </li> 
            <div class="dropdown inblock mr-3">
                <span class="btn btn-sm  dropdown-toggle text-light" data-toggle="dropdown">
                    <img id="nav_pics" src="img/profile_image/<?php echo $photo ?>" alt="icon" class="rounded-circle mr-1 " style="width:1.7rem; height:1.7rem; border:2px solid">
                   <span class="text-capitalize">   <?php echo $firstname .' '.$lastname?></span>
                </span>
                <div class="dropdown-menu ml-5 bg-dark">
                    <li class="dropdown-item bg-dark">
                        <a href="logout.php" class="text-light"><i class="fa fa-sign-out-alt"></i> Signout</a>
                    </li>
                </div>
            </div>
        </ul>
    </nav>
</div>


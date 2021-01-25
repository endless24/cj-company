<div class="container-fluid px-0 bg-primary shadow-sm"  id="top_menu">
    <div id="toggler" class="d-md-none">
        <span class="py-1 px-2 border float-right mt-2 mr-3" style="cursor:pointer;">
            <i class="fa fa-bars"></i>
        </span>
    </div>
    <nav class="navbar navbar-expand navbar-light">
        <ul class="nav navbar-nav ml-auto ">
             
           <li class="nav-item" >
              <span class="input-group mt-2 ml-auto d-none  " id="ingroup">
                <input type="text" name="search" id="search" class="form-control text-light">
              </span>
           </li>
            <li class="nav-item">
               <a href="#"  title="Search" class="nav-link text-light px-3">
               <i class="fa fa-search "id="schtoggle"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" title="Notification" class="nav-link text-light px-3">
                    <i class="fa fa-bell"></i>
                </a>
            </li>
            <li class="nav-item">
               <a href="#"  title="Help" class="nav-link text-light px-3">
               <i class="far fa-question-circle text-light"></i>
                </a>
            </li> 
            <div class="dropdown inblock mr-3">
                <span class="btn btn-sm dropdown-toggle text-light" data-toggle="dropdown">
                    <img src="img/user.png" alt="icon" class="rounded-circle mr-1 " style="max-width:25px; border:2px solid">
                   <span>Name</span>
                </span>
                <div class="dropdown-menu ml-5">
                    <li class="dropdown-item ">
                        <a href="signout.php" >Signout</a>
                    </li>
                </div>
            </div>
        </ul>
    </nav>
</div>
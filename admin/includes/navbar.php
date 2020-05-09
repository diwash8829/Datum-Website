     <?php  
     include('database/dbconfig.php');
     include('userprofile.php');
     ?>

     <style type="text/css">
     
     .gmail:hover
     {
      text-decoration: none !important;
     }

     .gmail img:hover
     {
      background-color: #b62416 !important;
     }

     .tawk img:hover
     {
      background-color: #cccccc !important;
     }
     </style>
<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-1">Datum Systems</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <div id="active-class-nav">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="register.php">
          <i class="fas fa-users"></i>
          <span>Admin Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="contact.php">
          <i class="fas fa-id-card"></i>
          <span>Contact Us</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="joinus.php">
          <i class="fas fa-desktop"></i>
          <span>TrustAML Demo</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>WebPage</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Webpage:</h6>
            <a class="collapse-item" href="clients.php">Clients</a>
            <a class="collapse-item" href="testmonials.php">Testmonials</a>
            <a class="collapse-item" href="gallery.php">Gallery</a>
            <a class="collapse-item" href="faqs.php">FAQ's</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="career.php">
          <i class="fas fa-desktop"></i>
          <span>Careers</span>
        </a>
      </li>

    </div>

      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


      <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <div class="pl-2">
          <a href="#" class="btn btn-primary btn-circle btn-lg">
          <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="gmail px-3">
          <img src="https://cdn2.iconfinder.com/data/icons/social-icons-circular-color/512/gmail-512.png"
          style="height: 56px; width: 56px; border-radius: 50%;" class="bg-danger">
          </a>
          <a class="tawk" href="#">
          <img src="https://www.tawk.to/wp-content/uploads/2020/04/tawky.png"
          style="height: 56px; width: 56px; border-radius: 50%; border: 1px solid #204b7b">
          </a>
        </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

              <?php  

            $sql_get2 = mysqli_query($connection,"SELECT * from demo where status = 0");
            $count = mysqli_num_rows($sql_get2);

            ?>


            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php echo $count; ?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  TrustAML Demo
                </h6>
                   <?php  

                $sql_get3 = mysqli_query($connection,"SELECT * from demo where status = 0");
                if (mysqli_num_rows($sql_get3)>0) 
                {
                  while ($result = mysqli_fetch_assoc($sql_get3)) 
                  {
                    echo ' <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="./img/clock.jpg">
                  </div>
                  <div class="font-weight-bold">
                    <div>'.$result['company'].' <span class="font-weight-normal">scheduled a TrustAML demo on</span> '.$result['date'].' <span class="font-weight-normal">at</span>'.$result['time'].'<span class="font-weight-normal">.</span></div>
                  </div>
                </a> ';
                  }
                }
                else
                {
                 echo ' <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image">
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-danger"><i class="fas fa-frown-open"></i> Sorry! No new demo scheduled.</div>
                  </div>
                </a> '; 
                }

               ?>
                  <a class="dropdown-item text-center small text-gray-500" href="./joinus.php">Show All</a>
              </div>
            </li>

            <?php  

            $sql_get = mysqli_query($connection,"SELECT * from contact where status = 0");
            $count = mysqli_num_rows($sql_get);

            ?>

    
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter count"><?php echo $count; ?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">

                <h6 class="dropdown-header">
                  Contact Us
                </h6>


                <?php  

                $sql_get1 = mysqli_query($connection,"SELECT * from contact where status = 0");
                if (mysqli_num_rows($sql_get1)>0) 
                {
                  while ($result = mysqli_fetch_assoc($sql_get1)) 
                  {
                    echo ' <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="./img/message.jpg" alt="">
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">'.$result['subject'].'</div>
                    <div class="small text-gray-500">'.$result['name'].' · '.$result['cr_date'].'</div>
                  </div>
                </a> ';
                  }
                }
                else
                {
                 echo ' <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image">
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-danger"><i class="fas fa-frown-open"></i> Sorry! No new messages.</div>
                  </div>
                </a> '; 
                }

               ?>
               <a class="dropdown-item text-center small text-gray-500" href="./contact.php">Read All Messages</a>
          </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <span class="mr-1">Welcome!</span>
                  <span class="text-success font-weight-bold">
                  <?php echo $login_session; ?>
                 </span>
                </span>
                <i class="fa fa-arrow-circle-down text-danger"></i>
  
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

      <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


      <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Do you really want to logout ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          
          <form action="logout.php" method="post">
          <button type="submit" name="logout_btn" class="btn btn-primary" >Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>



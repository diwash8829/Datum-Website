<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>
    



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered user</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                        <?php
                        $query = "select id from register order by id";
                        $query_run = mysqli_query($connection,$query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> '.$row.' </h1>';


                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Contact Us Messages</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                      <?php
                        $query = "select id from contact order by id";
                        $query_run = mysqli_query($connection,$query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> '.$row.' </h1>';


                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total TrustAMl Demo Scheduled</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                      <?php
                        $query = "select id from demo order by id";
                        $query_run = mysqli_query($connection,$query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> '.$row.' </h1>';


                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>            
          </div>

          <!-- Content Row -->

        </div>


        <div class="container-fluid">
          <div class="row">

      <div class="col-xl-4 col-md-6">
              <div class="card border-left-success shadow">
                <div class="card-body p-0 d-flex justify-content-center">
                  <div class="row no-gutters ">
                    <div class="col ">
                      <iframe src="https://www.hamropatro.com/widgets/calender-medium.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:375px;" allowtransparency="true"></iframe>
                  </div>
                </div>
              </div>
            </div> 
        </div>

      <div class="col-xl-4 col-md-6">
              <div class="card border-left-success shadow">
                <div class="card-body p-0">
                  <div class="row no-gutters align-items-center">
                    <div class="col">
                      <iframe src="https://www.ashesh.com.np/rashifal/widget.php?header_title=Nepali Rashifal&header_color=f0b03f&api=732048j511" frameborder="0" scrolling="yes" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:375px; border-radius:5px;" allowtransparency="true">
                      </iframe>
                  </div>
                </div>
              </div>
            </div> 
        </div>

        <div class="col-xl-4 col-md-6">
              <div class="card border-left-success shadow h-100">
                <div class="card-body p-0">
                  <div class="row no-gutters align-items-center">
                    <div class="col">
                      <iframe src="https://www.ashesh.com.np/forex/widget2.php?api=722248j514" frameborder="0" scrolling="yes" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:375px; border-radius:5px;" allowtransparency="true">
                      </iframe>
                  </div>
                </div>
              </div>
            </div> 
        </div>

      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>
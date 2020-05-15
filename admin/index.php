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
            <div class="col-xl-3 col-md-6 mb-4">
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
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Contact messages</div>
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
                      <i class="fas fa-id-card fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Demo Scheduled</div>
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
                      <i class="fas fa-desktop fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Trustaml Clients</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                      <?php
                        $query = "select id from clients order by id";
                        $query_run = mysqli_query($connection,$query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> '.$row.' </h1>';


                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
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

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Testmonials</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                        <?php
                        $query = "select id from testmonials order by id";
                        $query_run = mysqli_query($connection,$query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> '.$row.' </h1>';


                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Gallery Images</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                        <?php
                        $query = "select id from gallery order by id";
                        $query_run = mysqli_query($connection,$query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> '.$row.' </h1>';


                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-images fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total FAQ's</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                        <?php
                        $query = "select id from faqs order by id";
                        $query_run = mysqli_query($connection,$query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> '.$row.' </h1>';


                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-question fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Vacancy Posted / Total Candidates</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                        <?php
                        $query = "select id from career order by id";
                        $query1 = "select id from fend_career order by id";
                        $query_run = mysqli_query($connection,$query);
                        $query_run1 = mysqli_query($connection,$query1);

                        $row = mysqli_num_rows($query_run);
                        $row1 = mysqli_num_rows($query_run1);

                        echo '<h1> '.$row.' / '.$row1.' </h1>';


                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-newspaper fa-2x text-gray-300"></i>
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
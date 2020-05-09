<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>
    
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Demo scheduled
      <!-- Button trigger modal -->
</h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">

        <?php

        $query = "select * from demo";
        $query_run = mysqli_query($connection,$query);
        $sql_update = mysqli_query($connection,"UPDATE demo set status=1 where status = 0");
        $query_run1 = mysqli_query($connection,$sql_update);
        ?>

       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>ID</th>
             <th>Business</th>
             <th>Cpmpany</th>
             <th>Date</th>
             <th>Time</th>
             <th>Name</th>
             <th>Mobile</th>
             <th>Email</th>
           </tr>
         </thead>
         <tfoot>
           <tr>
             <th>ID</th>
             <th>Business</th>
             <th>Cpmpany</th>
             <th>Date</th>
             <th>Time</th>
             <th>Name</th>
             <th>Mobile</th>
             <th>Email</th>
           </tr>
         </tfoot>
         <tbody>
          <?php
          if (mysqli_num_rows($query_run) > 0) 
          {
            $id_no=1;
            while ($row = mysqli_fetch_assoc($query_run)) 
            {
              ?>
           <tr>
             <td><?php echo $id_no++; ?></td>
             <td><?php echo $row['business']; ?></td>
             <td><?php echo $row['company']; ?></td>
             <td><?php echo $row['date']; ?></td>
             <td><?php echo $row['time']; ?></td>
             <td><?php echo $row['name']; ?></td>
             <td><?php echo $row['mobile']; ?></td>
             <td><?php echo $row['email']; ?></td>
           </tr>
           <?php
         }
      }
      else{
        echo "No Record Found";
      }
             ?>
         </tbody>
       </table> 
      </div>
    </div>
  </div>
    </div>
  </div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
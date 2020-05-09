<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');

?>
    
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Contact Us Messages
      <!-- Button trigger modal -->
</h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">

        <?php

        $query = "select * from contact";
        $sql_update = mysqli_query($connection,"UPDATE contact set status=1 where status = 0");
        $query_run = mysqli_query($connection,$query);
        $query_run1 = mysqli_query($connection,$sql_update);
        ?>

       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>ID</th>
             <th>Subject</th>
             <th>Name</th>
             <th>Email</th>
             <th>Message</th>
           </tr>
         </thead>
         <tfoot>
           <tr>
             <th>ID</th>
             <th>Subject</th>
             <th>Name</th>
             <th>Email</th>
             <th>Message</th>
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
             <td><?php echo $row['subject']; ?></td>
             <td><?php echo $row['name']; ?></td>
             <td><?php echo $row['email']; ?></td>
             <td><?php echo $row['message']; ?></td>
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
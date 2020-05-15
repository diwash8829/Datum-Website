<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');


?>
    
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Candidates
      <!-- Button trigger modal -->
</h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">

        <?php

        $query = "select * from fend_career";
        $query_run = mysqli_query($connection,$query);
        ?>

       <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Email</th>
             <th>Mobile</th>
             <th>Position</th>
             <th>Resume</th>
           </tr>
         </thead>
         <tfoot>
           <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Email</th>
             <th>Mobile</th>
             <th>Position</th>
             <th>Resume</th>
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
             <td><?php echo $row['name']; ?></td>
             <td><?php echo $row['email']; ?></td>
             <td><?php echo $row['mobile']; ?></td>
             <td><?php echo $row['position']; ?></td>
             <td class="d-flex justify-content-around" ><a href="upload/resume/<?php echo $row['resume']; ?>" target="_blank"><i class="far fa-eye"></i></a>
                 <a href="upload/resume/<?php echo $row['resume']; ?>" download><i class="fas fa-download"></i></td>
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
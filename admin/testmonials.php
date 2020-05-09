<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>
    

    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Testmonials</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
            <label>Company Name </label>
            <input type="text" name="name" class="form-control" placeholder="Enter Company Name">     
        </div>
        <div class="form-group">
            <label>Company Address</label>
            <input type="text" name="address" class="form-control" placeholder="Enter Company Address">     
        </div>
        <div class="form-group">
            <label>Enter Message</label>
            <textarea name="message" class="form-control"></textarea>     
        </div>    
        <div class="form-group">
            <label>Upload Company Image</label>
            <input type="file" name="testmonials-image" id="testmonials-image" class="form-control" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="register-testmonials-btn" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Testmonials
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#addadminprofile">
  Add Data
</button>
</h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">

        <?php

        $query = "select * from testmonials";
        $query_run = mysqli_query($connection,$query);
        ?>

       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Address</th>
             <th>Message</th>
             <th>Image</th>
             <th class="text-center">EDIT</th>
             <th class="text-center">DELETE</th>
           </tr>
         </thead>
         <tfoot>
           <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Address</th>
             <th>Message</th>
             <th>Image</th>
             <th class="text-center">EDIT</th>
             <th class="text-center">DELETE</th>
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
             <td style="vertical-align: middle;"><?php echo $id_no++; ?></td>
             <td style="vertical-align: middle;"><?php echo $row['name']; ?></td>
             <td style="vertical-align: middle;"><?php echo $row['address']; ?></td>
             <td style="vertical-align: middle;"><?php echo $row['message']; ?></td>
             <td style="vertical-align: middle;" class="text-center"><?php echo '<img src="upload/testmonials/'.$row['image'].'" width="100px"; height="100px" alt="Testmonials_Image">'; ?>
             </td>
             <td class="text-center" style="vertical-align: middle;">
              <form action="testmonials_edit.php" method="POST">
                <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
               <button type="submit" name="edit_btn" class="btn btn-success"><i class="fas fa-edit"></i></button>
             </form>
             </td>
             <td class="text-center" style="vertical-align: middle;">
                <input type="hidden" class="delete-testmonials-id" value="<?php echo $row['id']; ?>">
               <button type="button" class="btn btn-danger delete-testmonials-button"><i class="fas fa-trash-alt"></i></button>
             </td>
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
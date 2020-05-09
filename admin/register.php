<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>
    

    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST" id="form1">
      <div class="modal-body">
        <div class="form-group">
            <label> Name </label>
            <input type="text" name="username" class="form-control" id="name_check" placeholder="Enter Username">
            <small class="error_name" style="color: red"></small>     
        </div>
        <div class="form-group">
            <label> Email </label>
           <input type="email" name="email" class="form-control checking-email" id="email_check" placeholder="Enter Email">
            <small class="error_email1" style="color: red;"></small>
            <small class="error_email" style="color: red"></small>
        </div>
        <div class="form-group">
            <label> Password </label>
            <input type="password" name="password" id="pass_check" class="form-control" placeholder="Enter Password">
            <small class="error_pass" style="color: red;"></small>
        </div>
        <div class="form-group">
            <label> Confirm Password </label>
            <input type="password" name="confirmpassword" id="cpass_check" class="form-control" placeholder="Enter Password Again">
            <small class="error_cpass" style="color: red"></small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="closebtn" data-dismiss="modal">Close</button>
        <button type="submit" name="registerbtn" id="submitbtn" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Admin Profile
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#addadminprofile">
  Add Admin Profile
</button>
</h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">

        <?php

        $query = "select * from register";
        $query_run = mysqli_query($connection,$query);
        ?>

       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Email</th>
             <th class="text-center">EDIT</th>
             <th class="text-center">DELETE</th>
           </tr>
         </thead>
         <tfoot>
           <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Email</th>
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
             <td><?php echo $id_no++; ?></td>
             <td><?php echo $row['name']; ?></td>
             <td><?php echo $row['email']; ?></td>
             <td class="text-center">
              <form action="register_edit.php" method="POST">
                <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
               <button type="submit" name="edit_btn" class="btn btn-success"><i class="fas fa-edit"></i></button>
             </form>
             </td>
             <td class="text-center">
                <input type="hidden" class="delete-id" value="<?php echo $row['id']; ?>">
               <button type="button" id="delete-btn" class="btn btn-danger delete-button"><i class="fas fa-trash-alt"></i></button>
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
<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
	<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Testmonials Data</h6>
</div>
<div class="card-body">

<?php

if (isset($_POST['edit_btn'])) 
{
	$id = $_POST['edit_id'];

	$query = "select * from testmonials where id = $id";
	$query_run = mysqli_query($connection,$query);

    foreach ($query_run as $row) 
    {
        ?>

    <form action="code.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
	     <div class="form-group">
            <label>Company Name </label>
            <input type="text" name="edit_name" value="<?php echo $row['name'];?>" class="form-control" placeholder="Enter Company Name">
        </div>
        <div class="form-group">
            <label>Company Address</label>
            <input type="text" name="edit_address" value="<?php echo $row['address'];?>" class="form-control" placeholder="Enter Company Address">
        </div>
        <div class="form-group">
            <label>Enter Message</label>
            <textarea name="edit_message" class="form-control"><?php echo $row['message'];?></textarea>
        </div>
        <div class="form-group">
            <label>Upload Company Image</label>
            <input type="file" name="testmonials-image" id="testmonials-image" class="form-control" value="<?php echo $row['image'];?>">
        </div>
        <a href="testmonials.php" class="btn btn-danger">Cancel</a>
        <button type="submit" name="update-testmonials-btn" class="btn btn-primary">Update</button>
    </form>
                

                <?php
        
    }
}
?>
</div>
</div>
</div>

</div>
   

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
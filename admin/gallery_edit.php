<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
	<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Client Details</h6>
</div>
<div class="card-body">

<?php

if (isset($_POST['edit_btn'])) 
{
	$id = $_POST['edit_id'];

	$query = "select * from gallery where id = $id";
	$query_run = mysqli_query($connection,$query);

    foreach ($query_run as $row) 
    {
        ?>

    <form action="code.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
	<div class="form-group">
            <label>Image Description</label>
            <input type="text" name="edit_description" value="<?php echo $row['description'];?>" class="form-control" placeholder="Enter Image Description">
        </div>
        <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="gallery-image" id="gallery-image" class="form-control" value="<?php echo $row['image'];?>">
        </div>
        <a href="gallery.php" class="btn btn-danger">Cancel</a>
        <button type="submit" name="update-gallery-btn" class="btn btn-primary">Update</button>
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
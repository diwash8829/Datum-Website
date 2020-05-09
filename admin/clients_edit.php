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

	$query = "select * from clients where id = $id";
	$query_run = mysqli_query($connection,$query);

    foreach ($query_run as $row) 
    {
        ?>

    <form action="code.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
	<div class="form-group">
            <label> Name </label>
            <input type="text" name="edit_name" value="<?php echo $row['name'];?>" class="form-control" placeholder="Enter Company Name">
        </div>
       <div class="form-group">
        <label for="exampleFormControlSelect1">Type</label>
        <select class="form-control" id="exampleFormControlSelect1" name="edit_type">
          <option disabled="disabled" selected="selected">--Choose Type--</option>
          <option value="Bank"<?php if($row['type'] == 'Bank') { ?> selected="selected"<?php } ?>>Bank</option>
          <option value="Finance"<?php if($row['type'] == 'Finance') { ?> selected="selected"<?php } ?>>Finance</option>
          <option value="Co-operative"<?php if($row['type'] == 'Co-operative') { ?> selected="selected"<?php } ?>>Co-operative</option>
        </select>
      </div>
        <div class="form-group">
            <label> Image </label>
            <input type="file" name="clients-image" id="clients-image" class="form-control" value="<?php echo $row['image'];?>">
        </div>
        <a href="clients.php" class="btn btn-danger">Cancel</a>
        <button type="submit" name="update-clients-btn" class="btn btn-primary">Update</button>
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
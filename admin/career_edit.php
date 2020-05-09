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

	$query = "select * from faqs where id = $id";
	$query_run = mysqli_query($connection,$query);

    foreach ($query_run as $row) 
    {
        ?>

    <form action="code.php" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
	     <div class="form-group">
            <label>Question</label>
            <input type="text" name="edit_question" value="<?php echo $row['question'];?>" class="form-control" placeholder="Enter Company Name">
        </div>
        <div class="form-group">
            <label>Answer</label>
            <textarea name="edit_answer" class="form-control" rows="10"><?php echo $row['answer'];?></textarea>
        </div>
        <a href="faqs.php" class="btn btn-danger">Cancel</a>
        <button type="submit" name="update-faqs-btn" class="btn btn-primary">Update</button>
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
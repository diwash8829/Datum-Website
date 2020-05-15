<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
	<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Vacancy Details</h6>
</div>
<div class="card-body">

<?php

if (isset($_POST['edit_btn'])) 
{
	$id = $_POST['edit_id'];

	$query = "select * from career where id = $id";
	$query_run = mysqli_query($connection,$query);

    foreach ($query_run as $row) 
    {
        ?>

    <form action="code.php" method="POST">
    <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
	<div class="form-group">
    <label>Position</label><input type="text" name="edit_position" value="<?php echo $row['position'];?>" class="form-control" placeholder="Enter job title">
    </div>
    <div class="form-group">
    <label>Total No. of Openings</label><input type="text" name="edit_opening" value="<?php echo $row['opening'];?>" class="form-control" placeholder="Enter number of job openings">
    </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Job Level</label>
    <select class="form-control" id="exampleFormControlSelect1" name="edit_level">
    <option disabled="disabled" selected="selected">--Choose Type--</option>
    <option value="Junior"<?php if($row['level'] == 'Junior') { ?> selected="selected"<?php } ?>>Junior</option>
    <option value="Mid"<?php if($row['level'] == 'Mid') { ?> selected="selected"<?php } ?>>Mid</option>
    <option value="Senior"<?php if($row['level'] == 'Senior') { ?> selected="selected"<?php } ?>>Senior</option>
    </select>
    </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Job Type</label>
    <select class="form-control" id="exampleFormControlSelect1" name="edit_type">
    <option disabled="disabled" selected="selected">--Choose Type--</option>
    <option value="Full Time"<?php if($row['type'] == 'Full Time') { ?> selected="selected"<?php } ?>>Full Time</option>
    <option value="Part Time"<?php if($row['type'] == 'Part Time') { ?> selected="selected"<?php } ?>>Part Time</option>
    <option value="Shift Based"<?php if($row['type'] == 'Shift Based') { ?> selected="selected"<?php } ?>>Shift Based</option>
    </select>
    </div>
    <div class="form-group">
    <label>Salary</label><input type="text" name="edit_salary" value="<?php echo $row['salary'];?>" class="form-control" placeholder="Enter Salary">
    </div>
    <div class="form-group">
    <label>Experience Needed</label><input type="text" name="edit_experience" value="<?php echo $row['experience'];?>" class="form-control" placeholder="Enter needed experience">
    </div>
    <div class="form-group">
    <label>Skills Needed</label><input type="text" name="edit_skills" value="<?php echo $row['skills'];?>" class="form-control" placeholder="Enter needed skills">
    </div>
    <div class="form-group">
    <label>Job Description</label>
    <small style="color: red">NOTE: Don't modify this format.</small>
    <textarea name="edit_description" class="form-control" rows="11"><?php echo $row['description'];?></textarea>
    </div>
        
        <a href="career.php" class="btn btn-danger">Cancel</a>
        <button type="submit" name="update-career-btn" class="btn btn-primary">Update</button>
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
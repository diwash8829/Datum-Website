<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>
    

    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Vacancy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" class="form-control" placeholder="Enter job title">     
        </div>
        <div class="form-group">
            <label>Total No. of Openings</label>
            <input type="text" name="openings" class="form-control" placeholder="Enter number of job openings">     
        </div>
        <div class="form-group">
        <label for="exampleFormControlSelect1">Job Level</label>
        <select class="form-control" id="exampleFormControlSelect1" name="level">
          <option disabled="disabled" selected="selected">--Choose Type--</option>
          <option>Junior</option>
          <option>Mid</option>
          <option>Senior</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Job Type</label>
        <select class="form-control" id="exampleFormControlSelect1" name="type">
          <option disabled="disabled" selected="selected">--Choose Type--</option>
          <option>Full Time</option>
          <option>Part Time</option>
          <option>Shift Based</option>
        </select>
      </div>
      <div class="form-group">
            <label>Salary</label>
            <input type="text" name="salary" class="form-control" placeholder="Enter salary">     
        </div>
        <div class="form-group">
            <label>Experience Needed</label>
            <input type="text" name="experience" class="form-control" placeholder="Enter needed experience">     
        </div>
        <div class="form-group">
            <label>Skills Needed</label>
            <input type="text" name="skills" class="form-control" placeholder="Enter needed skills">     
        </div>
        <div class="form-group">
            <label>Job Description</label>
            <textarea name="description" class="form-control" rows="10">
<ul class="job-roles">
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>                                        
</ul>              
             </textarea>     
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="register-career-btn" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Careers
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#addadminprofile">
  Add Vacancy
</button>
</h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">

        <?php
        $query = "select * from career";
        $query_run = mysqli_query($connection,$query);
        ?>

       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>ID</th>
             <th>Position</th>
             <th>Opening</th>
             <th>Level</th>
             <th>Type</th>
             <th>Salary</th>
             <th>Experience</th>
             <th>Skills</th>
             <th class="text-center">EDIT</th>
             <th class="text-center">DELETE</th>
           </tr>
         </thead>
         <tfoot>
           <tr>
             <th>ID</th>
             <th>Position</th>
             <th>Opening</th>
             <th>Level</th>
             <th>Type</th>
             <th>Salary</th>
             <th>Experience</th>
             <th>Skills</th>
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
             <td style="vertical-align: middle;"><?php echo $row['position']; ?></td>
             <td style="vertical-align: middle;"><?php echo $row['opening']; ?></td>
             <td style="vertical-align: middle;"><?php echo $row['level']; ?></td>
             <td style="vertical-align: middle;"><?php echo $row['type']; ?></td>
             <td style="vertical-align: middle;"><?php echo $row['salary']; ?></td>
             <td style="vertical-align: middle;"><?php echo $row['experience']; ?></td>
             <td style="vertical-align: middle;"><?php echo $row['skills']; ?></td>
             <td class="text-center" style="vertical-align: middle;">
              <form action="career_edit.php" method="POST">
                <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
               <button type="submit" name="edit_btn" class="btn btn-success"><i class="fas fa-edit"></i></button>
             </form>
             </td>
             <td class="text-center" style="vertical-align: middle;">
                <input type="hidden" class="delete-career-id" value="<?php echo $row['id']; ?>">
               <button type="button" class="btn btn-danger delete-career-button"><i class="fas fa-trash-alt"></i></button>
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
<?php
include('dbsetting.php');
include('parts/header.php');
include('parts/navbar.php');
?>
    <div class="page-title-section" style="background-image: url(img/bg/pagetitle.jpg);">
        <div class="container">
            <h1>Careers</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Careers</a></li>
            </ul>
        </div>
    </div>

    <?php  
            $sql_get = mysqli_query($connection,"SELECT * from career");
    ?>


     <div class="section-block">
        <div class="container">
            <div class="section-heading">
                <h4>VACANCIES</h4>
                <div class="section-heading-line-left"></div>
            </div>
            <?php            
            if (mysqli_num_rows($sql_get)==0) 
            {
            echo'
            <div class = "mt-5">Sorry, We do not have any openings right now. But do keep in touch.</div>
            ';
            }
            ?>
                <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
      {
        echo '<small class=" pt-5 text-success font-weight-bold">'.$_SESSION['status']. ' </small>';
        unset($_SESSION['status']);
      }
      if (isset($_SESSION['status1']) && $_SESSION['status1'] !='') 
      {
        echo '<small class=" pt-5 text-danger font-weight-bold">'.$_SESSION['status1']. ' </small>';
        unset($_SESSION['status1']);
      }
      ?>
            <div class="row mt-40">
                <div class="col-12">
                    <div class="pr-30-md">
                        <div class="panel-group mt-10" id="accordion2" role="tablist" aria-multiselectable="true">


            <?php            
            if (mysqli_num_rows($sql_get)>0) 
            {
              while ($result = mysqli_fetch_assoc($sql_get)) 
              {
            echo ' 
            
                            <div class="panel panel-grey accordion">
                                <div class="panel-heading accordion-heading" role="tab">
                                    <h4 class="panel-title accordion-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#ac_col'.$result['id'].'" aria-expanded="false" aria-controls="ac_col'.$result['id'].'"> '.$result['position'].' ('.$result['level'].') - '.$result['opening'].' </a> </h4>
                                </div>
                                <div id="ac_col'.$result['id'].'" class="panel-collapse collapse " role="tabpanel" aria-labelledby="acc'.$result['id'].'">
                                    <div class=" panel-body accordion-body text-justify">
                                     <div class="col-12">
                                <div class="project-single-info">
                                    <ul>
                                        <li><span>Position</span><span class="job">:</span>'.$result['position'].'</li>
                                        <li><span>Total Openings</span><span class="job">:</span>'.$result['opening'].'</li>
                                        <li><span>Job Level</span><span class="job">:</span>'.$result['level'].' Level</li>
                                        <li><span>Job Type</span><span class="job">:</span>'.$result['type'].'</li>
                                        <li><span>Salary</span><span class="job">:</span>'.$result['salary'].'</li>
                                        <li><span>Experience</span><span class="job">:</span>'.$result['experience'].'</li>
                                        <li><span>Skills</span><span class="job">:</span>'.$result['skills'].'</li>
                                        <li><span>Roles & <br> Responsibilities</span><span class="job">:</span></li>
                                    </ul>
                                    <ul class="job-roles">
                                    '.$result['description'].'
                                    </ul>
                                    <p class="my-4 text-danger font-weight-bold"><sup><i class="fa fa-asterisk text-danger" style="font-size: 8px;"></i></sup> Only shortlisted candidates will be called for interview.<br><sup><i class="fa fa-asterisk text-danger" style="font-size: 8px;"></i></sup> Multiple application on same position will automatically reject your application.</p> 
                                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'.$result['id'].'">
  Apply Now
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal'.$result['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">'.$result['position'].' ('.$result['level'].')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
             <form method="POST" action="career-code.php"  enctype="multipart/form-data" class="career-form">
      <div class="modal-body">
        <div class="form-group">
            <label>Full Name <sup><i class="fa fa-asterisk text-danger" style="font-size: 8px;"></i></sup></label>
            <input type="text" name="cname" class="form-control" placeholder="Enter Full Name" required>     
        </div>
        <div class="form-group">
            <label>Email Address <sup><i class="fa fa-asterisk text-danger" style="font-size: 8px;"></i></sup></label>
            <input type="email" name="cemail" class="form-control" placeholder="Enter Valid Email Address" required>     
        </div>
        <div class="form-group">
            <label>Mobile Number <sup><i class="fa fa-asterisk text-danger" style="font-size: 8px;"></i></sup></label>
            <input type="text" name="cmobile" class="form-control" placeholder="Enter Valid Mobile Number" required>     
        </div>
        <div class="form-group">
            <input type="hidden" name="cposition" class="form-control" value = "'.$result['position'].' ('.$result['level'].')">     
        </div>
        <div class="form-group">
            <label>Upload Latest Resume <sup><i class="fa fa-asterisk text-danger" style="font-size: 8px;"></i></sup></label>
            <input type="file" name="resume" class="form-control" required accept="application/pdf" style="padding-top : 3px;">
            <small style="color: red">NOTE: Only PDF Allowed & Max. size: 1MB</small>
        </div>
      </div>
      <div class="modal-footer justify-content-start">
        <button type="button" class="btn btn-secondary oooo" data-dismiss="modal">Close</button>
        <button type="submit" name="register-career-btn" class="btn btn-primary career-submit">Apply</button>
      </div>
    </form>
    </div>
  </div>
</div>
                                </div>
                            </div>
                                    </div>
                                </div>
                            </div>

            ';
            

            }
            }
            ?>

            <!-- -----------------------if database space low---------------------------------- -->
         <!--    <ul>
                                        <li class="pt-0"><span>To Apply</span></li>
                                    </ul>
                                    <ul class="job-roles">
                                        <li>Email your "Cover Letter" and "Latest CV" to <span class="text-success">career@datum.com.np</span></li>
                                        <li>Mention "'.$result['position'].' ('.$result['level'].')" in the Email Subject.</li> 
                                    </ul> -->

                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php
        include('parts/footer.php');
        include('parts/scripts.php');

    ?>

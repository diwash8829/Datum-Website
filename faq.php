<?php
include('dbsetting.php');
include('parts/header.php');
include('parts/navbar.php');
?>
    <div class="page-title-section" style="background-image: url(img/bg/pagetitle.jpg);">
        <div class="container">
            <h1>FAQ</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </div>
    </div>

    <div class="section-block">
        <div class="container">
            <div class="section-heading">
                <h4>Have Any Questions?</h4>
                <div class="section-heading-line-left"></div>
            </div>
            <div class="row mt-40">
                <div class="col-12">
                    <div class="pr-30-md">
                        <div class="panel-group mt-10" id="accordion2" role="tablist" aria-multiselectable="true">

                            <?php  
            $sql_get = mysqli_query($connection,"SELECT * from faqs");
            if (mysqli_num_rows($sql_get)>0) 
            {
              while ($result = mysqli_fetch_assoc($sql_get)) 
              {
            echo ' 
            <div class="panel panel-grey accordion">
                                <div class="panel-heading accordion-heading" role="tab" id="acc1">
                                    <h4 class="panel-title accordion-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#ac_col'.$result['id'].'" aria-expanded="false" aria-controls="ac_col'.$result['id'].'">'.$result['question'].'</a> </h4>
                                </div>
                                <div id="ac_col'.$result['id'].'" class="panel-collapse collapse " role="tabpanel" aria-labelledby="acc'.$result['id'].'">
                                    <div class="panel-body accordion-body text-justify">'.$result['answer'].'</div>
                                </div>
                            </div>
            ';
            }
            }
            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section-block-grey" style="padding-bottom: 50px;">
   <div class="container">
      <div class="section-heading center-holder">
         <h3>Our Clients</h3>
         <div class="section-heading-line" style="margin-bottom: 50px;"></div>
      </div>
      <div class="owl-carousel owl-theme clients" id="clients-faq">
         <?php  
            $sql_get = mysqli_query($connection,"SELECT * from clients");
            if (mysqli_num_rows($sql_get)>0) 
            {
              while ($result = mysqli_fetch_assoc($sql_get)) 
              {
            echo ' 
            <div class="item"> <img src="admin/upload/clients/'.$result['image'].'" alt="clients-image"> </div>
            ';
            }
            }
            ?>
      </div>
   </div>
</div>

 <?php
        include('parts/footer.php');
        include('parts/scripts.php');
    ?>

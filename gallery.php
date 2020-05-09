<?php
include('dbsetting.php');
include('parts/header.php');
include('parts/navbar.php');
?>

    <div class="page-title-section" style="background-image: url(img/bg/pagetitle.jpg);">
        <div class="container">
            <h1>Gallery</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Gallery</a></li>
            </ul>
        </div>
    </div>
    <div class="section-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="pl-30-md">
                        <div class="section-heading">
                            <h4 class="text-center">Image Gallery</h4>
                        </div>
                        <div class="section-heading-line"></div>
                
                    </div>
                </div>
            </div>

        </div>
    </div>


<div class="container gallery-container">
    
    <div class="gallery">
        <div class="row">
            <?php  
            $sql_get = mysqli_query($connection,"SELECT * from gallery");
            if (mysqli_num_rows($sql_get)>0) 
            {
              while ($result = mysqli_fetch_assoc($sql_get)) 
              {
            echo ' 
            <div class="col-6 col-md-4 col-lg-3">
                <div class="content">
                <div class="content-overlay"></div>
        <a class="lightbox" href="admin/upload/gallery/'.$result['image'].'"  data-caption="'.$result['description'].'">
                    <img src="admin/upload/gallery/'.$result['image'].'">
                <div class="content-details fadeIn-bottom">
                    <h3 class="content-title"><i class="fa fa-search-plus"></i></h3>
                    <p class="content-text">'.$result['description'].'</p>
                </div>
                </a>
            </div>
           </div>
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
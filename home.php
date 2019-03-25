<?php
include 'backend/database.php';

?>



<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Library System</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <?php include 'header.php';?>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Books</h2>
						<div class="page_link">
							<a href="index.php">Home</a>
							<a href="books.php">Books</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Courses Area =================-->
        <section class="courses_area p_120">
        	<div class="container">
    			<div class="row">
                    <div class="col-lg-12">
                        <blockquote class="generic-blockquote">
                            <h2>Featured Books</h2>
                            “Recently, the US Federal government banned online casinos from operating in America by  
                        </blockquote>
                        
                    </div>
                </div>

        		<div class="row courses_inner my-5">
                    <?php 
                    $sql="select * from books";
                     $result=$conn->query($sql);
                     
                     $row = $result->fetch_assoc();
    
                    $id = $row['id'];

                    foreach($result as $key => $value)
                        {?>
                    <div class="col-md-2 my-2">
                        <div class="grid_item wd100">
                            <div class="courses_item">
                                <img src="backend/<?php echo $value['photo'];?>" alt="" class="img-fluid">
                                <div class="">
                                   <h4><?php echo $value['name']?></h4>
                                  <h6><?php echo $value['description']?></h6>
                                </div>
                             
                                  <?php 
                                  $qty=$value['quantity'];
                                  
                                  if($qty==0 )
                                    {?>
                                        <div class="alert alert-primary" role="alert">
                                            Not Available!
                                        </div>
                                   <?php }?>
                                   <?php echo $qty; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>  
        </section>
        <!--================End Courses Area =================-->
        
        <!--================Pagkages Area =================-->
     
        <!--================End Pagkages Area =================-->
        
        <!--================ start footer Area  =================-->	
        <?php include 'footer.php';?>
		<!--================ End footer Area  =================-->
        
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
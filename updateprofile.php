

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
    			<!-- <div class="row">
                    <div class="col-lg-12">
                        <blockquote class="generic-blockquote">
                            <h2>Featured Books</h2>
                            “Recently, the US Federal government banned online casinos from operating in America by  
                        </blockquote>
                    </div>
                </div> -->
                <?php
                if(isset($_REQUEST['status']))
                  {
                    $status=$_REQUEST['status'];
                    if($status==3)
                    {
                      echo '<div class="alert alert-success">New Author Updated successfully!</div>';
                    }
                    
                  }?>
                <div class="card o-hidden border-0 shadow-lg my-5" id="diveditcategory">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit User Profile!</h1>
               
              </div>
              <form class="user" action="update.php" method="post">
               <input type="hidden" name="user_id" id="user_id">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" placeholder="User Name" name="name" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" placeholder="Email" name="email" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required="required">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="phno" placeholder="phno" name="phno" required="required">
                </div>
                 <div class="form-group">
                  <input type="submit" class="form-control  btn-info col-4 offset-4" value="Update ">
                </div>
               
              </form>
              
             
            </div>
          </div>
        </div>
      </div>
    </div>  

        		<div class="card shadow mb-4">
                    <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User profile</h6>
            </div>
                   
                    <div class="card-body">
              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Password</td>
                                            <td>Phone No</td>
                                            <td>Update</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                   
                    $sql="select * from users";
                     $result=$conn->query($sql);
                     
                     $row = $result->fetch_assoc();
    
                    $id = $row['id'];

                   
                    
                      $id=$row['id'];
                       $name=$row['name'];
                       $email=$row['email'];
                       $pw=$row['password'];
                       $phno=$row['phno'];
                       echo "<tr>
                       
                       <td>$name</td>
                       <td>$email</td>
                       <td>$pw</td>
                       <td>$phno</td>
                       <td><a href='#'data-id=$id class='btn btn-info edit'>Edit</a></td>
                       </tr>";
                       
                    
                   ?>
                                    </tbody>
                                </div>
                             
                                 
                               </div>
                            </div>

                        </div>
                    </div>
                
                </div>  
                    
                   
        		</div>

          
        	</div>
        </section>
        <!--================End Courses Area =================-->
        
        <!--================Pagkages Area =================-->
     
        <!--================End Pagkages Area =================-->
        
        <!--================ start footer Area  =================-->	
       
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


         <script type="text/javascript">

$("#diveditcategory").hide();
    $(".edit").click(function(){
      $("#diveditcategory").show();

      var id=$(this).data('id');
      alert(id);
      $.post('editprofile.php',{id:id},function(data){
        //console.log(data);
        var jsondata=JSON.parse(data);
        $("#user_id").val(jsondata.id);
         $("#name").val(jsondata.name);
         $("#email").val(jsondata.email);
         $("#password").val(jsondata.password);
         $("#phno").val(jsondata.phno);
      })
    })
  </script>
    </body>
</html>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
   <?php include('navbar.php')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       <?php include('topbar.php');?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Lent Book Page</h1>


<div class="card o-hidden border-0 shadow-lg my-5" id="divaddgender">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create lent book Name!</h1>
                <?php
                if(isset($_REQUEST['status']))
                  {
                    $status=$_REQUEST['status'];
                    if($status==1)
                    {
                      echo '<div class="alert alert-success">New book Added successfully!</div>';
                    }
                    else {if($status==2)
                    {
                      echo '<div class="alert alert-danger">New book Deleted successfully!</div>';
                    }else{
                       echo '<div class="alert alert-danger">New book Updated successfully!</div>';
                    }}
                  }?>
              </div>
              <form class="user" action="addlend.php" method="post">
               
                <div class="form-group">
                  <input type="date" class="form-control form-control-user" id="ldate" placeholder="lent Date" name="lent_date" required="required">
                </div>
                <div class="form-group">
                  <input type="date" class="form-control form-control-user" id="rdate" placeholder="Return Date" name="return_date" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="user_id" placeholder="User ID" name="user_id" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="book_id" placeholder="Book ID" name="book_id" required="required">
                </div>
                 <div class="form-group">
                  <input type="submit" class="form-control  btn-info col-4 offset-4" value="Add ">
                </div>
               
              </form>
              
             
            </div>
          </div>
        </div>
      </div>
    </div>



 <!-- <div class="card o-hidden border-0 shadow-lg my-5" id="diveditgender">
      <div class="card-body p-0">
        
        <div class="row">
          
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit Gender Name!</h1>
               
              </div>
              <form class="user" action="updatelbook.php" method="post">
               <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <input type="date" class="form-control form-control-user" id="ldate" placeholder="lent Date" name="lent_date" required="required">
                </div>
                <div class="form-group">
                  <input type="date" class="form-control form-control-user" id="rdate" placeholder="Return Date" name="return_date" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="user_id" placeholder="User ID" name="user_id" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="book_id" placeholder="Book ID" name="book_id" required="required">
                </div>
                 <div class="form-group">
                  <input type="submit" class="form-control  btn-info col-4 offset-4" value="Update ">
                </div>
               
               
              </form>
              
             
            </div>
          </div>
        </div>
      </div>
    </div> -->

 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Lent Date</th>
                       <th>Return Date</th>
                        <th>User</th>
                         <th>Book</th>
                      <th>Edit</th>
                      <th>Delete</th>
                     
                    </tr>
                  </thead>
                  <tfoot>
                   
                  </tfoot>
                 <tbody>
                   <?php 
              include ('database.php');
                   $sql="select l.*,b.name as book_name,u.name as username from lents l inner join books b on b.id=l.book_id inner join users u on u.id=l.user_id";
                   $result=$conn->query($sql);
                   if($result->num_rows>0){
                    $i=1;
                    while($row=$result->fetch_assoc())
                    {
                      $id=$row['id'];
                       $lent_date=$row['lent_date'];
                       $return_date=$row['return_date'];
                       $username=$row['username'];
                       $book=$row['book_name'];
                       echo "<tr>
                       <td>$i</td>
                       <td>$lent_date</td>
                       <td>$return_date</td>
                       <td>$username</td>
                       <td>$book</td>
                       <td><a href='#'data-id=$id class='btn btn-info edit'>Edit</a></td>
                       <td>
                       <form action='deletegender.php' method='POST' onsubmit='return confirm(\"Are you sure\")'>
                       <input type='hidden' value='$id' name='gender_id'>
                       <input type='submit' value='Delete' class='btn-danger '></form></td></tr>";
                       $i++;
                    }
                   }
                   ?>
                 </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
   <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <!-- <script type="text/javascript">
$("#diveditgender").hide();
$("#divaddgender").show();

    $(".edit").click(function(){
      $("#diveditgender").show();
$("#divaddgender").hide();
      var id=$(this).data('id');
      //alert(id);
      $.post('editgender.php',{id:id},function(data){
        //console.log(data);
        var jsondata=JSON.parse(data);
        $("#gender_id").val(jsondata.id);
         $("#gender_name").val(jsondata.name);
      })
    })
  </script>
 -->
</body>

</html>






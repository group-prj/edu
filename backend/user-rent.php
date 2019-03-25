

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Library System</title>

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
          <h1 class="h3 mb-4 text-gray-800">Book Page</h1>
<div class="card shadow mb-4">
           
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                     <th>Photo</th>
                     <th>Name</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    
                  </tfoot>
                 <tbody>
                  <?php
                   include ('database.php');
                   $sql="SELECT b.*,a.name as author_name,c.name as category_name from books b INNER JOIN authors a ON b.author_id=a.id INNER JOIN categories c ON b.category_id=c.id ";
                   //echo "$sql";
                   $result=$conn->query($sql);
                   if($result->num_rows>0){
                    $i=1;
                    while($row=$result->fetch_assoc())
                    {
                      //print_r($row);
                      $id=$row['id'];
                      $book_code=$row['book_code'];
                       $name=$row['name'];
                       $category=$row['category_name'];
                        $author=$row['author_name'];
                         $photo=$row['photo'];
                          $description=$row['description'];
                          $price=$row['price'];
                          $quantity=$row['quantity'];
                         
                       echo "<tr>
                      
                         <td><img src='$photo' width=100 height=100 ></td>
                          
                          <td>$name</td>
                      ";
                       $i++;
                    }
                   }
                   ?>
                 </tbody>
                </table>
              </div>
            </div>
          </div>


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
</div>
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
  <script type="text/javascript">
$("#diveditbook").hide();
$("#divaddbook").show();

    $(".edit").click(function(){
      $("#diveditbook").show();
$("#divaddbook").hide();
      var id=$(this).data('id');
      //alert(id);
      $.post('editbook.php',{id:id},function(data){
        //console.log(data);
        var jsondata=JSON.parse(data);
        console.log(jsondata);
        $("#book_id").val(jsondata.id);
       // $("#ubook_code").val(jsondata.book_code);
        $("#ubook_name").val(jsondata.name);
        $("#ucategory_id").val(jsondata.category_id);
        $("#uauthor_id").val(jsondata.author_id);
       
         $("#uprice").val(jsondata.price);
         $("#uquantity").val(jsondata.quantity);
         $("#udescription").val(jsondata.description);
         $("#divphotoupload").hide();
         $("#divshowoldphoto").show();
         $("#img").attr("src",jsondata.photo);
         $("#oldphotolink").val(jsondata.photo);

      })
    })

// $("#divshowoldphoto").on('click','#deletebtn',function(){
// $("#divshowoldphoto").hide(2000);
// $("#divphotoupload").show();




  </script>
</body>

</html>








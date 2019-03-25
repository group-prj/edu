

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
          <h1 class="h3 mb-4 text-gray-800">MIC Sale</h1>


<div class="card o-hidden border-0 shadow-lg my-5" id="divaddbrand">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create Lent Book Name!</h1>
                
              </div>
              <form class="user" action="" method="post">
               
                
                 <div class="form-group">
                  
                  <input type="hidden" name="book_id" id="book_id">
                   <input type="text" class="form-control" id="book_code" name="book_code"  placeholder="Book Code">
                 </div>
                 <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>User ID</label>
                        <select name="user_id" class="form-control" id="user_id">
          
                        <?php
                          include('database.php');
                          $sql = "select * from users";
                          $result = $conn->query($sql);
                          //var_dump($result);
                          while ($row = $result->fetch_assoc()) {
                            //print_r($row);
                            $id = $row['id'];
                            $name = $row['name'];
                            echo "<option value='$id'>$name</option>";
                          }
                        ?>
                        </select>
                    </div>
                   </div>
                   <div class="col-lg-4">
                    <div class="form-group">
                      <label>Lent Date</label>
                      <input type="date" class="form-control" id="lent_date" placeholder="lent Date" name="lent_date" required="required">
                    </div>
                   </div>
                   <div class="col-lg-4">
                    <div class="form-group">
                     <label>Return Date</label>
                      <input type="date" class="form-control" id="return_date" placeholder="return date" name="return_date" required="required">
                    </div>
                   </div>
                </div>
                 <div class="form-group">
                  <!-- <input type="hidden" name="book_id" id="book_id"> -->
                   <table class="table">
                     <thead>
                       <tr>
                         <th>No.</th>
                         <th>Book Code.</th>
                         <th>Name.</th>
                         <th>Author.</th>
                         <th>Category</th>
                         <th>Qty</th>
                       </tr>
                     </thead>
                     <tbody id="mytbody">
                       
                     </tbody>
                   </table>
                   <input type="submit" value="Rent" class="btn btn-info order">
                 </div>
               
              </form>
              
             
            </div>
          </div>
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
  <script type="text/javascript">
    showtable();

    $("#book_code").change(function(){
      var book_code=$(this).val();
      $.post('getiteminfo.php',{book_code:book_code},function(data){
        console.log(data);
        var mydata=JSON.parse(data);
      
        console.log(mydata);
        var mylist=localStorage.getItem('mylist');

        if(!mylist)
        {
          mylist='{"mylist":[]}';
        }
        var mylistobj=JSON.parse(mylist);
        var length=mylistobj.mylist.length;
        var mylist=mylistobj.mylist;
        for (var i = 0; i <length; i++) {
          if(mylist[i].id==mydata.id)
          {
            var exit=1;
            //mylist[i].qty++;
          }
        }
        if(!exit){
        
        mylistobj.mylist.push(mydata);
        }
        localStorage.setItem('mylist',JSON.stringify(mylistobj));
        //$("#book_code").val('');
        showtable();
      })
    })
    function showtable(){
      var mylist=localStorage.getItem('mylist');
      if(mylist)
      {
        var mylistobj=JSON.parse(mylist);
        var html=''; 
        //var total=0;
        var j=1;
        $.each(mylistobj.mylist,function(i,v)
        {
          if(v)
          {
            var book_code=v.book_code;
            var name=v.name;
            var author=v.author_id;
            var category=v.category_id;
            var quantity=v.quantity;
            // var subtotal=parseInt(price)*parseInt(quantity);
            // total+=parseInt(subtotal);
            html=html+'<tr><td>'+j+'</td><td>'+book_code+'</td><td>'+name+'</td><td>'+author+'</td><td>'+category+'</td><td>'+quantity+'</td></tr>';
            j++;
          }
        })
        // html=html+'<tr><td colspan=4>Total</td><td>'+total+'</td></tr>';
        $("#mytbody").html(html);
      }
      else{
        $('#mytbody').html('');
      }
    }
    $(".order").click(function()
    {
      var vbook_code = $("#book_code").val();
var vuser_id = $("#user_id").val();
var vlent_date = $("#lent_date").val();
var vreturn_date = $("#return_date").val();
       var mylist=localStorage.getItem('mylist');
      if(mylist)
      {
        var mylist=JSON.parse(mylist);
        var mylistarr=mylist.mylist;
        console.log(mylistarr);
        $.post('order.php',{book:mylistarr,book_code:vbook_code,user_id:vuser_id,lent_date:vlent_date,return_date:vreturn_date},function(response){
alert(response);
if(response)
                    {
                        localStorage.clear();
                        alert('YOur Order successfully completed');
                        showtable();

                    }
        })      
      }
    })
  
  </script>

</body>

</html>



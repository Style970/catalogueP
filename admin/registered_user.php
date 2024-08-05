<?php
include('authentication.php');
$page_title = "Register page";
include "include/header.php";
include('include/topbar.php');
include('include/sidebar.php');
include('config/dbconn.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
  <!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
      </div>
      <form action="registerCode.php" class="needs-validation" novalidate method="post" oninput='pass2.setCustomValidity(pass2.value != pass.value ? "Passwords do not match." : "")'>
        
     <div class="modal-body">
   <div class="form-group">
    <label for="name">Full Nname:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <span class="email_error float-right"></span>
    <input type="email" class="form-control email_id" placeholder="Enter email" id="email" name="email" required>
  </div>
  
  <div class="form-group">
    <label for="mobile">Mobile No:</label>
    <input type="number" class="form-control" placeholder="Enter Mobile" id="mobile" name="mobile" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd" required name="pass">
  </div>
  <div class="form-group">
    <label for="pwd2">Confirm Password:</label>
    <input type="password" class="form-control" placeholder="Enter Confirm password" id="pwd2" required name="pass2">
  </div>
  <div class="form-group form-check">
    <input class="form-check-input" type="checkbox" id="checkRem" required>
    <label class="form-check-label"> Remember me
    </label>
    <div class="invalid-feedback">
        Please check terms and condition.
      </div>
  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-primary" name="register_btn">Submit</button> 
       </form>
      </div>
    </div>
  </div>
</div>  
    <!-- popup modal end -->
    
    
     <!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
      </div>
      <form action="registerCode.php" method="post">
      <div class="modal-body">
       <input type="hidden" name="delete_id" class="delete_u_id">
       <p>Are you Delete this record ?</p>
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-danger delete_btn" name="delete_btn">Delete</button>
       </div>
       </form>
      </div>
     </div>
   </div>    
    <!--Delete Modal end-->
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
            <?php
            include('alert.php');
            ?>
            
            <h1>Dashbord</h1>
            <a data-toggle="modal" data-target="#addUserModal" class="btn btn-primary float-right">Add User</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registered Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Mobile No.</th>
                    <th>Registered At</th>
                    <th>Role</th>
                     <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <?php $sql = "SELECT * FROM register_user";
                    $result = mysqli_query($conn ,$sql);
                    if(mysqli_num_rows($result)>0){
                      foreach($result as $row){
                    //  echo $row['db_name'];  
                      ?>  
                  <tr>
                    <td><?php echo $row['db_id']; ?></td>
                    <td><?php echo $row['db_name']; ?>
                    </td>
                    <td><?php echo $row['db_email']; ?>
                    </td>
                    <td><?php echo $row['db_mobile']; ?>
                    </td>
                    <td><?php echo $row['created_at']; ?>
                    </td>
                    <td><?php
                    if($row['db_role_as'] == "0"){
                      echo "Inactive";
                    }elseif($row['db_role_as'] == "1"){
                      echo "Admin";
                    }else{
                      echo "User";
                    }
                    ?>
                    </td>
                    <td>
                      <a href="register_edit.php?user_id=<?php echo $row['db_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                      <a class="btn btn-success btn-sm">Active</a>
                      <button type="button" value="<?php echo $row['db_id']; ?>" class="btn btn-danger btn-sm float-right deletebtn">X</button>
                    </td>
                  </tr>
                       <?php
                      }
                    }else{
                    ?>
                    <tr>
                      <td>No Records</td>
                    </tr>
                    <?php  
                    }
                    ?>  
                    
                    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Mobile No.</th>
                    <th>Registered At</th>
                     <th>Role</th>
                     <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php include ("include/script.php"); ?>
<script>
  //delet Confirmation code
  $(document).ready(function(){
    
    $(document).on("click",".deletebtn",function(e){
     e.preventDefault();
     var u_id = $(this).val();
     $('.delete_u_id').val(u_id);
     $('#deleteModal').modal('show');
    });
    
    
    //check email_id live
    $('.email_id').keyup(function(e){
      var email_A = $(this).val();
      $.ajax({
        type: 'post',
        url: 'registerCode.php',
        data:{
          'check_btn':1,
          'email':email_A,
        },
        success: function(response){
          $('.email_error').html(response);
        }
        });
    });
    
  });
  
  //Registered uaer table responsive code
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<?php include ("include/footer.php"); ?>
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
  
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashbord</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <!-- Content Header (Page header) -->

 <!-- Main content -->
  <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
           <div class="card">
             <div class="card-header bg bg-primary">
                <h3 class="card-title">Edit-User details</h3>
                <a href="registered_user.php" class="btn btn-danger float-right">Back</a>
              </div>
              <!-- /.card-header -->
             <div class="card-body">
               <form action="registerCode.php" class="needs-validation" novalidate method="post" oninput='pass2.setCustomValidity(pass2.value != pass.value ? "Passwords do not match." : "")'>
        <?php if(isset($_GET['user_id'])){
    $u_id = $_GET['user_id'];
    $sql = "SELECT * FROM register_user WHERE db_id = '{$u_id}'";
    $result = mysqli_query($conn ,$sql);
  
     foreach ($result as $row){
    ?>
   <input type="hidden" name="edit_id" value="<?php echo $row['db_id']; ?>">
   <div class="form-group">
    <label for="name">Full Nname:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" required value="<?php echo $row['db_name']; ?>">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required value="<?php echo $row['db_email']; ?>">
  </div>
  
  <div class="form-group">
    <label for="mobile">Mobile No:</label>
    <input type="number" class="form-control" placeholder="Enter Mobile" id="mobile" name="mobile" required value="<?php echo $row['db_mobile']; ?>">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd" required name="pass" value="<?php echo $row['db_pass']; ?>">
  </div>
  <div class="form-group">
    <label for="pwd2">Confirm Password:</label>
    <input type="password" class="form-control" placeholder="Enter Confirm password" id="pwd2" required name="pass2" value="<?php echo $row['db_pass']; ?>">
    </div>
      <div class="form-group">
    <label for="">User Role:</label>
    <select name="role_as" class="form-control" required>
      <option value="">Select</option>
      <option value="2">User</option>
      <option value="1">Admin</option>
    </select>
    </div>
       <button type="submit" class="btn btn-primary" name="registerEdit_btn">Save changes</button> 
        <?php
           }
  
        }else{
          echo "No record Faund";
        }
        ?>
       </form>
               
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
<?php include ("include/footer.php"); ?>
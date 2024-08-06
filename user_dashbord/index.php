<?php
include "include/authentication.php";
$page_title = "Dashboard page";
include "include/header.php";
include('include/topbar.php');
include('include/sidebar.php');
include "../admin/config/dbconn.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
            <!-- Modal -->
  <div class="modal fade" id="create_catalog_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
      </div>
      <form action="registerCode.php" class="needs-validation" novalidate method="post">
        
     <div class="modal-body">
   <div class="form-group">
    <label for="name">Catalogue Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" required>
  </div>
  
  <div class="form-group">
    <label for="catagory">Catagory :</label>
    <input type="text" class="form-control" placeholder="Enter Catagory" id="catagory" name="catagory" required>
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
            
            <?php
            include('../admin/alert.php');
            ?>
            <h1 class="m-0">Dashboard</h1>
             <a data-toggle="modal" data-target="#create_catalog_Modal" class="btn btn-primary float-right">Create New</a>
             
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

   
   
   

</div><!--content-wrapper-->
<?php include ("include/footer.php"); ?>
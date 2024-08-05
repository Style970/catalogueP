<?php
include('authentication.php');
include "config/dbconn.php";
$page_title = "Category Edit page";
include "include/header.php";
include('include/topbar.php');
include('include/sidebar.php');
?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashbord</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
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
                <a href="category.php" class="btn btn-danger float-right">Back</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="registerCode.php" class="needs-validation" novalidate method="post">
          <?php
          if(isset($_GET['time'])){
          $time = $_GET['time'];
            
            $category_sql = "SELECT * FROM categories WHERE created_at='$time' LIMIT 1";
             $sql_run = mysqli_query($conn, $category_sql);
             
               foreach($sql_run as $row){
                 
          ?>
          
        <div class="form-group">
        <input type="hidden" name="cat_id" value="<?= $row['db_id']; ?>"/>
        <label for="">Catagory Nname:</label>
       <input type="text" class="form-control" placeholder="Enter name" name="name" value="<?php echo $row['db_cat_name']; ?>" required>
       </div>
       <div class="form-group">
        <label for="">Description:</label>
       <textarea name="description" class="form-control" rows="3"  required><?php echo $row['db_cat_desc']; ?></textarea>
       </div>
       <div class="form-check">
       <input class="form-check-input" type="checkbox" name="checkTrend" <?php echo $row['db_trend'] == '1' ? 'checked':''; ?>/>
       <label for="">Trending</label>
       </div>
       <div class="form-check">
        <input class="form-check-input" type="checkbox"  name="checkStatus" <?php echo $row['db_status'] == '1' ? 'checked':''; ?>/>
        <label for="">Status </label>
       </div>
        <button type="submit" name="catagoryEdit_btn" class="btn btn-primary">Update</button>
        <?php
               }//foreach
          }else{
            echo "<h3 class='text-danger'>No Record Faund</h2>";
          }
          ?>
      </from><!-- form-->
                
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

</div><!--content-wrapper-->
<?php include ("include/script.php"); ?>
<?php include ("include/footer.php"); ?>
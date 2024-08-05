<?php
include('authentication.php');
include "config/dbconn.php";
$page_title = "Category page";
include "include/header.php";
include('include/topbar.php');
include('include/sidebar.php');
?>
<div class="content-wrapper">
  
  <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php
            include('alert.php');
            ?>
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Product Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div><!--content header-->
   
   
   <?php
   //Update fatch data
  if(isset($_GET['ptime'])){
    $p_time = $_GET['ptime'];
    $p_edit_sql = "SELECT * FROM products WHERE created_at='$p_time'";
    $p_edit_run = mysqli_query($conn, $p_edit_sql);
    if(mysqli_num_rows($p_edit_run)>0){
      $edit_item = mysqli_fetch_array($p_edit_run);
      ?>
    
    <!-- Main content -->
  <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
           <div class="card">
             <div class="card-header bg bg-primary">
                <h3 class="card-title">Product Edit Form</h3>
                <a href="products.php" class="btn btn-danger float-right">Back</a>
              </div> <!-- /.card-header -->
              
              <div class="card-body">
      <form action="registerCode.php" method="post" enctype="multipart/form-data">  
       <div class="row">
       <div class="col-sm-12">
        <div class="form-group"> 
        <label>Select Category</label>
      <?php
      $sql = "SELECT * FROM categories";
      $sql_run = mysqli_query($conn, $sql);
      if(mysqli_num_rows($sql_run)>0){
        
          ?>
        <select name="pro_category" class="form-control" required>
          <?php foreach($sql_run as $item){ ?>  
        <option value="<?= $item['db_id']?>" <?= $edit_item['category_id'] == $item['db_id'] ?'selected':''?>>
          <?= $item['db_cat_name']?>
        </option>
        <?php } ?>  
        </select>
          <?php
      }
      ?>
       </div>
      </div>
      <input type="hidden" name='Pedit_Id' value="<?=$edit_item['db_id']?>">
      <input type="hidden" name='time_id' value="<?=$edit_item['created_at']?>">
      
      <div class="col-sm-12">
      <div class="form-group">
     <label>Product Nname:</label>
     <input type="text" value="<?=$edit_item['db_name']?>" class="form-control" placeholder="Enter name" name="name" required>
      </div>
      </div>
      <div class="col-sm-6">
      <div class="form-group">
     <label>Short Description:</label>
     <textarea type="text" class="form-control" placeholder="Short Description" name="short_desc" required><?=$edit_item['db_small_desc']?></textarea>
      </div>
      </div>
      <div class="col-sm-6">
      <div class="form-group">
     <label>Long Description:</label>
     <textarea type="text" class="form-control" placeholder="Long Description" name="long_desc" required><?=$edit_item['db_long_desc']?></textarea>
      </div>
      </div>
      <div class="col-sm-3">
      <div class="form-group">
     <label>Quantity:</label>
     <input type="number" value="<?=$edit_item['db_quantity']?>" class="form-control" placeholder="Enter Quantity" name="quantity" required>
      </div>
      </div>
      <div class="col-sm-3">
      <div class="form-group">
     <label>Price:</label>
     <input type="number" value="<?=$edit_item['db_price']?>" class="form-control" placeholder="Enter name" name="price" required>
      </div>
      </div>
      <div class="col-sm-3">
      <div class="form-group">
     <label>Offer Price:</label>
     <input type="number" value="<?=$edit_item['db_offer_price']?>" class="form-control" placeholder="Enter Offer Price" name="offerPrice" required>
      </div>
      </div>
      <div class="col-sm-3">
      <div class="form-group">
     <label>Tax:</label>
     <input type="number" value="<?=$edit_item['db_tax']?>" class="form-control" placeholder="Enter Tax" name="price_tax" required>
      </div>
      </div>
      <div class="col-sm-12">
      <div class="form-group">
     <label>Status (show/hide):</label>
     <input type="checkbox" <?=$edit_item['db_status'] == '1' ? 'checked':''?> name="status_check">
      </div>
      </div>
      <div class="col-sm-8">
      <div class="form-group">
     <label>Select Image :</label>
     <input type="file" class="form-control" id="pro_image" name="pro_image">
      </div>
      <div class="form-group col-sm-6">
        <button class="form-control btn btn-primary">Upload</button>
      </div>
      </div><!--col 8-->
      
      <div class="col-sm-4">
      <div class="form-group">
      <label>Image:</label>
     <img style="border: 2px solid black" id="imgdiv" src="uploads/product/<?=$edit_item['db_image']?>">
    <!--old image--> 
     <label><?=$edit_item['db_image']?></label>
     <input type="hidden" name='old_image' value="<?=$edit_item['db_image']?>">
     <!--old image--> 
      </div>
      <div class="form-group col-sm-12">
        <button class="form-control btn btn-success">Remove background</button>
      </div>
      </div>
      
      <div class="col-sm-4">
      <div class="form-group">
     <label>Click to Update:</label>
     <button type="submit" name="productbtn_update" class="btn btn-success btn-block">Update</button>
      </div>
      </div>
      
             </div><!-- /row -->
             </form>
              </div><!-- /.card body-->
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
    <?php
      
    }else{
      echo "<h2 class='text-danger'>no such found</h2>";
    }
    
  }
  ?>
   
   
  </div><!--content-wrapper-->
  
  <script type="text/javascript">
  pro_image.onchange = evt =>
  {
    const[file]=pro_image.files
    if(file){
      imgdiv.src=URL.createObjectURL(file)
    }
    
  }
</script>
<?php include ("include/script.php");?> 

<?php include ("include/footer.php");?>
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
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div><!--content header-->
   
    <!-- Main content -->
  <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
           <div class="card">
             <div class="card-header bg bg-primary">
                <h3 class="card-title">Add Product Form</h3>
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
          <option>Select Category</option>
          <?php foreach($sql_run as $item){ ?>  
        <option value="<?= $item['db_id']?>"><?= $item['db_cat_name']?></option>
        <?php } ?>  
        </select>
          <?php
      }
      ?>
       </div>
      </div>
              
      <div class="col-sm-12">
      <div class="form-group">
     <label>Product Nname:</label>
     <input type="text" class="form-control" placeholder="Enter name" name="name" required>
      </div>
      </div>
      <div class="col-sm-6">
      <div class="form-group">
     <label>Short Description:</label>
     <textarea type="text" class="form-control" placeholder="Short Description" name="short_desc" required></textarea>
      </div>
      </div>
      <div class="col-sm-6">
      <div class="form-group">
     <label>Long Description:</label>
     <textarea type="text" class="form-control" placeholder="Long Description" name="long_desc" required></textarea>
      </div>
      </div>
      <div class="col-sm-3">
      <div class="form-group">
     <label>Quantity:</label>
     <input type="number" class="form-control" placeholder="Enter Quantity" name="quantity" required>
      </div>
      </div>
      <div class="col-sm-3">
      <div class="form-group">
     <label>Price:</label>
     <input type="number" class="form-control" placeholder="Enter name" name="price" required>
      </div>
      </div>
      <div class="col-sm-3">
      <div class="form-group">
     <label>Offer Price:</label>
     <input type="number" class="form-control" placeholder="Enter Offer Price" name="offerPrice" required>
      </div>
      </div>
      <div class="col-sm-3">
      <div class="form-group">
     <label>Tax:</label>
     <input type="number" class="form-control" placeholder="Enter Tax" name="price_tax" required>
      </div>
      </div>
      <div class="col-sm-12">
      <div class="form-group">
     <label>Status (show/hide):</label>
     <input type="checkbox" name="status_check">
      </div>
      </div>
      <div class="col-sm-8">
      <div class="form-group">
     <label>Select Image :</label>
     <input type="file" class="form-control" id="pro_image" name="pro_image" required>
      </div>
      <div class="form-group col-sm-6">
        <button class="form-control btn btn-primary">Upload</button>
      </div>
      </div><!--col 8-->
      
      <div class="col-sm-4">
      <div class="form-group divImage">
      
     <img id="imgdiv" src="">
      </div>
       <div class="form-group col-sm-12">
        <a href="#" class="btn btn-success float-right" onclick="removeBg()">Remove background</a>
      </div>
      </div>
    
      <div class="col-sm-4">
      <div class="form-group">
     <label>Click to Save:</label>
     <button type="submit" name="productbtn_save" class="btn btn-primary btn-block">Save</button>
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
   
   
  </div><!--content-wrapper-->
  
  <script type="text/javascript">
    let imageURL;//background imageURL
  //background remove
function removeBg(){
   // alert('seccess');
    const fileInput = document.getElementById('pro_image');
    const image = fileInput.files[0];
    
    const formData = new FormData();
    formData.append("image_file",image);
    formData.append('size','auto')
    const apiKey = "sMWHL9Cj1MNZcd9YjHTB1VJf"
    fetch('https://api.remove.bg/v1.0/removebg',{
        method: 'POST',
        headers:{
            'X-api-key': apiKey,
            
        },
        body:formData
    })
    
    .then(function(response){
        return response.blob();
    })
    .then(function(blob){
        const url=URL.createObjectURL(blob);
        imageURL = url;
       // const img=document.createElement('img');
       // img.src=url;
  
      // document.getElementById("result").appendChild(img);
      var img = document.getElementById("imgdiv");
      
      img.src=url;
      alert('bg remove successfull');
    })
    .catch();
    
}
//bg remove download
    
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
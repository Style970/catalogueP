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
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div><!--content header-->
   
   
   <section class="Content mt-4">
     <div class="container">
       <div class="row">
         <div class="col-sm-12">
           <div class="card">
             <div class="card-header">
               <h4>
                 Products
               <a href="product_add.php" class="btn btn-primary float-right">Add</a>
               </h4>
             </div>
             <div class="card-body"><!--card body-->
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Product short Description</th>
                    <th>Catagory</th>
                    <th>Status</th>
                    <th>Price</th>
                     <th>Tax</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Created At</th>
                     <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = "SELECT * FROM products";
                  $query_run = mysqli_query($conn, $query);
                  if(mysqli_num_rows($query_run)>0){
                    foreach($query_run as $row){
                  ?>
                  <tr>
                    <td><?php echo $row['db_id']; ?></td>
                    <td><?php echo $row['db_name']; ?></td>
                    <td><?php echo $row['db_small_desc']; ?></td>
                    <td><?php echo $row['category_id'];
                    ?></td>
                    <td><?php
                     if($row['db_status'] == '0'){
                      echo '<b class="text-success">show</b>';
                    }else{
                      echo '<b class="text-danger">hide</b>';
                    }
                      ?>
                    </td>
                    <td><?php echo $row['db_price'].' ₹'; ?></td>
                    <td><?php echo $row['db_tax'].' %'; ?></td>
                    <td><?php echo $row['db_quantity']; ?></td>
                    <td><?php echo $row['db_image']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><a href="product_edit.php?ptime=<?= $row['created_at']; ?>" class="btn btn-info btn-sm">Edit</a><button type="button" value="<?php echo $row['db_id']; ?>" class="btn btn-danger btn-sm deletebtn m-2">Delete</button>
                    </td>
                    
                  </tr>
                  <?php
                     }//foreach
                   }else{
                    ?>
                    <tr>
                      <td>No Category</td><td></td>
                    <td></td><td></td>
                    <td></td><td></td>
                    <td></td><td></td>
                    <td></td><td></td>
                    
                    </tr>
                    <?php  
                    }
                    ?>  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Product short Description</th>
                    <th>Catagory</th>
                    <th>Status</th>
                    <th>Price</th>
                     <th>Tax</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Created At</th>
                     <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
             </div><!--card body end-->
           </div>
         </div>
       </div>
     </div>
   </section>
   
   
  </div><!--content-wrapper-->
<?php include ("include/script.php");?>
<script>
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

<?php include ("include/footer.php");?>
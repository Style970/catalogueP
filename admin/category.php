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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div><!--content header-->
   
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
       <input type="hidden" name="delete_cat_id" class="delete_u_id">
       <p>Are you Delete this record ?</p>
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-danger delete_btn" name="delete_cat_btn">Delete</button>
       </div>
       </form>
      </div>
     </div>
   </div>    
    <!--Delete Modal end-->
   
   <!-- Modal -->
   <div class="modal fade" id="catagoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gift Catagory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <!-- Modal form-->
      <form action="registerCode.php" class="needs-validation" novalidate method="post">
       <div class="modal-body">
        <div class="form-group">
        <label for="">Catagory Nname:</label>
       <input type="text" class="form-control" placeholder="Enter name" name="name" required>
       </div>
       <div class="form-group">
        <label for="">Description:</label>
       <textarea name="description" class="form-control" rows="3" required></textarea>
       </div>
       <div class="form-check">
       <input class="form-check-input" type="checkbox" name="checkTrend">
       <label for="">Trending</label>
       </div>
       <div class="form-check">
        <input class="form-check-input" type="checkbox" name="checkStatus">
        <label for="">Status </label>
       </div>
      
      </div><!-- Modal body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="catagory_btn" class="btn btn-primary">Save</button>
      </div>
      </from><!-- Modal form-->
      
    </div>
   </div>
   </div> <!-- Modal end-->
   
   <section class="Content mt-4">
     <div class="container">
       <div class="row">
         <div class="col-sm-12">
           <div class="card">
             <div class="card-header">
               <h4>
                 Gift Catagory
               <a href="#" data-toggle="modal" data-target="#catagoryModal" class="btn btn-primary float-right">Add</a>
               </h4>
             </div>
             <div class="card-body"><!--card body-->
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Trending</th>
                    <th>Status</th>
                    <th>Created At</th>
                     <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = "SELECT * FROM categories";
                  $query_run = mysqli_query($conn, $query);
                  if(mysqli_num_rows($query_run)>0){
                    foreach($query_run as $row){
                  ?>
                  <tr>
                    <td><?php echo $row['db_id']; ?></td>
                    <td><?php echo $row['db_cat_name']; ?></td>
                    <td><?php echo $row['db_cat_desc']; ?></td>
                    <td><?php
                    if($row['db_trend'] == '1'){
                      echo '<b class="text-success">Yes</b>';
                    }else{
                      echo '<b class="text-danger">No</b>';
                    }
                    ?></td>
                    <td><?php
                     if($row['db_status'] == '1'){
                      echo '<b class="text-success">Active</b>';
                    }else{
                      echo '<b class="text-danger">Inactive</b>';
                    }
                      ?>
                    </td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><a href="category_edit.php?time=<?= $row['created_at']; ?>" class="btn btn-info btn-sm">Edit</a><button type="button" value="<?php echo $row['db_id']; ?>" class="btn btn-danger btn-sm deletebtn m-2">Delete</button>
                    </td>
                  </tr>
                  <?php
                     }//foreach
                   }else{
                    ?>
                    <tr>
                      <td>No Category</td>
                    </tr>
                    <?php  
                    }
                    ?>  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Trending</th>
                    <th>Status</th>
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
<?php include ("include/script.php"); ?>
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
  
  
      //delet Confirmation code
  $(document).ready(function(){
    
    $(document).on("click",".deletebtn",function(e){
     e.preventDefault();
     var u_id = $(this).val();
     $('.delete_u_id').val(u_id);
     $('#deleteModal').modal('show');
    });
  });  
</script>
<?php include ("include/footer.php"); ?>
<?php
include('authentication.php');
include("config/dbconn.php");

//logout code
if(isset($_POST['logout_btn'])){
 
  session_destroy();
  unset($_SESSION['auth']);
  unset($_SESSION['auth_user']);
  
  $_SESSION['status'] = "<h6 class='text-danger'>You are logout</h6>";
  header("Location: ../login.php");
  exit(0);
}//logout end


//check email ajax
 if(isset($_POST['check_btn'])){
  $email = $_POST['email'];
  $email_live = "SELECT db_email FROM register_user WHERE db_email='$email' ";
      $email_live_run = mysqli_query($conn, $email_live);
      if(mysqli_num_rows($email_live_run)>0){
        echo "<spam class='text-danger'>Alredy Exist</smap>";
      }else{
        echo "";
      }
 }//check live email

//register user code
 if(isset($_POST['register_btn'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['pass'];
  $password2 = $_POST['pass2'];
 
  //check confirm $password
   if($password == $password2){
      //check email exist
      $email_check = "SELECT db_email FROM register_user WHERE db_email='$email' ";
      $email_check_run = mysqli_query($conn, $email_check);
      if(mysqli_num_rows($email_check_run)>0){
        $_SESSION['status'] = "<h6 class='text-danger'>Email alredy Exist</h6>";
      }else{
        // Inser user / registeration data
       $query = "INSERT INTO register_user (db_name, db_email, db_mobile, db_pass) VALUES ('$name','$email','$mobile','$password')";
       $query_run = mysqli_query($conn, $query);
        if($query_run){
         $_SESSION['status'] = "<h6 class='text-success'>Register Successfully</h6>";
     
         header("Location: registered_user.php");
        }else{
         $_SESSION['status'] = "<h6 class='text-danger'>Not Successfully</h6>";
     
         header("Location: registered_user.php");
        }
        
      }
      
      
    }else{
      $_SESSION['status'] = "<h6 class='text-danger'>Confirm password dose not match</h6>";
      header("Location: registered_user.php");
    }

  }//registered_user code end


//registered_user delete code
if(isset($_POST['delete_btn'])){
  $user_id = $_POST['delete_id'];
  $delete_sql = "DELETE FROM register_user WHERE db_id = {$user_id}";
  $delete_query = mysqli_query($conn, $delete_sql);
  if($delete_query){
    $_SESSION['status'] = "<h6 class='text-success'>DELETE Successfully</h6>";
    header("Location: registered_user.php");
    
  }else{
    $_SESSION['status'] = "<h6 class='text-danger'>Not DELETE</h6>";
     
     header("Location: registered_user.php");
  }
}//registered_user DELETE end


//registered_edit code
if(isset($_POST['registerEdit_btn'])){
  $ed_id = $_POST['edit_id'];
  $ed_name = $_POST['name'];
  $ed_email = $_POST['email'];
  $ed_mobile = $_POST['mobile'];
  $ed_password = $_POST['pass'];
  $ed_role = $_POST['role_as'];
  $edit_sql = "UPDATE register_user SET db_name ='{$ed_name}', db_email ='{$ed_email}', db_mobile ='{$ed_mobile}', db_pass ='{$ed_password}', db_role_as='{$ed_role}' WHERE db_id = {$ed_id}";

  if(mysqli_query($conn, $edit_sql)){
   $_SESSION['status'] = "<h6 class='text-success'>Update Successfull";
   header("Location: registered_user.php");
  }else{
   $_SESSION['status'] = "<h6 class='text-success'>Update Not Successfull";
     header("Location: registered_user.php");
  }

}//registered_edit 

//Category add code
if(isset($_POST['catagory_btn'])){
 $ct_name = $_POST['name'];
 $ct_desc = $_POST['description'];
 
 if(isset($_POST['checkTrend'])){
   $ct_trend = "1";
   //$_POST['checkTrend'] == true ? "1":"0";
 }else{
   $ct_trend = "0";
 }
 if(isset($_POST['checkStatus'])){
   $ct_status = "1";
   //$_POST['checkStatus'] == true ? "1":"0";
 }else{
   $ct_status = "0";
 }
 
  $catagory_sql = "INSERT INTO categories (db_cat_name, db_cat_desc, db_trend, db_status) VALUES ('$ct_name','$ct_desc','$ct_trend','$ct_status')";
  $catagory_run = mysqli_query($conn, $catagory_sql);
  
     if($catagory_run){
       $_SESSION['status'] = "<h6 class='text-success'>Register Successfully</h6>";
     
       header("Location: category.php");
      }else{
       $_SESSION['status'] = "<h6 class='text-danger'>Not Successfully</h6>";
     
         header("Location: category.php");
      }
}//Category end

//Category update code
if(isset($_POST['catagoryEdit_btn'])){
   $id = $_POST['cat_id'];
   $cat_name = $_POST['name'];
   $cat_desc = $_POST['description'];
  if(isset($_POST['checkTrend'])){
    $cat_trend = "1";
  }else{
    $cat_trend = "0";
  }
  if(isset($_POST['checkStatus'])){
    $cat_status = '1';
  }else{
    $cat_status = '0';
  }
  $cat_update_sql = "UPDATE categories SET db_cat_name ='{$cat_name}', db_cat_desc ='{$cat_desc}', db_trend ='{$cat_trend}', db_status ='{$cat_status}' WHERE db_id = {$id}";
  $cat_update_run = mysqli_query($conn, $cat_update_sql);
  if($cat_update_run){
    $_SESSION['status'] = "<h6 class='text-success'>Updated Successfully</h6>";
     
       header("Location: category.php");
  }else{
    $_SESSION['status'] = "<h6 class='text-danger'>Not Successfully</h6>";
     
         header("Location: category.php");
  }
  
  
}//Category update end

//categories delete code
if(isset($_POST['delete_cat_btn'])){
  $cat_id = $_POST['delete_cat_id'];
  $delete_sql = "DELETE FROM categories WHERE db_id = {$cat_id}";
  $delete_query = mysqli_query($conn, $delete_sql);
  if($delete_query){
    $_SESSION['status'] = "<h6 class='text-success'>DELETE Successfully</h6>";
    header("Location: category.php");
    
  }else{
    $_SESSION['status'] = "<h6 class='text-danger'>Not DELETE</h6>";
     
     header("Location: category.php");
  }
}//categories DELETE end

//add product code
if(isset($_POST['productbtn_save'])){
  $p_category = $_POST['pro_category'];
  $p_name = $_POST['name'];
  $p_short_desc = $_POST['short_desc'];
  $p_long_desc = $_POST['long_desc'];
  $p_price = $_POST['price'];
  $p_offerprice = $_POST['offerPrice'];
  $p_tax = $_POST['price_tax'];
  $p_quantity = $_POST['quantity'];
  if(isset($_POST['status_check'])){
    $p_status = "1";
  }else{
    $p_status = "0";
  }
  
  $p_image = $_FILES['pro_image']['name'];
  
  $allow_extension = array('jpg','png','jpeg');
  $file_extension = pathinfo($p_image, PATHINFO_EXTENSION);
  
  $filename = time().'.'.$file_extension;
  if(!in_array($file_extension, $allow_extension)){
    $_SESSION['status'] = "<h6 class='text-danger'>Allowed only jpg,jpeg,png</h6>";
    header("Location: product_add.php");
    exit(0);
  }else{
    
    $product_sql = "INSERT INTO products (category_id, db_name, db_small_desc, db_long_desc, db_price, db_offer_price, db_tax, db_quantity, db_image, db_status) VALUES ('$p_category','$p_name','$p_short_desc','$p_long_desc','$p_price','$p_offerprice','$p_tax','$p_quantity','$filename','$p_status')";
    
    $product_run = mysqli_query($conn, $product_sql);
    if($product_run){
      move_uploaded_file($_FILES['pro_image']['tmp_name'], 'uploads/product/'.$filename);
      $_SESSION['status'] = "<h6 class='text-success'>Product Added Successfully</h6>";
    header("Location: products.php");
    exit(0);
    
    }else{
      $_SESSION['status'] = "<h6 class='text-danger'>Sumthing went rong</h6>";
    header("Location: products.php");
    exit(0);
    }
    
  }
  
  
}
//add products code end.


// products update code.
if(isset($_POST['productbtn_update'])){
  $time = $_POST['time_id'];
  $u_id = $_POST['Pedit_Id'];
  $u_category = $_POST['pro_category'];
  $u_name = $_POST['name'];
  $u_short_desc = $_POST['short_desc'];
  $u_long_desc = $_POST['long_desc'];
  $u_price = $_POST['price'];
  $u_offerprice = $_POST['offerPrice'];
  $u_tax = $_POST['price_tax'];
  $u_quantity = $_POST['quantity'];
  if(isset($_POST['status_check'])){
    $u_status = "1";
  }else{
    $u_status = "0";
  }
  //file code
  $u_image = $_FILES['pro_image']['name'];
  $old_image = $_POST['old_image'];
  
  if($u_image != ''){
    $update_img = $_FILES['pro_image']['name'];
    
    $allow_extension = array('jpg','png','jpeg');
  $file_extension = pathinfo($update_img, PATHINFO_EXTENSION);
  $filename = time().'.'.$file_extension;
   if(!in_array($file_extension, $allow_extension)){
    $_SESSION['status'] = "<h6 class='text-danger'>Allowed only jpg,jpeg,png</h6>";
   header("Location: product_edit.php");
    exit(0);
   }
   $update_img = $filename;
    
  }else{
    $update_img = $old_image;
  }
  
  $update_sql = "UPDATE products SET category_id='$u_category', db_name='$u_name', db_small_desc='$u_short_desc', db_long_desc='$u_long_desc', db_price='$u_price', db_offer_price='$u_offerprice', db_tax='$u_tax', db_quantity='$u_quantity', db_image='$update_img', db_status='$u_status' WHERE db_id='$u_id'";
    
  $update_query = mysqli_query($conn, $update_sql);
  if($update_query){
    if($u_image != ''){
      move_uploaded_file($_FILES['pro_image']['tmp_name'], 'uploads/product/'.$filename);
      if(file_exists('uploads/product/'.$old_image)){
        //old image delete ke liye
        unlink('uploads/product/'.$old_image);
        
      }
      
    }
    $_SESSION['status'] = "<h6 class='text-success'>Product Updated Successfully</h6>";
    header("Location: products.php");
    exit(0);
    
    
  }else{
    $_SESSION['status'] = "<h6 class='text-danger'>Not Updated .</h6>";
    header("Location: product_edit.php?ptime=".$time);
    exit(0);
    
  }
  
}
?>
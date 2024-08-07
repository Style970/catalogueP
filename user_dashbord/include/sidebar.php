  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../admin/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <?php if(isset($_SESSION['auth'])) :?>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php 
          if(isset($_SESSION['auth_user']['image-url'])){
        echo $_SESSION['auth_user']['image-url'] ;
          }else{
            echo '../admin/assets/dist/img/user2-160x160.jpg';
          }
        ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php
       if(isset($_SESSION['auth'])){
         echo $_SESSION['auth_user']['user_email'];
       }
       ?>
          </a>
        </div>
      </div>
      <?php endif ?>
      
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
         <?php if(isset($_SESSION['auth'])) :?>
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Catalogue</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="profile.php" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Profile
                <span class="badge badge-info right">1</span>
              </p>
            </a>
          </li>
           <li class="nav-item">
           <div class="bg-dark-subtle">
         <form action="include/logout.php" method="post">
         <button type="submit" class="dropdown-item text-danger" name="logout_btn"> 
           <i class="nav-icon fas fa-power-off"></i>logout
         </button>
       </form>
         </div>
       </li> <?php endif ?>
          
          <li class="nav-header">--------------------------------</li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">
              <i class="nav-icon fa fa-phone"></i>
              <p>
                Contact
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="contactus.php" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Contact Us
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="privacy_policy.php" class="nav-link">
              <i class="nav-icon fas fa-shield-alt"></i>
              <p>
                Privacy Policy
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="terms_condition.php" class="nav-link">
              <i class="nav-icon fas fa-file-contract"></i>
              <p>
                Terms & Condition
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="faq.php" class="nav-link">
              <i class="nav-icon fa fa-question-circle" aria-hidden="true"></i>
              <p>
                FAQ
              </p>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
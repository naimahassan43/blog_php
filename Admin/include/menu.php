<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/users/<?php echo $_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['fullname']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               <!-- <i class="right fas fa-angle-left"></i>-->
              </p>
            </a>
         
          </li>
     <!--Category Menu Start-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                 Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Category</p>
                </a>
              </li>
            </ul>
          </li>
     <!--Category Menu End-->

     <!--Post Menu Start-->
          <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
              All Post
                <i class="fas fa-angle-left right"></i>
              </p>
             </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="post.php?do=Manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="post.php?do=Add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Post</p>
                </a>
              </li>
             </ul>
           </li>
     <!--Post  Menu End-->   
      <!--Comment Menu Start-->
      <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
              All Comments
                <i class="fas fa-angle-left right"></i>
              </p>
             </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="comments.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Comments</p>
                </a>
              </li>
             </ul>
           </li>
       <!--Comment  Menu End-->
      <?php if ($_SESSION['role'] == 1){?>

        <!--Users Menu Start-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                 All Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users.php?do=Manage" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Users</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="users.php?do=Add" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
                <p>Add New Users</p>
              </a>
              </li>
            </ul>
          </li>
        <!--Users  Menu End--> 
      

        <!--Platform  Settings Menu Start-->
          <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
              Platform Settings
                <i class="fas fa-angle-left right"></i>
              </p>
             </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Media</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Settings</p>
                </a>
              </li>
             </ul>
          </li>
     <!--Platform  Settings Menu End-->  


      <?php } 



      ?>
      <?php 
      if( $_SESSION['role'] == 2){ ?>

      <!--My Profile Menu Start-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                 My Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="myProfile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Profile</p>
                </a>
              </li>
            </ul>
          </li>
        <!--My Profile  Menu End--> 

      <?php }

      ?>  
      
      <!--Sign Out Menu Start-->
          <li class="nav-item has-treeview">
             <a href="logout.php" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                Sign Out 
                <i class="fas fa-angle-left right"></i>
              </p>
             </a>
           </li>
     <!--Sign Out Menu End-->  
           
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

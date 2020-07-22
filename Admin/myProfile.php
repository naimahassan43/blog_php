<?php include('include/header.php');?>
<?php include('include/topbar.php');?>
<?php include('include/menu.php');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->  
    <!-- Body Content Start -->  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
              <!--Card Design Start-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">User Information </h3>
              </div>
               <div class="card-body">

                <table class="table table-bordered table-striped table-hover">
                  <tbody>

                  <?php
                      $authID   = $_SESSION['id'];
                      $sql      ="SELECT * FROM users WHERE id = $authID";

                      $userData = mysqli_query($db, $sql);

                      while($row = mysqli_fetch_assoc($userData) ){

                          $id         = $row['id'];
                          $fullname   = $row['fullname'];
                          $email      = $row['email'];
                          $username   = $row['username'];
                          $password   = $row['password'];
                          $phone      = $row['phone'];
                          $address    = $row['address'];
                          $role       = $row['role'];
                          $status     = $row['status'];
                          $image      = $row['image'];
                          $join_date  = $row['join_date'];
                          ?>


                    <tr>
                      <th scope="row">Image</th>
                      <td>
                        <?php

                        if(!empty($image)){?>
                          <img src="img/users/<?php echo $image; ?>" width="60" height="60">
                        <?php }
                        else{ ?>
                          <img src="img/users/default.png" width="60" height="60">
                          <?php 

                              }
                          ?>
                      </td>
                    </tr>

                    <tr>
                      <th scope="row">Fullname</th>
                      <td><?php echo $fullname;?></td>
                    </tr>

                    <tr>
                      <th scope="row">Username</th>
                      <td><?php echo $username;?></td>
                    </tr>

                    <tr>
                      <th scope="row">Email</th>
                      <td><?php echo $email;?></td>
                    </tr>

                    <tr>
                      <th scope="row">Phone</th>
                      <td><?php echo $phone;?></td>
                    </tr>
                    
                    <tr>
                      <th scope="row">Address</th>
                     <td><?php echo $address;?></td>
                    </tr>

                    <tr>
                      <th scope="row">User Role</th>
                      <td><?php echo $role;?></td>
                    </tr>

                    <tr>
                      <th scope="row">Account Status</th>
                      <td><?php echo $status ;?></td>
                    </tr>

                    <tr>
                      <th scope="row">Join Date</th>
                      <td><?php echo $join_date;?></td>
                    </tr>


                  <?php    }

                  ?>  

                  </tbody>
                </table>
               </div>
            </div><!-- /.card -->
              <!--Card Design End-->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="updateUser.php?id=<?php echo $id;?>" class="btn btn-primary btn-flat">
              Update Profile
            </a>
          </div>
        </div>


     </div>
    </section>
    <!-- Body Content End --> 
</div>
 

  <?php include('include/footer.php');?>

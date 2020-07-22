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
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage All Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->  

    <?php
    if ( $_SESSION['role'] == 1 ){ 

      $do = isset( $_GET['do']) ? $_GET['do'] : 'Manage';


    if ( $do == 'Manage' ) { ?>

     
    <!-- Body Content Start -->  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12"> 
              <!--Card Design Start-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Manage All Users</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#Sl.</th>
                      <th scope="col">Image</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Address</th>
                      <th scope="col">User Role</th>
                      <th scope="col">Status</th>
                      <th scope="col">Join Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sql = "SELECT * FROM users ORDER BY id DESC";
                    $allUsers = mysqli_query($db, $sql);
                    $i=0;
                    while( $row = mysqli_fetch_assoc($allUsers) ){

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
                      $i++;
                    ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td>
                          <?php
                            if ( !empty($image) ){?>

                              <img src="img/users/<?php echo $image; ?>" width="35">


                            <?php }

                            else{?>
                               <img src="img/users/default.png; ?>" width="35">

                          <?php  }
                          ?>
                        </td>
                        <td><?php echo $fullname;?></td>
                        <td><?php echo $username;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $phone;?></td>
                        <td><?php echo $address;?></td>
                        <td>
                          <?php 
                          if ($role == 1) { ?>
                            <span class="badge badge-success">Admin</span>    
                          <?php }
                          else if ($role == 2){?>
                            <span class="badge badge-primary">Editor</span>
                          <?php }
                          ?>
                            
                        </td>
                        <td>
                          <?php 
                          if ($status == 0) { ?>
                            <span class="badge badge-danger">In-Active</span>    
                          <?php }
                          else if ($status == 1){?>
                            <span class="badge badge-success">Active</span>
                          <?php }
                          ?>


                        </td>
                        <td><?php echo $join_date;?></td>
                        <td>
                          <div class="action-bar">
                            <ul>
                              <li><a href="users.php?do=Edit&id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></li>
                              <li><a href="" data-toggle="modal" data-target="#delete<?php echo $id; ?>"><i class="fa fa-trash"></i></a></li>
                            </ul>
                            
                          </div>

                        </td>
                    </tr>
                   <!-- Modal -->
                    <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do you Confirm to delete this user?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">

                            <div class="modal-confirmation">
                              <ul>
                                <li>
                                  <a href="users.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger">Confirm</a>
                                </li>
                                <li>
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                </li>
                              </ul>
                              
                            </div>
      
                         </div>
                        </div>
                      </div>
                    </div>


                    <?php }

                    ?>
                  
                  </tbody>
                </table>
              </div>
            </div> <!-- /.card -->
              <!--Card Design End-->
          </div>
        </div>
     </div>
    </section> 
    <!-- Body Content End --> 

    <?php }
    else if ($do == 'Add') {?>
      <!-- Body Content Start -->  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <!--Card Design Start-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Add New Users </h3>
              </div>
              <div class="card-body">
              
                <form action="users.php?do=Insert" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">

                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fullname" class="form-control" autocomplete="off" required="required">
                      </div>

                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" autocomplete="off" required="required">
                      </div>

                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" name="email" class="form-control" autocomplete="off" required="required">
                      </div>

                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" autocomplete="off" required="required">
                      </div>

                      <div class="form-group">
                        <label>Re-Type Password</label>
                        <input type="password" name="rePassword" class="form-control" autocomplete="off" required="required">
                      </div>

                    </div>
                    <div class="col-lg-6">
                      
                      <div class="form-group">
                        <label>Phone No.</label>
                        <input type="text" name="phone" class="form-control" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                          <option value="1">Super Admin</option>
                          <option value="2">Editor</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">In-Active</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Profile Picture</label>
                        <input type="file" name="image" class="form-control-file">
                      </div>

                      <div class="form-group">
                        <input type="submit" name="addUser" class="btn btn-primary btn-flat" value="Register User">
                      </div>

                    </div>
                  </div>
                </form>
                
              </div>
            </div><!-- /.card -->
              <!--Card Design End-->
          </div>
        </div>
     </div>
    </section>
    <!-- Body Content End --> 

    <?php }
    else if ($do == 'Insert') {
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
        $fullname   = $_POST['fullname'];
        $username   = $_POST['username'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $rePassword = $_POST['rePassword'];
        $address    = $_POST['address'];
        $role       = $_POST['role'];
        $status     = $_POST['status'];

        $image      = $_FILES['image']['name'];
        $imageTmp   = $_FILES['image']['tmp_name'];

        if($password == $rePassword){
          // Encryption Password
          $hassedPass = sha1($password);

          if (!empty($image)){

          // Change the Image File Name
          $image = rand(0,5000000) .'_'. $image;
          move_uploaded_file($imageTmp, "img/users/" . $image);

          $sql = "INSERT INTO users (fullname, username, email, password, phone, address, role, status, image, join_date ) VALUES ('$fullname', '$username', '$email', '$hassedPass','$phone','$address', '$role', '$status', '$image', now())";

          $addUser = mysqli_query($db,$sql);
          
          if ($addUser){
            header("Location: users.php?do=Manage");
          }
          else{
            die("MySQLi Error." . mysqli_error($db) );
          }

        }
        else{
           $sql = "INSERT INTO users (fullname, username, email, password, phone, address, role, status, join_date ) VALUES ('$fullname', '$username', '$email', '$hassedPass','$phone','$address', '$role', '$status', now())";

            $addUser = mysqli_query($db,$sql);
          
            if ( $addUser ){
              header("Location: users.php?do=Manage");
            }
            else{
              die("MySQLi Error." . mysqli_error($db) );
            }
          }

        }
        else { ?>

          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12"> -->
                   <div class="alert alert-warning">
                     Your Given Information is not valid. Please Try Again....
                   </div>
                    
                </div>
              </div>
           </div>
          </section>
        <?php }
        }
       }

    else if ($do == 'Edit') {
      if ( isset($_GET['id']) ){
        $update_id = $_GET['id'];

        $sql = "SELECT * FROM users WHERE id='$update_id'";
        $the_user = mysqli_query($db,$sql);
        while ( $row = mysqli_fetch_assoc($the_user) ) {
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
  
  <!-- Body Content Start -->  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <!--Card Design Start-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Update User Info </h3>
              </div>
              <div class="card-body">
                <form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">

                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fullname" class="form-control" autocomplete="off" required="required" value="<?php echo $fullname; ?>">
                      </div>

                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" autocomplete="off" required="required" value="<?php echo $username; ?>" disabled>
                      </div>

                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" name="email" class="form-control" autocomplete="off" required="required" value="<?php echo $email; ?>">
                      </div>

                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Set a New Password">
                      </div>

                      <div class="form-group">
                        <label>Re-Type Password</label>
                        <input type="password" name="rePassword" class="form-control" autocomplete="off" placeholder="Reapeat The New Password">
                      </div>

                    </div>
                    <div class="col-lg-6">
                      
                      <div class="form-group">
                        <label>Phone No.</label>
                        <input type="text" name="phone" class="form-control" autocomplete="off" value="<?php echo $phone; ?>"> 
                      </div>

                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" autocomplete="off"  value="<?php echo $address; ?>">
                      </div>

                      <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                          <option value="1" <?php if ($role == 1){ echo 'selected';}?>>Super Admin</option>
                          <option value="2" <?php if ($role == 2){
                            echo 'selected';
                          }?>>Editor</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1" <?php if ($status == 1){
                            echo 'selected';
                          }?>>Active</option>
                          <option value="0" <?php if ($status == 0){
                            echo 'selected';
                          }?>>In-Active</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Profile Picture</label>
                        <?php 
                        if( !empty($image) ){ ?>

                          <img src="img/users/<?php echo $image; ?>" width="35">

                          <?php
                        }
                          else{ ?>

                          <img src="img/users/default.png" width="35">
                          <?php }
                          ?>
                        <input type="file" name="image" class="form-control-file">
                      </div>

                      <div class="form-group">
                        <input type="hidden" name="updateUserID" value="<?php echo $id;?>">
                        <input type="submit" name="updateUser" class="btn btn-primary btn-flat" value="Save Changes">
                      </div>

                    </div>
                  </div>
                </form>
              </div>
            </div><!-- /.card -->
              <!--Card Design End-->
          </div>
        </div>
     </div>
    </section>
    <!-- Body Content End --> 


      <?php 
        }
      }
    }
    else if ( $do == 'Update' ) {
      if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
        $updateUserID = $_POST['updateUserID'];

        $fullname     = $_POST['fullname'];
        $email        = $_POST['email'];
        $password     = $_POST['password'];
        $rePassword   = $_POST['rePassword'];
        $phone        = $_POST['phone'];
        $address      = $_POST['address'];
        $role         = $_POST['role'];
        $status       = $_POST['status'];

        $image        = $_FILES['image']['name'];
        $imageTmp     = $_FILES['image']['tmp_name'];

         if( !empty($password ) && !empty($image) ){

          if ( $password == $rePassword){
             // Encryption Password
             $hassedPass = sha1($password);

          }
          
          // Change the Image File Name
          $image = rand(0,5000000) .'_'. $image;
          move_uploaded_file($imageTmp, "img/users/" . $image);

          // Delete Existing Image
          
            $query = "SELECT * FROM users WHERE id = '$updateUserID'";
            $read_user_data = mysqli_query($db, $query);
            while( $row = mysqli_fetch_assoc($read_user_data) ){
              $existingImage   = $row['image'];
            }
            unlink("img/users/". $existingImage);

            // Update SQL With Image and Password

            $sql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status', image='$image' WHERE id = '$updateUserID'";

            $addUser = mysqli_query($db,$sql);

            if ($addUser){
              header("Location: users.php?do=Manage");
            }
            else{
              die("MySQLi Error." . mysqli_error($db) );
            }
          }

        else if ( empty($password) && !empty($image) ) {

          // Change the Image File Name
            $image = rand(0,5000000) .'_'. $image;
            move_uploaded_file($imageTmp, "img/users/" . $image);

          // Delete Existing Image
          
            $query = "SELECT * FROM users WHERE id = '$updateUserID'";
            $read_user_data = mysqli_query($db, $query);
            while( $row = mysqli_fetch_assoc($read_user_data) ){
              $existingImage   = $row['image'];
            }
            unlink("img/users/". $existingImage);

            // Update SQL

            $sql = "UPDATE users SET fullname='$fullname',  email='$email', phone = '$phone', address='$address', role='$role', status='$status', image='$image' WHERE id = '$updateUserID'";

            $addUser = mysqli_query( $db, $sql );

            if ( $addUser ){
              header("Location: users.php?do=Manage");
            }
            else{
              die( "MySQLi Error." . mysqli_error($db) );
            }
        }

        else if ( !empty($password) && empty($image) ) {

           if ( $password == $rePassword){
            // Encryption Password
             $hassedPass = sha1($password);

          }

           if ( $password == $rePassword){
            // Encryption Password
             $hassedPass = sha1($password);

          }
          // Update SQL

            $sql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status', WHERE id = '$updateUserID'";

            $addUser = mysqli_query($db,$sql);

            if ($addUser){
              header("Location: users.php?do=Manage");
            }
            else{
              die("MySQLi Error." . mysqli_error($db) );
            }

          }

        else{
          // Update SQL

            $sql = "UPDATE users SET fullname='$fullname', email='$email', phone='$phone', address='$address', role='$role', status='$status', WHERE id = '$updateUserID'";

            $addUser = mysqli_query($db,$sql);

            if ($addUser){
              header("Location: users.php?do=Manage");
            }
            else{
              die("MySQLi Error." . mysqli_error($db) );
            }
          }
        }

    }
    else if ($do == 'Delete') {
      if (isset($_GET['id'])){
        $delete_user_id = $_GET['id'];

        // Delete Existing Image
          
        $query = "SELECT * FROM users WHERE id = '$delete_user_id'";
        $read_user_data = mysqli_query($db, $query);
        while( $row = mysqli_fetch_assoc($read_user_data) ){
          $existingImage   = $row['image'];
        }
        unlink("img/users/". $existingImage);
        
        // Delete the user
        $sql = "DELETE FROM users WHERE id ='$delete_user_id'";
        $confirmDelete = mysqli_query($db,$sql);

        if ($confirmDelete){
              header("Location: users.php");
            }
        else{
          die("MySQLi Error." . mysqli_error($db) );
        }
      }
    }
  }

  else{
    echo '<div class="alert alert-warning"><strong>Sorry!!! You have no access in this page.</strong></div>';
  }

  ?>
  
</div>
 

  <?php include('include/footer.php');?>

 
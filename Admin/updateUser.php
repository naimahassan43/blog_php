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
          <div class="col-md-12">
              <!--Card Design Start-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Update User Information </h3>
              </div>
               <div class="card-body">
              
              <?php

                if ( isset($_GET['id']) ){
                $updateAuthID = $_GET['id'];

                $sql = "SELECT * FROM users WHERE id='$updateAuthID'";
                $the_auth_user = mysqli_query($db,$sql);
                while ( $row = mysqli_fetch_assoc($the_auth_user) ) {
                  $id         = $row['id'];
                  $fullname   = $row['fullname'];
                  $email      = $row['email'];
                  $username   = $row['username'];
                  $password   = $row['password'];
                  $phone      = $row['phone'];
                  $address    = $row['address'];
                  $image      = $row['image'];
                  ?>
      
                 
                 <form action="" method="POST" enctype="multipart/form-data">
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
                        <input type="password" name="rePassword" class="form-control" autocomplete="off" placeholder="Repeat The New Password">
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
                        <select class="form-control" name="role" disabled>
                          
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" disabled>
                          
                        </select>
                      </div>

                     <div class="form-group">
                        <label>Profile Picture</label>
                        <?php

                        if(!empty($image)){?>
                          <img src="img/users/<?php echo $image; ?>" width="60" height="60">
                        <?php }
                        else{ ?>
                          <img src="img/users/default.png" width="60" height="60">
                          <?php 

                              }
                          ?>
                        <input type="file" name="image" class="form-control-file">
                      </div>

                      <div class="form-group">
                        <input type="hidden" name="updateAuthID" value="<?php echo $id;?>">
                        <input type="submit" name="Save_changes" class="btn btn-primary btn-flat" value="Save Changes">
                      </div>

                    </div>
                  </div>
                </form>
              <?php 

                 }

               }

               if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
                    $updateAuthID = $_POST['updateAuthID'];

                    $fullname     = $_POST['fullname'];
                    $email        = $_POST['email'];
                    $password     = $_POST['password'];
                    $rePassword   = $_POST['rePassword'];
                    $phone        = $_POST['phone'];
                    $address      = $_POST['address'];
                  

                    $image        = $_FILES['image']['name'];
                    $imageTmp     = $_FILES['image']['tmp_name'];


                    if ( !empty($image) && !empty($password) ){

                      if($password == $rePassword){
                        // Encryption Password
                        $hassedPass = sha1($password);
                      }

                      // Change the Image File Name
                    $image = rand(0, 5000000).'_'.$image;
                    move_uploaded_file($imageTmp, "img/users/".$image);
                      
                      // Delete Existing Image
                      
                      $query = "SELECT * FROM users WHERE id='$updateAuthID' ";
                      $read_user_data = mysqli_query($db, $query);

                      while ($row = mysqli_fetch_assoc($read_user_data)) {
                        $existingImage   = $row['image'];
                      }
                        unlink("img/users/". $existingImage);

                        $sql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', image='$image' WHERE id='$updateAuthID' ";

                        $addUser = mysqli_query($db,$sql);

                      if ($addUser){
                        header("Location: myProfile.php");
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

                  $sql = "UPDATE users SET fullname='$fullname',  email='$email', phone = '$phone', address='$address', image='$image' WHERE id = '$updateAuthID'";

                  $addUser = mysqli_query( $db, $sql );

                  if ( $addUser ){
                    header("Location: myProfile.php");
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

                  $sql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address' WHERE id = '$updateAuthID'";

                  $addUser = mysqli_query($db,$sql);

                  if ($addUser){
                    header("Location: myProfile.php");
                  }
                  else{
                    die("MySQLi Error." . mysqli_error($db) );
                  }

                }

                else{
              // Update SQL

                $sql = "UPDATE users SET fullname='$fullname', email='$email', phone='$phone', address='$address' WHERE id = '$updateAuthID'";

                $addUser = mysqli_query($db,$sql);

                if ($addUser){
                  header("Location:  myProfile.php");
                }
                else{
                  die("MySQLi Error." . mysqli_error($db) );
                }
              }

               ?>
              <?php }

              ?>  
              </div>
            </div><!-- /.card -->
              <!--Card Design End-->
          </div>
        </div>
     </div>
    </section>
    <!-- Body Content End --> 
</div>
 

  <?php include('include/footer.php');?>

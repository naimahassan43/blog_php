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
            <h1 class="m-0 text-dark">Manage All Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage All Post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->  

    <?php

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
                <h3 class="card-title">Manage All Posts</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#Sl.</th>
                      <th scope="col">Image</th>
                      <th scope="col">title</th>
                      <th scope="col">Category</th>
                      <th scope="col">Author</th>
                      <th scope="col">Status</th>
                      <th scope="col">Post Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sql = "SELECT * FROM post ORDER BY id DESC";
                    $allPosts = mysqli_query($db, $sql);
                    $i=0;
                    while( $row = mysqli_fetch_assoc($allPosts) ){

                      $id             = $row['id'];
                      $title          = $row['title'];
                      $description    = $row['description'];
                      $image          = $row['image'];
                      $category_id    = $row['category_id'];
                      $author_id      = $row['author_id'];
                      $status         = $row['status'];
                      $tags           = $row['tags'];
                      $post_date      = $row['post_date'];
                      $i++;
                    ?>

                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td>
                          <?php
                            if ( !empty($image) ){?>

                              <img src="img/post/<?php echo $image; ?>" width="50">


                            <?php }

                            else{?>
                               <img src="img/post/default.png; ?>" width="50">

                          <?php  }
                          ?>
                        </td>
                        <td><?php echo $title ;?></td>
                        <td>
                          <?php
                            $sql = "SELECT * FROM category";
                            $all_cat = mysqli_query($db, $sql);
                            while( $row = mysqli_fetch_assoc($all_cat) ){
                              $cat_id     = $row['cat_id'];
                              $cat_name   = $row['cat_name']; 
                                
                                if ( $category_id == $cat_id ){
                                  echo '<p>'. $cat_name .'</p>';
                                }

                              }
                          ?>
                          

                        </td>
                        <td>

                          <?php
                            $sql = "SELECT * FROM users";
                            $all_users = mysqli_query($db, $sql);
                            while( $row = mysqli_fetch_assoc($all_users) ){
                              $user_id           = $row['id'];
                              $fullname     = $row['fullname']; 
                                if ( $author_id == $user_id ){
                                  echo '<p>'. $fullname .'</p>';
                                }
                              }
                          ?>


                        </td>

                        <td>
                          <?php 
                          if ($status == 0) { ?>
                            <span class="badge badge-danger">Draft</span>    
                          <?php }
                          else {?>
                            <span class="badge badge-success">Published</span>
                          <?php }
                          ?>
                        </td>
                        <td><?php echo $post_date;?></td>
                        <td>
                          <div class="action-bar">
                            <ul>
                              <li><a href="post.php?do=Edit&id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></li>
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
                            <h5 class="modal-title" id="exampleModalLabel">Do you Confirm to delete this post?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">

                            <div class="modal-confirmation">
                              <ul>
                                <li>
                                  <a href="post.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger">Confirm</a>
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
                <h3 class="card-title">Add New Post</h3>
              </div>
              <div class="card-body">
              
                <form action="post.php?do=Insert" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">

                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" autocomplete="off" required="required">
                      </div>


                      <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id" required="required">
                          <option>Please Select a Category</option>
                          
                          <?php
                            $sql = "SELECT * FROM category ORDER BY cat_name ASC";
                            $all_cat = mysqli_query($db,$sql);

                            while ($row = mysqli_fetch_assoc($all_cat)) {
                               $cat_id     = $row['cat_id'];
                               $cat_name   = $row['cat_name'];
                            ?>

                            <option value="<?php echo $cat_id; ?>">
                              <?php echo $cat_name; ?>
                            </option>
                          <?php }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1">Published</option>
                          <option value="0">Draft</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Meta Tags</label>
                        <input type="text" name="tags" class="form-control" autocomplete="off" required="required">
                      </div>


                      <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="image" class="form-control-file">
                      </div>

                    </div>

                    <div class="col-lg-6">

                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="15"></textarea>
                      </div>

                      <div class="form-group">
                        <input type="submit" name="addPost" class="btn btn-primary btn-flat" value="Register User">
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
       
        $title          = mysqli_real_escape_string($db, $_POST['title']);
        $description    = mysqli_real_escape_string($db, $_POST['description']);
        $category_id    = $_POST['category_id'];
        $author_id      = $_SESSION['id'];
        $status         = $_POST['status'];
        $tags           = mysqli_real_escape_string($db, $_POST['tags']);

        $image          = $_FILES['image']['name'];
        $imageTmp       = $_FILES['image']['tmp_name'];


          if ( !empty($image )){

          // Change the Image File Name
          $image = rand(0,5000000) .'_'. $image;
          move_uploaded_file($imageTmp, "img/post/" . $image);

          $sql = "INSERT INTO post (title, description, image, category_id, author_id, status, tags, post_date) VALUES ('$title', '$description', '$image', '$category_id', '$author_id', '$status', '$tags', now())";

          $addPost = mysqli_query($db, $sql);
          
          if ($addPost){
            header("Location: post.php?do=Manage");
          }
          else{
            die("MySQLi Error." . mysqli_error($db) );
          }

        }

        }
       }

    else if ($do == 'Edit') {

      if ( isset($_GET['id']) ){
        $editId = $_GET['id'];

        $editQuery = "SELECT * FROM post WHERE id ='$editId'";
        $editSql   = mysqli_query($db, $editQuery);

        while ( $row = mysqli_fetch_assoc($editSql) ) {

          $id             = $row['id'];
          $title          = $row['title'];
          $description    = $row['description'];
          $image          = $row['image'];
          $category_id    = $row['category_id'];
          $author_id      = $row['author_id'];
          $status         = $row['status'];
          $tags           = $row['tags'];
          $post_date      = $row['post_date'];
        ?>

  <!-- Body Content Start -->  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <!--Card Design Start-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Edit Post </h3>
              </div>
              <div class="card-body">

                <form action="post.php?do=Update" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" autocomplete="off" value="<?php echo $title; ?>">
                      </div>


                      <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                          <option>Please Select a Category</option>
                          
                          <?php

                            $sql = "SELECT * FROM category ORDER BY cat_name ASC";
                            $edit_cat = mysqli_query($db, $sql);

                            while ($row = mysqli_fetch_assoc($edit_cat)) {
                               $cat_id         = $row['cat_id'];
                               $cat_name       = $row['cat_name'];
                            ?>

                            <option value="<?php echo $cat_id; ?>"
                              <?php if ($cat_id == $category_id ){
                                echo "selected";} ?>><?php echo $cat_name;?>
          
                            </option>
                          <?php }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1" <?php if($status==1){echo "selected";}?>>Published</option>
                          <option value="0" <?php if($status==0){echo "selected";}?>>Draft</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Meta Tags</label>
                        <input type="text" name="tags" class="form-control" autocomplete="off" value="<?php echo $tags; ?>">
                      </div>
            
                      <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="image" class="form-control-file">
                      </div>

                    </div>

                    <div class="col-md-6">

                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="15"><?php echo $description; ?></textarea>
                      </div>

                    </div>
                   <div class="form-group">
                      <input type="hidden" name="updatePostID" value="<?php echo $id;?>">
                      <input type="submit" name="addPost" class="btn btn-primary btn-flat" value="Update Post">
                  </div>


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
        $updatePostID   = $_POST['updatePostID'];

        $title          = mysqli_real_escape_string($db, $_POST['title']);
        $description    = mysqli_real_escape_string($db, $_POST['description']);
        $category_id    = $_POST['category'];
        // $author_id      = $_SESSION['id'];
        $status         = $_POST['status'];
        $tags           = mysqli_real_escape_string($db, $_POST['tags']);

        $image          = $_FILES['image']['name'];
        $imageTmp       = $_FILES['image']['tmp_name'];


        if ( !empty($image )){

          // Change the Image File Name
          $image = rand(0,5000000) .'_'. $image;
          move_uploaded_file($imageTmp, "img/post/" . $image);

          // Delete Existing Image
          
            $query = "SELECT * FROM post WHERE id = '$updatePostID'";
            $read_post_data = mysqli_query($db, $query);
            while ( $row = mysqli_fetch_assoc($read_post_data) ){
              $existingImage = $row['image'];

            }
            
            unlink("img/post/". $existingImage);

            // Update SQL With Image and Password

            $sql = "UPDATE post SET title='$title', description='$description', image='$image', category_id='$category_id', status='$status', tags='$tags' WHERE id = '$updatePostID'";

            $addPost = mysqli_query($db, $sql);

            if ($addPost){
              header("Location: post.php?do=Manage");
            }
            else{
              die("MySQLi Error." . mysqli_error($db) );
            }
          }


        else{
          // Update SQL

            $sql = "UPDATE post SET title='$title', description='$description', category_id ='$category_id', status='$status', tags='$tags' WHERE id = '$updatePostID'";


            $addPost = mysqli_query($db,$sql);

            if ($addPost){
              header("Location: post.php?do=Manage");
            }
            else{
              die("MySQLi Error." . mysqli_error($db) );
            }
          }
        }

    }
    else if ($do == 'Delete') {
      if (isset($_GET['id'])){
        $delete_post_id = $_GET['id'];

        // Delete Existing Image
          
        $query = "SELECT * FROM post WHERE id = '$delete_post_id'";
        $read_post_data = mysqli_query($db, $query);
        while( $row = mysqli_fetch_assoc($read_post_data) ){
          $existingImage   = $row['image'];
        }
        unlink("img/post/". $existingImage);
        
        // Delete the user
        $sql = "DELETE FROM post WHERE id ='$delete_post_id'";
        $confirmDelete = mysqli_query($db,$sql);

        if ($confirmDelete){
              header("Location: post.php");
            }
        else{
          die("MySQLi Error." . mysqli_error($db) );
        }
      }
    }

  ?>
  
</div>
 

  <?php include('include/footer.php');?>

 
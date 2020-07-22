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
            <h1 class="m-0 text-dark">Manage Category</h1>
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

           <!--Column Start-->
          <div class="col-md-6">
      

              <!--Card Design Start-->
            <div class="card card-primary card-outline">
              <div class="card-header">

                <h3 class="card-title">Add New Category </h3>
              </div>
                <div class="card-body">

                <!-- Add Category form -->

                <form action="" method="POST">
                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="cat_name" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label>Category Description</label>
                    <textarea name="cat_desc" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Category Status</label>
                    <select name="cat_status" class="form-control" required="required">
                      <option value="1">Active</option>
                      <option value="0">In-Active</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="add_category" class="btn btn-primary" value="Add Category">
                  </div>
                </form>

                
              </div>
            </div><!-- /.card -->
              <!--Card Design End-->

             <?php
              if(isset($_GET['edit']) ){
                $the_cat_id = $_GET['edit'];

                $sql = "SELECT * FROM category WHERE cat_id = '$the_cat_id' ";
                $select_cat_info = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_assoc($select_cat_info)) {
                     $cat_id     = $row['cat_id'];
                     $cat_name   = $row['cat_name'];
                     $cat_desc   = $row['cat_desc'];
                     $cat_status = $row['cat_status'];


              ?>
            
              


            <!--Card Design Start-->
            <div class="card card-primary card-outline">
              <div class="card-header">

                <h3 class="card-title">Update Category Info </h3>
              </div>
                <div class="card-body">

                <!-- Update Category Info -->

                <form action="" method="POST">
                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="cat_name" class="form-control" required="required" value="<?php echo $cat_name;?>">
                  </div>
                  <div class="form-group">
                    <label>Category Description</label>
                    <textarea name="cat_desc" class="form-control" rows="4"><?php echo $cat_desc ;?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Category Status</label>
                    <select name="cat_status" class="form-control" required="required">
                      <option value="1" <?php if($cat_status == 1){echo "selected";}?>>Active</option>
                      <option value="0" <?php if($cat_status == 0){echo "selected";}?> >In-Active</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="save_changes" class="btn btn-primary" value="Save Changes">
                  </div>
                </form>

                
              </div>
            </div><!-- /.card -->
              <!--Card Design End-->
            <?php }

            // Update Category Info
            
            if (isset($_POST['save_changes']) ){

              $cat_name   = $_POST['cat_name'];
              $cat_desc   = $_POST['cat_desc'];
              $cat_status = $_POST['cat_status'];

              $sql = "UPDATE category SET cat_name ='$cat_name' ,  cat_desc ='$cat_desc', cat_status = '$cat_status' WHERE cat_id = '$the_cat_id' ";  

              $update_cat = mysqli_query($db, $sql);

              if ($update_cat) {
                header("Location: category.php");
              }
              else{
                die("MySQLi Error ". mysqli_error($db) );
              }


             }
            }
          ?>


          </div>
            <!--Column End-->
        <?php 
          // Add New Category
          
          if (isset($_POST['add_category'])) {
            $cat_name   = $_POST['cat_name'];
            $cat_desc   = $_POST['cat_desc'];
            $cat_status = $_POST['cat_status'];

            $sql = "INSERT INTO category (cat_name, cat_desc,cat_status ) VALUES('$cat_name','$cat_desc','$cat_status')";

            $add_cat = mysqli_query($db, $sql);

            if ($add_cat) {
              header("Location: category.php");
            }
            else{
              die("MySQLi Error ". mysqli_error($db) );
            }
          }

          ?>
          


         

           <!--Column Start-->
          <div class="col-md-6">
             <!--Card Design Start-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Manage All Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
             

                  <?php
                  $sql = "SELECT * FROM category ORDER BY cat_name ASC";
                  $all_cat = mysqli_query($db,$sql);
                  $total_cat = mysqli_num_rows($all_cat);

                  $i = 0;

                  if ($total_cat ==0) {
                    echo "No Category Found";
                  }
                  else{?>

                   <table class="table table-striped table-hover table-bordered">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#Sl.</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                  
                   <?php      
                    while ($row = mysqli_fetch_assoc($all_cat)) {
                     $cat_id     = $row['cat_id'];
                     $cat_name   = $row['cat_name'];
                     $cat_desc   = $row['cat_desc'];
                     $cat_status = $row['cat_status'];

                     $i++;

                  ?>

                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $cat_name; ?></td>
                      <td>
                       <?php 

                       if ($cat_status == 1) {?>
                        <span class="badge badge-success">Active</span>

                      <?php 
                        
                       }
                      else{?>
                        <span class="badge badge-danger">In-Active</span>
                      <?php }

                       ?>
                         
                       </td>
                      <td>
                        
                        <div class="action-bar">
                          <ul>
                            <li><a href="category.php?edit=<?php echo $cat_id;?>"><i class="fa fa-edit"></i></a></li>
                            <li><a href="" data-toggle="modal" data-target="#delete<?php echo $cat_id;?>"><i class="fa fa-trash"></i></a></li>
                          </ul>
                          
                        </div>
                      </td>
                    </tr>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="delete<?php echo $cat_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do you Confirm to delete this category?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">

                            <div class="modal-confirmation">
                              <ul>
                                <li>
                                  <a href="category.php?delete=<?php echo $cat_id; ?>" class="btn btn-danger">Confirm</a>
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



                  <?php  } ?>
                  </tbody>
                  </table>
                  <?php
                  }

                 ?>
  
              
              </div>
            </div>
            <!--Column End--> 

            <?php 

            //Delete Category
            if (isset($_GET['delete']) ) {
              $delete_id = $_GET['delete'];
              
              $sql = "DELETE FROM category WHERE cat_id = '$delete_id' ";
              $delete_the_cat = mysqli_query($db,$sql);

              if ( $delete_the_cat ) {
                header("Location: category.php");
              }
              else{
                  die("MySQLi Error". mysqli_error($db));
                 }

            }

            ?>

          </div>
      </div>
    </section>
    <!-- Body Content End --> 
</div>
 

  <?php include('include/footer.php');?>

<?php 
include "inc/header.php";
?>


    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Search Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Search Page</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
                  
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->

  
    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Posts Start -->
                <div class="col-md-8">
                    

                     <?php 

                            if(isset($_POST['search'])){
                            
                            $search= $_POST['search'];

                            $sql = "SELECT * FROM post WHERE title LIKE '%$search%' OR description LIKE '%$search%' ORDER BY id DESC";

                            $searchPost     = mysqli_query($db, $sql);
                            $searchResult   = mysqli_num_rows($searchPost);

                            if($searchResult == 0 ){?>

                                <div>
                                    <strong>Opps!!! Sorry No Blog Post Found in your search keyword. Check back later...</strong>
                                </div>

                            <?php }
                                else{
                                    while ( $row=mysqli_fetch_assoc($searchPost) ){

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

                                <!-- Single Item Blog Post Start -->
                                <div class="blog-post">
                                    <!-- Blog Banner Image -->
                                    <div class="blog-banner">
                                        <a href="single.php?post=<?php echo $id;?>">
                                            <img src="admin/img/post/<?php echo $image ;?>">
                                            <!-- Post Category Names -->
                                            <div class="blog-category-name">

                                            <?php

                                                $sql = "SELECT * FROM category WHERE cat_id=' $category_id' ";
                                                $catDetails = mysqli_query($db, $sql);
                        
                                             while ( $row=mysqli_fetch_assoc($catDetails) ){

                                                 $cat_id    = $row['cat_id'];
                                                 $cat_name  = $row['cat_name'];

                                                ?>
                                                <h6><?php echo $cat_name ;?></h6>

                                                <?php }?>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Blog Title and Description -->
                                    <div class="blog-description">
                                        <a href="single.php?post=<?php echo $id;?>">
                                            <h3 class="post-title"><?php echo $title; ?></h3>
                                        </a>
                                        <p><?php echo substr($description, 0, 275); ?></p>
                                        <!-- Blog Info, Date and Author -->
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="blog-info">
                                                    <ul>
                                                        <li><i class="fa fa-calendar"></i><?php echo $post_date; ?></li>
                                                        <li><i class="fa fa-user"></i>


                                                          <?php
                                                            $sql = "SELECT * FROM users WHERE id='$author_id' ";
                                                            $post_user = mysqli_query($db, $sql);
                                                            while( $row = mysqli_fetch_assoc($post_user) ){
                                                              $user_id      = $row['id'];
                                                              $fullname     = $row['fullname']; 
                                                              ?>
                                                            by - <?php echo $fullname; ?>
                                                           <?php   }
                                                          ?>


                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-4 read-more-btn">
                                                <a href="single.php?post=<?php echo $id;?>" class="btn-main">
                                                Read More <i class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Item Blog Post End -->

                             <?php   }

                         }

                        } 
                     ?>
                   
              
                </div>



               <?php include"inc/sidebar.php";?>
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->

    

<?php include"inc/footer.php";?>

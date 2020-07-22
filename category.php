<?php 
include "inc/header.php";
?>


    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Category Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Category</li>
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

                        if (isset($_GET['id'])){
                            
                            $categoryID = $_GET['id'];

                            $sql = "SELECT * FROM post WHERE category_id = '$categoryID' ORDER BY id DESC";

                            $readCategoryPost = mysqli_query($db,$sql);
                            $totalCat         = mysqli_num_rows($readCategoryPost);

                            if($totalCat==0){?>

                                <div>
                                    <strong>Opps!!! Sorry No Blog Post Found in this Category. Check back later...</strong>
                                </div>

                            <?php }
                                else{
                                    while ( $row=mysqli_fetch_assoc($readCategoryPost) ){

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
                                        <a href="single.php?post=<?php echo $id;?>" >
                                        
                                            <img src="Admin/img/post/<?php echo $image ;?>">
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
                                        <a href="single.php?post=<?php echo $id;?>" >
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
                                                   Read More <i class="fa fa-angle-double-right"></i> 
                                                </a> 
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
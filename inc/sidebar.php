

                <!-- Blog Right Sidebar -->
                <div class="col-md-4">

                    <!-- Latest News -->
                    <div class="widget">
                        <h4>Latest News</h4>
                        <div class="title-border"></div>
                        
                        <!-- Sidebar Latest News Slider Start -->
                        <div class="sidebar-latest-news owl-carousel owl-theme">
                            <!-- First Latest News Start -->

                            <?php

                            $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 3";

                            $latestPost  = mysqli_query($db, $sql);
                            while ( $row = mysqli_fetch_assoc($latestPost) ){
 
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

                            <div class="item">
                                <div class="latest-news">
                                    <!-- Latest News Slider Image -->
                                    <div class="latest-news-image">
                                        <a href="#">
                                            <img src="admin/img/post/<?php echo $image;?>">
                                        </a>
                                    </div>
                                    <!-- Latest News Slider Heading -->
                                    <h5><?php echo $title; ?></h5>
                                    <!-- Latest News Slider Paragraph -->
                                    <p><?php echo substr($description, 0, 75); ?></p>
                                </div>
                            </div>
                            <!-- First Latest News End -->

                            <?php  }

                            ?>
                            
                        </div>
                        <!-- Sidebar Latest News Slider End -->
                    </div>


                    <!-- Search Bar Start -->
                    <div class="widget"> 
                            <!-- Search Bar -->
                            <h4>Blog Search</h4>
                            <div class="title-border"></div>
                            <div class="search-bar">
                                <!-- Search Form Start -->
                                <form action="search.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input">
                                        <i class="fa fa-paper-plane-o"></i>
                                    </div>
                                </form>
                                <!-- Search Form End -->
                            </div>
                    </div>
                    <!-- Search Bar End -->

                    <!-- Recent Post -->
                    <div class="widget">
                        <h4>Recent Posts</h4>
                        <div class="title-border"></div>
                        <div class="recent-post">
                    
                    <?php

                            $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 4";

                            $result  = mysqli_query($db, $sql);
                            while ( $row = mysqli_fetch_assoc($result) ){
 
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


                            <!-- Recent Post Item Content Start -->
                            <div class="recent-post-item">
                                <div class="row">
                                    <!-- Item Image -->
                                    <div class="col-md-4">
                                        <img src="admin/img/post/<?php echo $image;?>">
                                    </div>
                                    <!-- Item Tite -->
                                    <div class="col-md-8 no-padding">
                                        <h5><?php echo $title; ?></h5>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i><?php echo $post_date ; ?></li>
                                            <li><i class="fa fa-comment-o"></i>15</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Post Item Content End -->

                                  <?php

                              }?>



                        </div>
                    </div>

                    <!-- All Category -->
                    <div class="widget">
                        <h4>Blog Categories</h4>
                        <div class="title-border"></div>
                        <!-- Blog Category Start -->
                        <div class="blog-categories">
                            <ul>
                                <?php

                                    $sql      = "SELECT * FROM category";
                                    $allCat = mysqli_query($db, $sql);
                                    while($row = mysqli_fetch_assoc($allCat) ){

                                     $cat_id      = $row['cat_id'];
                                     $cat_name    = $row['cat_name'];
                                     $cat_desc    = $row['cat_desc'];
                                     $cat_status  = $row['cat_status'];

                                    $count = 0;

                                    $query      = "SELECT * FROM post WHERE category_id = $cat_id";
                                    $count_post = mysqli_query($db, $query );
                                    while($row = mysqli_fetch_assoc($count_post) ){
                                    $count++;
                                }

                                 ?>

                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    <?php echo $cat_name; ?>
                                    <span><?php echo $count; ?></span>
                                </li>

                                <?php 

                                }?>



                            
                            </ul>
                        </div>
                        <!-- Blog Category End -->
                    </div>

                    <!-- Recent Comments -->
                    <div class="widget">
                        <h4>Recent Comments</h4>
                        <div class="title-border"></div>
                        <div class="recent-comments">
                            
                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                        </div>
                    </div>

                    <!-- Meta Tag -->
                    <div class="widget">
                        <h4>Tags</h4>
                        <div class="title-border"></div>
                        <!-- Meta Tag List Start -->
                        <div class="meta-tags">

                    <?php

                            $sql = "SELECT * FROM post";

                            $readTag  = mysqli_query($db, $sql);
                            while ( $row = mysqli_fetch_assoc($readTag) ){
 
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

                            <span><?php echo $tags;?></span> 
                            <?php

                            } ?>      
                        </div>
                        <!-- Meta Tag List End -->
                    </div>

                </div>
                <!-- Right Sidebar End -->
           
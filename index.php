<?php
include_once 'includes/header.php';
?>

<!-- Navigation -->
<?php include_once 'includes/navigation.php'; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <?php
            $posts = new Post();
            if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) {
                $postList = $posts->searchAll($_REQUEST['search']);
            } else {
                $postList = $posts->fetchAll();
            }
            if (!empty($postList)) {
                foreach ($postList as $row) {
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_views_count = $row['post_views_count'];
                    $post_status = $row['post_status'];
                    ?>


                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $row['post_title']; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $row['post_author']; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo $row['post_date']; ?></p>
                    <hr>
                    <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                    <hr>
                    <p><?php echo $row['post_content']; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                    <?php
                }//end of foreach
            } else {
                echo "<h2>No posts found</h2>";
            }//end of if (isset($_REQUEST['search'])) 
            ?>

            <!--

            <!-- Pager 
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
            -->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include_once 'includes/sidebar.php'; ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php include_once 'includes/footer.php'; ?>
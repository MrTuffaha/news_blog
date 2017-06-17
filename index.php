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


            if (isset($_REQUEST['option']) && !empty($_REQUEST['option'])) {
                //$postList = $posts->searchAll($_REQUEST['search']);
                switch ($_REQUEST['option']) {
                    case 'search':
                        $postList = $posts->searchAll($_REQUEST['search']);
                        break;
                    case 'category':
                        $postList = $posts->fetchByCategory($_REQUEST['cat_id']);
                        
                        break;
                    default :
                        $postList = $posts->fetchAll();
                        break;
                }
            } else {
                $postList = $posts->fetchAll();
            }
            if (!empty($postList)) {
                foreach ($postList as $row) {
                    $post_id = $row['post_id'];
                    $post_image = $row['post_image'];
                    $post_tags = $posts->decodeIllegalChar($row['post_tags']);
                    $post_comment_count = $row['post_comment_count'];
                    $post_views_count = $row['post_views_count'];
                    $post_title = $posts->decodeIllegalChar($row['post_title']);
                    $post_author = $posts->decodeIllegalChar($row['post_author']);
                    $post_status = $posts->decodeIllegalChar($row['post_status']);
                    $post_content = $posts->decodeIllegalChar($row['post_content']);
                    $post_date = $row['post_date'];
                    ?>


                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive thumbnail" src="<?php echo DIR . $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

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
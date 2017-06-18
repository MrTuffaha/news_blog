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
            if (isset($_REQUEST['post_id']) && !empty($_REQUEST['post_id'])) {
                $thisPost = $posts->fetchById($_REQUEST['post_id']);
            } else {
                header("location: index.php");
            }
            if (!empty($thisPost)) {
                $post_id = $thisPost['post_id'];
                $post_image = $thisPost['post_image'];
                $post_tags = $thisPost['post_tags'];
                $post_comment_count = $thisPost['post_comment_count'];
                $post_views_count = $thisPost['post_views_count'];
                $post_title = $thisPost['post_title'];
                $post_author = $thisPost['post_author'];
                $post_status = $thisPost['post_status'];
                $post_content = $thisPost['post_content'];
                $post_date = $thisPost['post_date'];
                ?>


                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive thumbnail" src="<?php echo DIR . $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <hr>
                <?php
            } else {
                header("location: index.php");
            }//end of if (isset($_REQUEST['post_id']))
            ?>


            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="comment_author">Name: </label>
                        <input class="form-control" name="comment_author" id="comment_author" type="text">
                    </div>
                    <div class="form-group">
                        <label for="comment_email">Email: </label>
                        <input class="form-control" name="comment_email" id="comment_email" type="text">
                    </div>
                    <div class="form-group">
                        <label for="comment_content">Comment: </label>
                        <textarea name="comment_content" id="comment_content" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" name="add_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <?php
            include_once 'includes/Comment.php';
            $comment = new Comment();
            if(isset($_REQUEST['add_comment'])){
                $createComment = new Comment();
                $createComment->setAuthor($_POST['comment_author']);
                $createComment->setEmail($_POST['comment_email']);
                $createComment->setContent($_POST['comment_content']);
                $createComment->createComment($_REQUEST['post_id']);
            }
            $commentList = $comment->fetchByPost($_REQUEST['post_id']);
            if (!empty($commentList)) {
                foreach ($commentList as $row) {
                    $commentID = $row['comment_id'];
                    $commentAuthor = $row['comment_author'];
                    $commentEmail = $row['comment_email'];
                    $commentContent = $row['comment_content'];
                    $commentDate = $row['comment_date'];
                    ?>

                    <!-- Comment -->
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $commentAuthor; ?>
                                <small>  <?php echo $commentDate; ?></small>
                            </h4>
                            <p><?php echo $commentContent; ?></p>
                        </div>
                    </div>

                <?php }
            }
            ?>

            <!--Comment
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.



                     Nested Comment
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment
                </div>
            </div>-->

        </div>

        <!-- Blog Sidebar Widgets Column -->
<?php include_once 'includes/sidebar.php'; ?>

    </div>
    <!-- /.row -->

    <hr>
<?php include_once 'includes/footer.php'; ?>

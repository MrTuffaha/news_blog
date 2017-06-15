<?php
include_once 'includes/header.php';
include_once '../includes/Post.php';

?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include_once 'includes/navigation.php'; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin
                        <small>Omar</small>
                    </h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tag</th>
                                <th>Comment</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $posts = new Post();
                            $postsList = $posts->fetchAll();
                            if(!empty($postsList)){
                                foreach ($postsList as $row){
                            ?>
                            <tr>
                                <td> <?php echo "hellp".$row['post_id'];?> </td>
                                <td> <?php echo $row['post_author']?> </td>
                                <td> <?php echo $row['post_title']?> </td>
                                <td> <?php echo $row['post_category_id']?> </td>
                                <td> <?php echo $row['post_status']?> </td>
                                <td> <?php echo $row['post_image']?> </td>
                                <td> <?php echo $row['post_tags']?> </td>
                                <td> <?php echo $row['post_comment_count']?> </td>
                                <td> <?php echo $row['post_date']?> </td>
                            </tr>
                            <?php }}?>
                        </tbody>
                    </table>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include_once 'includes/footer.php'; ?>

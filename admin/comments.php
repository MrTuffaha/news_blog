<?php
include_once 'includes/header.php';
include_once '../includes/Comment.php';
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
                    <?php
                    if (isset($_GET['source'])) {
                        if ($_GET['source'] == "add_post") {
                            include_once 'add_post.php';
                        } else if ($_GET['source'] == "edit_post") {
                            include_once 'edit_post.php';
                        } else {
                            include_once 'view_all_comments.php';
                        }
                    } else {
                        include_once 'view_all_comments.php';
                    }
                    ?>


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

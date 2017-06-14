<?php include_once 'includes/header.php'; ?>
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
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="" method="GET">
                                <div class="form-group">
                                    <label for="category_text">Add Category</label>
                                    <input type="text" class="form-control" id="category_text" placeholder="Category">
                                </div>
                                <div class="form-group">
                                    <input value="Add Category" type="submit" class="btn btn-primary" id="submit_button" >
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
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
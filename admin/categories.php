<?php include_once 'includes/header.php'; ?>
<?php include_once '../includes/Category.php'; ?>
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
                                    <?php
                                    $categories = new Category();
                                    $categoriesList = $categories->fetchAll();
                                    if (!empty($categoriesList)) {
                                        foreach ($categoriesList as $row) {
                                            echo "<tr>";
                                            echo "<td>{$row['category_id']}</td>";
                                            echo "<td>{$row['category_title']}</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
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
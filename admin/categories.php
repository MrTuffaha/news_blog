<?php
include_once 'includes/header.php';
include_once '../includes/Category.php';
if (isset($_REQUEST['addCategory'])) {
    if (!empty($_REQUEST['category'])) {
        $newCategories = new Category();
        $newCategories->insertCategory($_REQUEST['category']);
    } else {
        $error = "category must not be empty";
    }
}
if (isset($_REQUEST['delete'])) {
    if (!empty($_REQUEST['delete'])) {
        $newCategories = new Category();
        $newCategories->deleteByID($_REQUEST['delete']);
        header("location: categories.php");
    }
}
if (isset($_REQUEST['edit_id'])) {
    if (!empty($_REQUEST['edit_id'])) {
        $editCategories = new Category();
        $category_info = $editCategories->fetchByID($_REQUEST['edit_id']);
        $oldCategoryId = $category_info['category_id'];
        $oldCategory = $category_info['category_title'];
    }
}

if (isset($_REQUEST['editCategory'])) {
    if (!empty($_REQUEST['editCategory'])) {
        $editCategories = new Category();
        $editCategories->updateCategory($_REQUEST['category_id'], $_REQUEST['category']);
        header("location: categories.php");
    }
}
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

                    <div class="row">
                        <div class="col-sm-6">
                            <?php echo isset($error) ? $error : ""; ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="category_text">Add Category</label>
                                    <input name="category" type="text" class="form-control" id="category_text" placeholder="New Category">
                                </div>
                                <div class="form-group">
                                    <input name="addCategory" value="Add Category" type="submit" class="btn btn-primary" id="submit_button" >
                                </div>
                            </form>
                            <?php if (isset($_REQUEST['edit_id'])) { ?>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="category_text">Edit Category</label>
                                        <input type="hidden" name="category_id" value="<?php echo isset($oldCategoryId) ? $oldCategoryId : "" ?>">
                                        <input name="category" type="text" class="form-control" id="category_text" value="<?php echo isset($oldCategory) ? $oldCategory : "" ?>">
                                    </div>
                                    <div class="form-group">
                                        <input name="editCategory" value="Edit Category" type="submit" class="btn btn-primary" id="submit_button" >
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Title</th>
                                            <th>Options</th>
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
                                                echo "<td><a href='categories.php?delete={$row['category_id']}'>Delete</a> "
                                                . "/ <a href='categories.php?edit_id={$row['category_id']}'>Edit</a></td>";
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
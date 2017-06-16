<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form method="GET">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>

        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <div class="row">
                        <?php
                        $categories = new Category();
                        $categoriesList = $categories->fetchAll();
                        if (!empty($categoriesList)) {
                            foreach ($categoriesList as $row) {
                                ?>
                                <div class="col-lg-6">
                                    <li><a href="#"><?php echo $categories->decodeIllegalChar($row['category_title']) ?></a>
                                    </li>
                                </div>
                            <?php }//end of foreach
                        }
                        ?>
                    </div>
                </ul>
            </div>
            <!-- /.col-lg-6 
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
<?php include_once 'widget.php'; ?>

</div>
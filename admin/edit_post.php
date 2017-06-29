<?php
if (!empty(($_REQUEST['post_id']))) {
    if (isset($_POST['edit_post'])) {
        $updatePost = new Post();
        $updatePost->setTitle($_POST['title']);
        $updatePost->setCategory($_POST['category']);
        $updatePost->setAuthor($_POST['author']);
        $updatePost->setStatus($_POST['status']);
        if (!empty($_FILES['image']['name'])) {
            $updatePost->setImage_name($_FILES['image']['name']);
            $updatePost->setImage_content($_FILES['image']['tmp_name']);
        }
        $updatePost->setTags($_POST['tags']);
        $updatePost->setContent($_POST['content']);
        $updatePost->updatePost($_POST['post_id']);
        header("location: posts.php");
    } else {
        $post = new Post();
        $currentPost = $post->fetchById($_REQUEST['post_id']);

        $post_id = $currentPost['post_id'];
        $post_title = $currentPost['post_title'];
        $post_author = $currentPost['post_author'];
        $post_image = $currentPost['post_image'];
        $post_category_id = $currentPost['post_category_id'];

        $post_content = $currentPost['post_content'];
        $post_tags = $currentPost['post_tags'];
        $post_status = $currentPost['post_status'];
        include_once '../includes/Category.php';
        $category = new Category();
        $categoryList = $category->fetchAll();
    }
} else {
    header("location: posts.php");
}
?>

<form method="POST" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Title</label>
        <input value="<?php echo $post_title; ?>" class="form-control" name="title" id="post_title" type="text">
    </div>
    <div class="form-group">
        <label for="post_category">Category</label><br>
        <select name="category">
            <?php
            if (!empty($categoryList)) {
                foreach ($categoryList as $row) {
                    if ($row['category_id'] == $post_category_id) {
                        echo "<option value='{$row['category_id']}' selected>{$row['category_title']}</option>";
                    } else {
                        echo "<option value='{$row['category_id']}'>{$row['category_title']}</option>";
                    }
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Author</label>
        <input value="<?php echo $post_author; ?>" class="form-control" name="author" id="post_author" type="text">
    </div>
    <div class="form-group">
        <label for="post_status">Status</label><br>
        <select name="post_status" id="post_status">
            <option value='draft'>draft</option>
            <option value='published'>Published</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Images</label>
        <input class="form-control" name="image" id="post_image" type="file">
    </div>
    <img width="100" class="thumbnail" src="<?php echo DIR . $post_image; ?>">
    <div class="form-group">
        <label for="post_tags">Tags</label>
        <input value="<?php echo $post_tags; ?>" class="form-control" name="tags" id="post_tags" type="text">
    </div>
    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea class="form-control" name="content" id="post_content" rows="10" cols="30"><?php echo $post_content; ?></textarea>
    </div>
    <input type="hidden" value="<?php echo $post_id; ?>" name="post_id">
    <div class="form-group">
        <input class="btn btn-primary" name="edit_post" value="publish" id="" type="submit">
    </div>


</form>

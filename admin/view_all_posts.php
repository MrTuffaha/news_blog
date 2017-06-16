<?php
if (isset($_REQUEST['source']) && $_REQUEST['source'] == "delete_post") {
    if (!empty(($_REQUEST['post_id']))) {
        $post = new Post();
        $post->deletePost($_REQUEST['post_id']);
        header("location: posts.php");
    } else {
        header("location: posts.php");
    }
}
?>




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
            <th colspan="2">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $posts = new Post();
        $postsList = $posts->fetchAll();
        if (!empty($postsList)) {
            foreach ($postsList as $row) {
                echo "<tr>";
                echo "<td>{$row['post_id']}</td>";
                echo "<td>{$posts->decodeIllegalChar($row['post_author'])}</td>";
                echo "<td>{$posts->decodeIllegalChar($row['post_title'])}</td>";
                echo "<td>{$posts->decodeIllegalChar($row['category_title'])}</td>";
                echo "<td>{$posts->decodeIllegalChar($row['post_status'])}</td>";
                echo "<td>";
                if (!empty($row['post_image'])) {
                    echo "<img width='100' src='../{$row['post_image']}' alt='post image'>";
                }
                echo "</td>";
                echo "<td>{$posts->decodeIllegalChar($row['post_tags'])}</td>";
                echo "<td>{$row['post_comment_count']}</td>";
                echo "<td>{$row['post_date']}</td>";
                echo "<td><a href='posts.php?source=edit_post&post_id={$row['post_id']}'>edit</a></td>";
                echo "<td><a href='posts.php?source=delete_post&post_id={$row['post_id']}'>Delete</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

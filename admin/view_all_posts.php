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
        if (!empty($postsList)) {
            foreach ($postsList as $row) {
                echo "<tr>";
                echo "<td>{$row['post_id']}</td>";
                echo "<td>{$row['post_author']}</td>";
                echo "<td>{$row['post_title']}</td>";
                echo "<td>{$row['post_category_id']}</td>";
                echo "<td>{$row['post_status']}</td>";
                echo "<td>";
                if (!empty($row['post_image'])) {
                    echo "<img width='100' src='../{$row['post_image']}' alt='post image'>";
                }
                echo "</td>";
                echo "<td>{$row['post_tags']}</td>";
                echo "<td>{$row['post_comment_count']}</td>";
                echo "<td>{$row['post_date']}</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

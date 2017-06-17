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
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Post</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Deny</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $comment = new Comment();
        $commentList = $comment->fetchAll();
        if (!empty($commentList)) {
            foreach ($commentList as $row) {
                $commentID = $row['comment_id'];
                $postID = $row['post_id'];
                $commentAuthor = $comment->decodeIllegalChar($row['comment_author']);
                $commentEmail = $comment->decodeIllegalChar($row['comment_email']);
                $commentContent = $comment->decodeIllegalChar($row['comment_content']);
                $commentStatus = $comment->decodeIllegalChar($row['comment_status']);
                $commentDate = $comment->decodeIllegalChar($row['comment_date']);
                $commentPost = $comment->decodeIllegalChar($row['post_title']);
                
                
                
                echo "<tr>";
                echo "<td>{$commentID}</td>";
                echo "<td>{$commentAuthor}</td>";
                echo "<td>{$commentContent}</td>";
                echo "<td>{$commentEmail}</td>";
                echo "<td>{$commentStatus}</td>";
                echo "<td><a href='../post.php?post_id={$postID}'>{$commentPost}</a></td>";
                echo "<td>{$commentDate}</td>";
                echo "<td><a href=''>Approve</a></td>";
                echo "<td><a href=''>Deny</a></td>";
                echo "<td><a href=''>Delete</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

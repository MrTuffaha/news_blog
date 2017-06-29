<?php
if (isset($_REQUEST['delete_comment'])) {
    if (!empty(($_REQUEST['delete_comment']))) {
        $comment = new Comment();
        $comment->deleteComment($_REQUEST['delete_comment']);
        header("location: comments.php");
    } else {
        header("location: comments.php");
    }
} else if (isset($_REQUEST['approve_comment'])) {
    if (!empty(($_REQUEST['approve_comment']))) {
        $comment = new Comment();
        $comment->approveOrDenyComment($_REQUEST['approve_comment'],'approved');
        header("location: comments.php");
    } else {
        header("location: comments.php");
    }
} else if (isset($_REQUEST['deny_comment'])) {
    if (!empty(($_REQUEST['deny_comment']))) {
        $comment = new Comment();
        $comment->approveOrDenyComment($_REQUEST['deny_comment'],'denied');
        header("location: comments.php");
    } else {
        header("location: comments.php");
    }
}
?>




<table id="myTable" class="table table-striped table-bordered">
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
        $commentAuthor = $row['comment_author'];
        $commentEmail = $row['comment_email'];
        $commentContent = $row['comment_content'];
        $commentStatus = $row['comment_status'];
        $commentDate = $row['comment_date'];
        $commentPost = $row['post_title'];



        echo "<tr>";
        echo "<td>{$commentID}</td>";
        echo "<td>{$commentAuthor}</td>";
        echo "<td>{$commentContent}</td>";
        echo "<td>{$commentEmail}</td>";
        echo "<td>{$commentStatus}</td>";
        echo "<td><a href='../post.php?post_id={$postID}'>{$commentPost}</a></td>";
        echo "<td>{$commentDate}</td>";
        echo "<td><a href='comments.php?approve_comment={$commentID}'>Approve</a></td>";
        echo "<td><a href='comments.php?deny_comment={$commentID}'>Deny</a></td>";
        echo "<td><a href='comments.php?delete_comment={$commentID}'>Delete</a></td>";
        echo "</tr>";
    }
}
?>
    </tbody>
</table>

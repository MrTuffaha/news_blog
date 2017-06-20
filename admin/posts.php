<?php
include_once 'includes/header.php';
include_once '../includes/Post.php';
?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include_once 'includes/navigation.php'; ?>


    <?php include_once 'includes/content_head.php'; ?>
    <?php
    if (isset($_GET['source'])) {
        if ($_GET['source'] == "add_post") {
            include_once 'add_post.php';
        } else if ($_GET['source'] == "edit_post") {
            include_once 'edit_post.php';
        } else {
            include_once 'view_all_posts.php';
        }
    } else {
        include_once 'view_all_posts.php';
    }
    ?>


    
    <?php include_once 'includes/footer.php'; ?>

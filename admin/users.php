<?php
include_once 'includes/header.php';
include_once '../includes/User.php';
?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include_once 'includes/navigation.php'; ?>

    <?php include_once 'includes/content_head.php'; ?>
    <?php
    if (isset($_GET['source'])) {
        if ($_GET['source'] == "add_user") {
            include_once 'add_user.php';
        } else if ($_GET['source'] == "edit_user") {
            include_once 'edit_user.php';
        } else {
            include_once 'view_all_users.php';
        }
    } else {
        include_once 'view_all_users.php';
    }
    ?>


    
    <?php include_once 'includes/footer.php'; ?>

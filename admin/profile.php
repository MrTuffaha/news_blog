<?php
include_once 'includes/header.php';
include_once '../includes/User.php';
?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include_once 'includes/navigation.php'; ?>

    <?php include_once 'includes/content_head.php'; ?>

    <?php
    if (!empty(($_SESSION['user_id']))) {
        if (isset($_POST['update_profile'])) {
            $updateUser = new User();
            $updateUser->setUsername($_POST['user_name']);
            $updateUser->setPassword($_POST['user_password']);
            $updateUser->setFirstname($_POST['user_firstname']);
            $updateUser->setLastname($_POST['user_lastname']);
            $updateUser->setEmail($_POST['user_email']);
            $updateUser->setRole($_POST['user_role']);
            if (!empty($_FILES['user_image']['name'])) {
                $updateUser->setImageName($_FILES['user_image']['name']);
                $updateUser->setImageContent($_FILES['user_image']['tmp_name']);
            }
            header("location: posts.php");
        } else {
            $user = new User();
            $currentUser = $user->fetchById($_SESSION['user_id']);
            $user_id = $currentUser['user_id'];
            $user_name = $currentUser['user_name'];
            $user_password = $currentUser['user_password'];
            $user_firstname = $currentUser['user_firstname'];
            $user_lastname = $currentUser['user_lastname'];
            $user_email = $currentUser['user_email'];
            $user_image = $currentUser['user_image'];
            $user_role = $currentUser['user_role'];
        }
    } else {
        header("location: index.php");
    }
    ?>

    <form method="POST" action="" enctype="multipart/form-data">

        <div class="form-group">
            <label for="user_name">Username</label>
            <input value="<?php echo $user_name;?>" class="form-control" name="user_name" id="user_name" type="text">
        </div>

        <div class="form-group">
            <label for="user_password">Password</label>
            <input value="" class="form-control" name="user_password" id="user_password" type="text">
        </div>
        <div class="form-group">
            <label for="user_email">Email:</label>
            <input value="<?php echo $user_email;?>" class="form-control" name="user_email" id="user_email" type="text">
        </div>
        <div class="form-group">
            <label for="user_firstname">First Name:</label>
            <input value="<?php echo $user_firstname;?>" class="form-control" name="user_firstname" id="user_firstname" type="text">
        </div>
        <div class="form-group">
            <label for="user_lastname">Last Name:</label>
            <input value="<?php echo $user_lastname;?>" class="form-control" name="user_lastname" id="user_lastname" type="text">
        </div>
        <div class="form-group">
            <label for="user_role">Role</label><br>
            <select name="user_role" id="user_role">
                <option value='admin'>admin</option>
                <option value='user'>user</option>
            </select>
        </div>
        <img src="<?php echo DIR.$user_image;?>" width="100">
        <div class="form-group">
            <label for="user_image">Image:</label>
            <input class="form-control" name="user_image" id="user_image" type="file">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" name="update_profile" value="publish" id="" type="submit">
        </div>


    </form>



    <?php include_once 'includes/footer.php'; ?>

<?php
if (isset($_REQUEST['add_user'])) {
    $newUser = new User();
    $newUser->setUsername($_POST['user_name']);
    $newUser->setPassword($_POST['user_password']);
    $newUser->setFirstname($_POST['user_firstname']);
    $newUser->setLastname($_POST['user_lastname']);
    $newUser->setEmail($_POST['user_email']);
    $newUser->setRole($_POST['user_role']);
    if (!empty($_FILES['user_image']['name'])) {
        $newUser->setImageName($_FILES['user_image']['name']);
        $newUser->setImageContent($_FILES['user_image']['tmp_name']);
    }
    $newUser->createUser();
    header("location: users.php");
}
?>
<form method="POST" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_name">Username</label>
        <input class="form-control" name="user_name" id="user_name" type="text">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input class="form-control" name="user_password" id="user_password" type="text">
    </div>
    <div class="form-group">
        <label for="user_email">Email:</label>
        <input class="form-control" name="user_email" id="user_email" type="text">
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name:</label>
        <input class="form-control" name="user_firstname" id="user_firstname" type="text">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name:</label>
        <input class="form-control" name="user_lastname" id="user_lastname" type="text">
    </div>
    <div class="form-group">
        <label for="user_role">Role</label><br>
        <select name="user_role" id="user_role">
            <option value='admin'>admin</option>
            <option value='user'>user</option>
        </select>
    </div>
    <div class="form-group">
        <label for="user_image">Image:</label>
        <input class="form-control" name="user_image" id="user_image" type="file">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" name="add_user" value="publish" id="" type="submit">
    </div>


</form>

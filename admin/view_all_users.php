<?php
if (isset($_REQUEST['delete_user'])) {
    if (!empty(($_REQUEST['delete_user']))) {
        $user = new User();
        $user->deleteUser($_REQUEST['delete_user']);
        header("location: users.php");
    } else {
        header("location: users.php");
    }
} else if (isset($_REQUEST['change_to'])) {
    if (!empty(($_REQUEST['change_to']))&&!empty(($_REQUEST['user_id']))) {
        $user = new User();
        $user->changeRole($_REQUEST['user_id'], $_REQUEST['change_to']);
        header("location: users.php");
    } else {
        header("location: users.php");
    }
}
?>




<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
<?php
$user = new User();
$userList = $user->fetchAll();
if (!empty($userList)) {
    foreach ($userList as $row) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];



        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";
        echo "<td></td>";
        echo "<td><a href='users.php?change_to=admin&user_id={$user_id}'>Change to admin</a></td>";
        echo "<td><a href='users.php?change_to=subscriber&user_id={$user_id}'>Change to subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_user&user_id={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?delete_user={$user_id}'>Delete</a></td>";
        echo "</tr>";
    }
}
?>
    </tbody>
</table>

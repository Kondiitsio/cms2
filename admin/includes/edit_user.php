<a href="users.php">Back to Users</a>
<?php

if(isset($_GET['edit_user'])){

    $the_user_id = escape($_GET['edit_user']);

    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $select_users_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_role = $row['user_role'];

    }

?>


<?php

if(isset($_POST['edit_user'])) {
    $user_role      = escape($_POST['user_role']);
    $username       = escape($_POST['username']);
    $user_password  = escape($_POST['user_password']);

if(!empty($user_password)) {
    $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
    $get_user_query = mysqli_query($connection, $query_password);
    confirmQuery($get_user_query);

    $row = mysqli_fetch_array($get_user_query);

    $db_user_password = $row['user_password'];

if($db_user_password != $user_password) {
    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
}

    $query = "UPDATE users SET ";
    $query .="user_role   =  '{$user_role}', ";
    $query .="username = '{$username}', ";
    $query .="user_password = '{$hashed_password}' ";
    $query .="WHERE user_id = {$the_user_id} ";

    $edit_user_query = mysqli_query($connection,$query);

    confirmQuery($edit_user_query);
    redirect("users.php");
}
}
} else {
    header("Location: index.php");
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="user_role">Role</label><br>
        <select name="user_role" id="">
            <option value="<?php echo $user_role; ?>">admin</option>
        </select><br>
    <label for="username">Username</label><br>
        <input type="text" name="username" value="<?php echo $username; ?>"><br>
    <label for="user_password">Password</label><br>
        <input type="password" name="user_password" autocomplete="off"><br>
    <button type="submit" name="edit_user" value="Edit User">Edit user</button>
</form>
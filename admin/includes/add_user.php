<a href="users.php">Back to Users</a>
<?php

if(isset($_POST['create_user'])) {

    $user_role        = escape($_POST['user_role']);
    $username         = escape($_POST['username']);
    $user_password    = escape($_POST['user_password']);
  
    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

    $query = "INSERT INTO users(user_role, username, user_password) ";
    
    $query .= "VALUES('{$user_role}','{$username}','{$user_password}') ";

    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);

    redirect("users.php");

}

?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="user_role">Role</label><br>
        <input type="text" name="user_role"><br>
    <label for="username">Username</label><br>
        <input type="text" name="username"><br>
    <label for="user_password">Password</label><br>
        <input type="password" name="user_password"><br>
    <button type="submit" name="create_user" value="Add User">Add user</button>
</form>
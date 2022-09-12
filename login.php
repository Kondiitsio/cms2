<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>

<?php

	checkIfUserIsLoggedInAndRedirect('/cms2/admin');

	if(ifItIsMethod('post')){
		if(isset($_POST['username']) && isset($_POST['password'])){
			login_user($_POST['username'], $_POST['password']);
		} else {
			redirect('/cms2/login.php');
		}

	}
?>

<form form id="login-form" role="form" autocomplete="off" class="form" method="post">
    <p>Log in</p>
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input name="login" value="Login" type="submit">
    <a href="index.php">Back to home page</a>
</form>






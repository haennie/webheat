<?php
session_start();

if($user = $_POST['user_name']) {

	$pw = md5($_POST['user_password']);
	$GLOBALS['db']->login($user, $pw);

}

if($_SESSION['name']) {
	header("location: index.php");
}	
?>

<p class="huge"><?php echo $lbl_string['LBL_WELCOME']; ?></p>

<form class="large" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

	<?php echo $lbl_string['LBL_LOGIN_USER']; ?></br>
	<input class="large" type="text" name="user_name" required></br>
	<?php echo $lbl_string['LBL_LOGIN_PASSWORD']; ?></br>
	<input class="large" type="password" name="user_password" required></br>
	<input class="large" type="submit">
</form>

<?php 
include '../inc/init.php';
if (isset($_SESSION['nasrul']) && $_SESSION['nasrul'] === true) {
	header('location:i.php');exit;
}
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']==='POST') {
	$username = strip_tags(htmlspecialchars($_POST['username']));
	$password = strip_tags(htmlspecialchars($_POST['password']));

	if ($exec = connect()->query("SELECT * FROM super_admin WHERE username='$username' AND password='$password'")) {
		if ($exec->rowCount() > 0) {
			$_SESSION['nasrul'] = true;
			header('location:i.php');
		} else {
			echo "login gagal!";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<style type="text/css">
		form{
			width: 300px;
			margin: 30px auto;
		}
		input{
			margin: 10px 0px;
		}
		input,button{
			padding: 10px;
			border-radius: 10px;
			border: 1px solid orange;
		}
		button{
			cursor: pointer;
			background: orange;
			color: white;
		}
	</style>
</head>
<body>
	<form method="post" action=""> 
		<input required type="text" placeholder="Masukan kode keamanan!" name="username">
		<input required type="password" placeholder="Kata sandi!" name="password"> <button name="submit">SUBMIT</button>
	</form>
</body>
</html>
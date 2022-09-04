<?php 
include '../inc/init.php';
if (!isset($_SESSION['nasrul']) && $_SESSION['nasrul'] !== true) {
	header('location:login.php');exit;
}
if (isset($_GET['delete'])) {
	$id = $_GET['id'] ?? null;
	if(!empty($id)) {
		if (connect()->exec("DELETE FROM admin WHERE id='$id'")) {
			header("location:".$_SERVER['PHP_SELF'].'?er=0');
			exit;
		}
	}
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	$username = strip_tags($_POST['username']);
	$payload = [
		':username' => str_replace(' ', '_', $username.'_'.substr(mt_rand(), 0,6)),
		':password' => substr(mt_rand(), 0,6),
	];
	$sql = connect()->prepare("INSERT INTO admin (username,password) VALUES (:username,:password) ");
	if ($sql->execute($payload)) {
		header("location:".$_SERVER['PHP_SELF'].'?er=1');
		exit;
	} else {
		header("location:".$_SERVER['PHP_SELF'].'?er=2');
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hello</title>
</head>
<body>
	<form method="post" action="">
		<fieldset>
		<legend>Tambah data user</legend>
		<table>
			<tr>
				<th>USERNAME: <input type="text" name="username"></th>
			</tr>
			<tr>
				<th><button type="submit" name="submit" style="width: 100%">SUBMIT</button></th>
			</tr>	
		</table>
	</fieldset>
	</form>
	<fieldset>
		<legend>UserList</legend>
		<table border="1" style="width: 100%;border-collapse: collapse;border:1px solid #dedede;text-align: center;">
			<tr style="background: red">
				<th>Username</th>
				<th>Password</th>
				<th>act</th>
			</tr>
			<?php 

			foreach (connect()->query("SELECT * FROM admin") as $value) {
				?>
			<tr>
				<td><?= $value['username'] ?></td>
				<td><?= $value['password'] ?></td>
				<td>
					<a onclick="return confirm('Yakin?')" href="<?php echo $_SERVER['PHP_SELF'] ?>?delete&id=<?= $value['id']; ?>">Delete</a>
				</td>
			</tr>
				<?php
			}


			 ?>
			 <!-- <tr>
			 	<td style="text-align: left;" colspan="2"><a href="">1</a></td>
			 </tr> -->
		</table>
	</fieldset>
</body>
</html>
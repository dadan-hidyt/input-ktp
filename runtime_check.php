<?php 
include 'inc/init.php';

$nik = strip_tags($_GET['nik'] ?? null);
if (!empty($nik)) {
	$db = connect()->query("SELECT * FROM ktp WHERE nik='$nik' LIMIT 1");
	if ($db->rowCount() > 0) {
		echo 'true';
	} else {
		echo 'false';
	}
}

 ?>
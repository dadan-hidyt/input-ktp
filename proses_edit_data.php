<?php 
include 'inc/init.php';

try {
	if (edit_data($_POST)) {
		header('location:admin_dashboard.php?halaman=data');
	}
} catch (Exception $e) {
	die($e->getMessage());
}

 ?>
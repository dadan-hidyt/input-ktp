<?php
include 'inc/init.php';
header('Content-Type:application/json');
if (isset($_GET['filter_desa'])) {
	echo json_encode(get_data_by_desa($_GET['desa']??null));
} else if (isset($_GET['filter_kecamatan'])){
	echo json_encode(get_data_by_kecamatan($_GET['kecamatan']));
} else {
	echo json_encode(get_data_ktp());
}
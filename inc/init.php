<?php ob_start();
session_name('sesions');
session_start();
include __DIR__.'/koneksi.php';
include __DIR__.'/ktp.php';
include __DIR__.'/user.php';
/** connect */
function connect() {
	global $PDO;
	return $PDO;
}
/** template header */
function template_header($data = array()) {
	extract($data);
	$header_file = dirname(__DIR__).'/partial/header.php';
	if (file_exists($header_file)) {
		include_once $header_file;
	} else {
		die("File header not found!");
	}
}

/** footer template */
function template_footer() {
	$footer_file = dirname(__DIR__).'/partial/footer.php';
	if(file_exists($footer_file)) {
		include_once $footer_file;
	} else {
		die("File footer not found!");
	}
}

function tanggal_indonesia($tanggal) {
	$bulan_id = [
		1=>'Januari',
		"Februari",
		"Maret",
		"April",
		"Mei",
		"Juni",
		"Juli",
		"Agustus",
		"September",
		"Oktober",
		"November",
		"Desember",
	];
	$repeat = [
	   'Januari' => 1,
		"Februari" => 2,
		"Maret" => 3,
		"April" => 4,
		"Mei" => 5,
		"Juni"=>6,
		"Juli"=>7,
		"Agustus"=>8,
		"September"=>9,
		"Oktober"=>10,
		"November"=>11,
		"Desember"=> 12,
	];
		$repeat = array_change_key_case($repeat, CASE_UPPER);

	foreach($repeat as $d => $v) {
	    $tanggal = str_replace($d,$v,$tanggal);
	}
	$tanggal = date('Y-m-d', strtotime($tanggal));
	$bulan_petcah = explode('-', $tanggal);
	if (!in_array($bulan_petcah[1], $bulan_id)) {
		return (string) sprintf('%s-%s-%s', $bulan_petcah[2],$bulan_id[(int)$bulan_petcah[1]], $bulan_petcah[0]);
	} else {
		return $tanggal;
	}
}
?>
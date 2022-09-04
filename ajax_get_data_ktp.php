<?php
include 'inc/init.php';
if (isset($_GET['filter_desa'])) {
	header('Content-Type:application/json');
	echo json_encode(get_data_by_desa($_GET['desa']??null));
} else if (isset($_GET['filter_kecamatan'])){
	header('Content-Type:application/json');
	echo json_encode(get_data_by_kecamatan($_GET['kecamatan']));
} elseif (isset($_GET['filter_desa_by_kecamatan'])) {
	$kecamatan = $_GET['kecamatan'] ?? null;
	   $data = [];
      foreach(connect()->query("SELECT * FROM ktp WHERE kecamatan='$kecamatan'") as $value) {
           $data[$value['kelurahan_desa']]  = $value['kelurahan_desa'];
      }
      if (!empty($data)) {
		  echo '<option value="">--pilih desa --</option>';
      		foreach($data as $value) {
      			?>
      			<option value="<?= $value; ?>"><?= $value; ?></option>
      			<?php
      		}
      } else {
      	echo '<option value="">--pilih kecamatan dulu--</option>';
      }
} else {
	header('Content-Type:application/json');
	echo json_encode(get_data_ktp());
}
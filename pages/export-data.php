<br>
<br>
<style>
	button{
		background: yellow;
		color: #ce4141;
		font-weight: bold;
		padding: 10px;
		cursor: pointer;
		border-radius: 10px;
		border:none;
	}
	select{
		border-radius: 4px;
		border:1px solid #dedede;
	}
</style>
<div style="padding:16px 32px" class="w3-row-padding w3-stretch">
    <div class="w3-col">
        <div style="padding: 10px; box-sizing: border-box;" class="w3-white w3-round w3-margin-bottom w3-border" style="">
 			<h4>EXPORT DATA</h4>
 			<hr>
	 		
 			<div class="btn">
 				<fieldset>
 					<legend>EXPORT BERDASARKAN KECAMATAN</legend>
 					<form action="export_excel.php">
 						<input type="hidden" name="by" value="kecamatan">
 					<select name="kec" id="">
 						 <option value="">--pilih kecamatan--</option>
                       <?php 
                       $data_group = [];
                       foreach(connect()->query("SELECT * FROM ktp") as $value) {
                            $data_group[$value['kecamatan']]  = $value['kecamatan'];
                       }
                       foreach($data_group as $value) {
                             ?>
                           <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                        <?php
                       }
                

                        ?>
 					</select>
 					<button>EXPORT</button>
 				</form>
 				</fieldset>
 				<fieldset>
 					<legend>EXPORT BERDASARKAN DESA</legend>
 					<form action="export_excel.php">
						<input type="hidden" name="by" value="desa">
 						<select name="desa" id="">
 						 <option value="">--pilih desa--</option>
                       <?php 
                       $data_group = [];
                       foreach(connect()->query("SELECT * FROM ktp") as $value) {
                            $data_group[$value['kelurahan_desa']]  = $value['kelurahan_desa'];
                       }
                       foreach($data_group as $value) {
                             ?>
                           <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                        <?php
                       }
                

                        ?>
 					</select>
 					<button>EXPORT</button>
 				</form>
 				</fieldset>
 				<fieldset>
 					<legend>EXPORT SEMUA DATA</legend>
 					<form action="export_excel.php">
 						<button type="submit">EXPORT</button>
 					</form>
 				</fieldset>
 			</div>
        </div>
    </div>
</div>
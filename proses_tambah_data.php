<?php include 'inc/init.php'; ?>
<style type="text/css">
  *{
    padding: 0;
    margin: 0;
  }
  .messages{
   font-family: sans-serif;
    text-align: center;
    padding: 5px 20px;
    box-sizing: border-box;
    background: white;
    border: 1px solid;
    border-radius: 2px;
  }
  .messages h1{
    margin-bottom: 10px;
  }
  .messages button{
    cursor: pointer;
    border-radius: 10px;
    border: none;
    padding: 10px;
    color: white;
    background: orange;
    box-sizing: border-box;
    margin-bottom: 4px;
  }
</style>
<?php
if(!isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}
try {
    if(tambah_data_ktp()) {
      $_SESSION['error_tb_data'] = '<p class="alert success">data berhasil di tambahkan!</p>';
      header('location:admin_dashboard.php?halaman=input-data&tambah_data=true');
    } 
} catch (Exception $th) {
      $_SESSION['error_tb_data'] =  $_SESSION['error_tb_data'] = '<p class="alert">'.$th->getMessage().'</p>';
      $_SESSION['data_before'] = $_POST;
      header('location:admin_dashboard.php?halaman=input-data&tambah_data=false');

}
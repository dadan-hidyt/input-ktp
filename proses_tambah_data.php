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
       ?>
      <div class="messages">
        <h1>DATA BERHASIL DI MASUKAN KE DATABASE!</h1>
         <button onclick="window.location.href = 'admin_dashboard.php?halaman=input-data';">KEMBALI</button>
      </div>
       <?php
    } 
} catch (Exception $th) {
    ?>
    <div class="messages">
      <h1><?= $th->getMessage() ?></h1>
      <button onclick="window.history.back();">PERIKSA ULANG</button>
    </div>
    <?php
}
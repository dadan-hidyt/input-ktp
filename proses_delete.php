<?php 
include 'inc/init.php';
if(!isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}
//proccess delete data
try {
    if(delete_data_ktp($_GET['id'] ?? false)) {
       ?>
       <script type="text/javascript">
         alert("Data berhasil di hapus");
         window.history.back();
       </script>
       <?php
    } 
} catch (Exception $th) {
    ?>
    <h4><?= $th->getMessage() ?></h4>
    <button onclick="window.history.back();">back</button>
    <?php
}
 ?>
<br>
<br>
<?php 
$kecamatan = [];

foreach (connect()->query("SELECT * FROM ktp") as  $value) {
  $kecamatan[$value['kecamatan']] = $value['kecamatan'];
}

$count_data = [];

foreach($kecamatan as $kec) {
  $e=  connect()->query("SELECT COUNT(kecamatan) as kecm FROM ktp WHERE kecamatan='$kec'")->fetch(PDO::FETCH_ASSOC)['kecm'];
  $count_data[] = $e;
}

 ?>
<br>
<div style="padding:16px 32px">
<div class="w3-white w3-round w3-margin-bottom w3-border" style="">
   <div class="w3-row">
     <div class="w3-col l3 w3-container w3-border-right">
       <div class="w3-padding">
         <h5><?php echo count(get_data_ktp()['data']); ?> <span class="w3-right"><i class="fa fa-fw fa-address-card"></i></span></h5>
         <p>SEMUA DATA <span class="w3-right"></span></p>
       </div>
     </div>
     <div class="w3-col l3 w3-container w3-border-right">
       <div class="w3-padding">
        <?php $_GET['filter'] = 'me'; ?>
         <h5><?php echo count(get_data_ktp()['data']); ?> <span class="w3-right"><i class="fa fa-fw fa-address-card"></i></span></h5>
         <p>INPUTAN SAYA<span class="w3-right"></span></p>
       </div>
     </div>
   </div>
 </div>
  <div class="w3-col">
   <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
     <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Statistik Data Per kecamatan</header>
     <div class="w3-padding-large" style="height: 188px;position:relative">
       <canvas id="chart2"></canvas>
     </div>
     <?php $data = array_combine($kecamatan, $count_data) ?>
     <table class="w3-table w3-bordered w3-border-top">
        <?php foreach ($data as $key => $value): ?>
          <tr>
         <td><?php echo $key; ?></td>
         <td><?php echo $value; ?></td>
       </tr>
        <?php endforeach ?>
     </table>
   </div>
 </div>
</div>
<script src="assets/plugins/chartjs/Chart.min.js"></script>

<script>
  
setTimeout(function () {
  // chart 2
  var ctx2 = document.getElementById("chart2").getContext('2d');
  var myChart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels: [
        <?php foreach ($kecamatan as  $value) {
           echo "'".$value."',";
        } ?>
      ],
      datasets: [{
        backgroundColor: [
          "#14abef",
          "#02ba5a",
          "#d13adf",
          "#fba540",
          "#14dcef",
          "#02dd5a",
          "#0cdadf",
          "#dedede"
        ],
        data: [
           <?php foreach ($count_data as  $value) {
           echo "'".$value."',";
        } ?>
        ],
        borderWidth: [0, 0, 0, 0]
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        position :"bottom",
        display: false,
        labels: {
          fontColor: '#ddd',
          boxWidth:15
        }
      }
      ,
      tooltips: {
        displayColors:false
      }
    }
  });

}, 1000)

</script>
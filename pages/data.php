 <br><br>
 <br>
   <div style="padding:16px 32px">
        <h3>DATA KTP</h3>
        
        <div class="w3-row-padding w3-stretch">
          <div class="w3-col">
            <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
              <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">
                <style type="text/css">
                    select{
                        border-radius: 2px;
                        border:1px solid grey;
                        font-size: small;
                    }
                </style>
                <small>Filter </small>
                <small>Oleh: </small>
                     <select style="padding: 3px;" id="filter">
                        <option value="semua">Semuanya</option>
                        <option value="me">Yang saya inputkan</option>
                    </select>
              
                     <small>Kecamatan:</small>
                     <select style="padding: 3px;" id="filter_kecamatan">
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

                      <small>Desa:</small>
                     <select style="padding: 3px;" id="filter_desa">
                        <option value="">--pilih desa--</option>
                    </select>
              </header>
            <style type="text/css">
                table{
                    font-size: small;
                    border-collapse: collapse;
                }
                tr th{
                    border: 1px solid #dedede;
                }
               tr td{
                    border: 1px solid #dedede;
                }
                thead{
                    background: yellow;
                }
            </style>
              <div class="w3-padding-large responsive">
                 <table style="width: 200% !important; border: 1px solid #dedede;" id='data-table'>
                   <thead>
                   <tr style="border: 1px solid">
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>NIK</th> 
                        <th>JK</th>
                        <th>Tempat Tanggal Lahir</th> 
                        <th>Alamat</th> 
                        <th>Agama</th> 
                        <th>Status Perkawinan</th> 
                        <th>Pekerjaan</th> 
                        <th>Kewarganegaraan</th> 
                        <th>Tanggal Input</th>
                        <th>Aksi</th>
                    </tr>
                   </thead>
                    <tbody>
                    
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>   
      </div>
    <script>

        const table = $('#data-table').DataTable({
            ajax:'ajax_get_data_ktp.php',
        }); 
        document.querySelector('#filter').onchange = function(e) {
            table.ajax.url('ajax_get_data_ktp.php?filter='+e.target.value).load();  
        }
        
         document.querySelector('#filter_kecamatan').onchange = function(e) {
           const res = $.get('ajax_get_data_ktp.php?filter_desa_by_kecamatan&kecamatan='+e.target.value);
           res.then(function(e){
              $('#filter_desa').html(e);
           })
            table.ajax.url('ajax_get_data_ktp.php?filter_kecamatan&kecamatan='+e.target.value).load();  
          
        }
        document.querySelector('#filter_desa').onchange = function(e) {
            table.ajax.url('ajax_get_data_ktp.php?filter_desa&desa='+e.target.value).load();  
        }
    </script>
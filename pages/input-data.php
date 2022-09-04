<h3>INPUT DATA</h3>
<div style="padding:16px 32px" class="w3-row-padding w3-stretch">
    <div class="w3-col">
        <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
              <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">INPUT DATA KTP</header>
              <div class="w3-padding-large">
               <form action="proses_tambah_data.php" method='post' class="tambah-data">
                <div class="form-bx">
                    <div class="w3-margin-bottom">
                        <label for="NIK">
                            NIK
                        </label>
                        <br>
                        <small id="meter"></small>
                        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="number" name="nik" id="nik" placeholder="NIK">
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="NAMA LENGKAP">
                            NAMA LENGKAP
                        </label>
                        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap">
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="TEMPAT TANGGAL LAHIR">
                            TEMPAT TANGGAL LAHIR
                        </label>
                        <div class="input class='w3-input w3-border w3-round'" required="true" autofocus='true'>
                            <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
                            <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="date" name="tanggal_lahir" id="tanggal_lahir" min="10-9-1945" max="10-9-2008">
                        </div>
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="JENIS KELAMIN">
                            JENIS KELAMIN
                        </label>
                        <select name='jenis_kelamin' class='w3-input w3-border w3-round'>
                            <option name='laki laki'>laki laki</option>
                            <option name='perempuan'>perempuan</option>
                        </select>
                        <!--<div class="flex" style="flex-direction: column;align-items: flex-start;">-->
                        <!--    <div class="flex">-->
                        <!--        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="radio" name="jenis_kelamin" value='LAKI-LAKI' id="jenis_kelamin_P">-->
                        <!--        &nbsp;<label id="jenis_kelamin_P">PRIA</label>-->
                        <!--    </div>-->
                        <!--    <br>-->
                        <!--    <div class="flex">-->
                        <!--        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="radio" name="jenis_kelamin" value='PEREMPUAN' id="jenis_kelamin">-->
                        <!--        &nbsp;<label>WANITA</label>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="ALAMAT">
                            DUSUN
                        </label>
                        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="text" name="Alamat" id="Alamat" placeholder="Ketikan alamat sesuai KTP">
                    </div>
                     <div class="w3-margin-bottom">
                        <label for="ALAMAT">
                            RT
                        </label>
                        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="text" name="RT" id="Alamat" placeholder="Ketikan RT (exp: 03)">
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="ALAMAT">
                            RW
                        </label>
                        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="text" name="rw" id="Alamat" placeholder="Ketikan RW (exp: 03)">
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="ALAMAT">
                                KECAMATAN
                        </label>
                        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="text" name="kecamatan" id="Alamat" placeholder="Ketikan kecamatan">
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="ALAMAT">
                            KELURAHAN/DESA
                        </label>
                        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="text" name="desa" id="Alamat" placeholder="Ketikan kelurahan atau desa">
                    </div>
                    
                    <div class="w3-margin-bottom">
                        <label for="AGAMA">
                            AGAMA
                        </label>
                        <select class='w3-input w3-round w3-border' name="agama">
                            <option value="islam">islam</option>
                            <option value="kristen">kristen</option>
                            <option value="hindu">hindu</option>
                            <option value="budha">budha</option>
                        </select>
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="STATUS PERKAWINAN">
                            STATUS PERKAWINAN
                        </label>
                        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="text" name="Status Perkawinan" id="Status Perkawinan" placeholder="Status Perkawinan">
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="PEKERJAAN">
                            PEKERJAAN
                        </label>
                        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="text" name="Pekerjaan" id="Pekerjaan" placeholder="Pekerjaan">
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="KEWARGANEGARAAN">
                            KEWARGANEGARAAN
                        </label>
                        <input class='w3-input w3-border w3-round' required="true" autofocus='true' type="text" name="Kewarganegaraan" id="Kewarganegaraan" placeholder="Kewarganegaraan">
                    </div>
                    <button  name='post_data' type="submit" class="w3-button w3-primary w3-round">Tambah</button>
                </div>
            </form>

              </div>
            </div>
    </div>
    </div>
<script type="text/javascript">
    $('#nik').on('keyup', function(e){
        $('#meter').html(e.target.value.length);
        if (e.target.value.length > 16) {
           $('#meter').html("NIK Tidak melebihi batas karakter!");
           //check runtime 

        }
         $.ajax({
                url : 'runtime_check.php?nik='+e.target.value,
                type : "GET",
                success : function (e) {
                    if (e == 'true') {
                        $('#meter').html("NIK sudah ada di database! Silahkan check lagi");
                    }
                }
           })
    })
</script>
    <?php 

    if (isset($_GET['reset']) &&$_GET['reset'] == 'true') {
        ?>
        <script type="text/javascript">document.querySelector('form').reset()</script>
        <?php
    }

     ?>
<?php
function tambah_data_ktp() {
    if (isset($_POST['post_data'])) {
        $data = array_change_key_case($_POST, CASE_LOWER);
        // $data = array_filter($data, function($value){
        //      return strtoupper($value);
        // });
        // extract($data);
        foreach ($data as $key => $value) {
            ${$key} = strtoupper($value);
        }
        if (strlen($nik) < 16) {
            throw new Exception("NIK harus berjumlah 16 Tidak boleh kurang!", 1);
            return;
            
        }
        if (strlen($nik) > 16) {
            throw new Exception("NIK jangan melebihi 16, silahkan cobalagi!", 1);
            return;
            
        }
        $username = $_SESSION['username'];
        $date_now = date("d-m-Y h:i:s");
        $sql = "INSERT INTO `ktp`(
         `nik`,
         `nama`,
         `tempat_lahir`,
         `tanggal_lahir`,
         `jenis_kelamin`,
         `alamat`,
         `rt`,
         `rw`,
         `kelurahan_desa`,
         `kecamatan`,
         `agama`,
         `status_perkawinan`,
         `pekerjaan`,
         `kewarganegaraan`,
         `berlaku_hingga`,
         `input_by`,
         `input_date`
     )
     VALUES(
         :nik,
         :nama,
         :tempat_lahir,
         :tanggal_lahir,
         :jenis_kelamin,
         :alamat,
         :rt,
         :rw,
         :kelurahan_desa,
         :kecamatan,
         :agama,
         :status_perkawinan,
         :pekerjaan,
         :kewarganegaraan,
         :berlaku_hingga,
         :input_by,
         :input_date
     ) ";
 
     try {
         $exec = connect()->prepare($sql);
         $exec->bindValue(':nik',$nik);
         $exec->bindValue(':nama',$nama_lengkap);
         $exec->bindValue(':tempat_lahir',$tempat_lahir);
         $exec->bindValue(':tanggal_lahir',$tanggal_lahir);
         $exec->bindValue(':jenis_kelamin',$jenis_kelamin);
         $exec->bindValue(':alamat',$alamat);
         $exec->bindValue(':rt',$rt);
         $exec->bindValue(':rw',$rw);
         $exec->bindValue(':kelurahan_desa', $desa);
         $exec->bindValue(':kecamatan', $kecamatan);
         $exec->bindValue(':agama', $agama);
         $exec->bindValue(':status_perkawinan', $status_perkawinan);
         $exec->bindValue(':pekerjaan', $pekerjaan);
         $exec->bindValue(':kewarganegaraan', $kewarganegaraan);
         $exec->bindValue(':berlaku_hingga',$nik);
         $exec->bindValue(':input_by',$username);
         $exec->bindValue(':input_date',$date_now);
         $check_from_database = connect()->query("SELECT * FROM ktp WHERE nik='$nik'");
         $check_from_database->execute();
         if($check_from_database->rowCount() <= 0) {
             $exec->execute();
             return true;
        } else {
             throw new Exception('NIK Sudah ada di database,,, Silahkan cek ulang!');
        }
     } catch(Exception $e) {
         throw new Exception($e->getMessage());
     }
     
     
     }
}
function get_data_by_desa($desa) {
    $i = 0;
     foreach (connect()->query("SELECT * FROM ktp WHERE kelurahan_desa='$desa' ORDER BY nama ASC") as  $value) {
        $i++;
        $data['data'][] = [
            $i,
            $value['nama'],
            (string)$value['nik'],
            $value['jenis_kelamin'],
            sprintf('%s,%s',$value['tempat_lahir'],strtoupper(tanggal_indonesia($value['tanggal_lahir']))),
            sprintf('%s,RT %s/RW %s DESA/KEL %s, KEC. %s',$value['alamat'],$value['rt'],$value['rw'],$value['kelurahan_desa'],$value['kecamatan']),
            $value['agama'],
            $value['status_perkawinan'],
            $value['pekerjaan'],
            $value['kewarganegaraan'],
            $value['input_date'],
            sprintf('<a onclick="return confirm(\'Apakah anda yakin!\');" href="%s?id=%s" class="w3-button w3-danger">
                                Hapus
                            </a>','proses_delete.php',$value['nik']).
            sprintf('<a href="%s&id=%s" class="w3-button w3-success">
                                Edit data
                            </a>','?halaman=edit-data',$value['nik'])
            ,
        ];
    }


    if (empty($data)) {
        return array('data'=>[]);
    } else {
        return $data;
    }

}

function get_data_by_kecamatan($kecamatan) {
    $i = 0;
     foreach (connect()->query("SELECT * FROM ktp WHERE kecamatan='$kecamatan' ORDER BY nama ASC") as  $value) {
        $i++;
        $data['data'][] = [
            $i,
            $value['nama'],
            (string)$value['nik'],
            $value['jenis_kelamin'],
            sprintf('%s,%s',$value['tempat_lahir'], strtoupper(tanggal_indonesia($value['tanggal_lahir']))),
            sprintf('%s,RT %s/RW %s DESA/KEL %s, KEC. %s',$value['alamat'],$value['rt'],$value['rw'],$value['kelurahan_desa'],$value['kecamatan']),
            $value['agama'],
            $value['status_perkawinan'],
            $value['pekerjaan'],
            $value['kewarganegaraan'],
            $value['input_date'],
            sprintf('<a onclick="return confirm(\'Apakah anda yakin!\');" href="%s?id=%s" class="w3-button w3-danger">
                                Hapus
                            </a>','proses_delete.php',$value['nik']).
            sprintf('<a href="%s&id=%s" class="w3-button w3-success">
                                Edit data
                            </a>','?halaman=edit-data',$value['nik'])
            ,
        ];
    }


    if (empty($data)) {
        return array('data'=>[]);
    } else {
        return $data;
    }

}
//get data ktp
function get_data_ktp() {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM ktp";
     if (isset($_GET['filter'])) {
        $filter = strip_tags($_GET['filter']);
        if ($filter == 'me')  {
            $sql .= " WHERE input_by='$username' ";
        }
     }
     $sql .= " ORDER BY nama ASC ";
    $ex = connect()->query($sql);
    $data = [];
    $i = 0;
    foreach ($ex as  $value) {
        $i++;
        $data['data'][] = [
            $i,
            $value['nama'],
            (string)$value['nik'],
            $value['jenis_kelamin'],
            sprintf('%s,%s',$value['tempat_lahir'],strtoupper(tanggal_indonesia($value['tanggal_lahir']))),
            sprintf('%s,RT %s/RW %s DESA/KEL %s, KEC. %s',$value['alamat'],$value['rt'],$value['rw'],$value['kelurahan_desa'],$value['kecamatan']),
            $value['agama'],
            $value['status_perkawinan'],
            $value['pekerjaan'],
            $value['kewarganegaraan'],
            $value['input_date'],
            sprintf('<a onclick="return confirm(\'Apakah anda yakin!\');" href="%s?id=%s" class="w3-button w3-danger">
                                Hapus
                            </a>','proses_delete.php',$value['nik']).
            sprintf('<a href="%s&id=%s" class="w3-button w3-success">
                                Edit data
                            </a>','?halaman=edit-data',$value['nik'])
            ,
        ];
    }
    if (empty($data)) {
        return array('data'=>[]);
    } else {
        return $data;
    }
}
//delete data ktp
function delete_data_ktp($id) {
    if (empty($id)) {
        throw new Exception("Error Processing Request", 1);
    }
    if (connect()->query("SELECT nik FROM ktp WHERE nik='$id' LIMIT 1")->rowCount() < 1) {
        throw new Exception("Data tida di temukan", 1);
    }
    return connect()->exec("DELETE FROM ktp WHERE nik='$id'");
}

function edit_data($data) {
    $data = array_change_key_case($data, CASE_LOWER);
    $original = $data['original_nik'];
    //get data by nik
    
    try {
        $dataOriginal = connect()->query("SELECT * FROM ktp WHERE nik='$original'")->fetch();
    extract($data);

    $exec = connect()->prepare("UPDATE
    `ktp`
SET
    `nik` = :nik,
    `nama` = :nama,
    `tempat_lahir` = :tempat_lahir,
    `tanggal_lahir` = :tanggal_lahir,
    `jenis_kelamin` = :jenis_kelamin,
    `alamat` = :alamat,
    `rt` = :rt,
    `rw` = :rt,
    `kelurahan_desa` = :kelurahan_desa,
    `kecamatan` = :kecamatan,
    `agama` = :agama,
    `status_perkawinan` = :status_perkawinan,
    `pekerjaan` = :pekerjaan,
    `kewarganegaraan` = :kewarganegaraan,
    `berlaku_hingga` = :berlaku_hingga
WHERE `nik` = :nikOriginal");
        $exec->bindValue(':nik',$nik);
         $exec->bindValue(':nama',$nama_lengkap);
         $exec->bindValue(':tempat_lahir',$tempat_lahir);
         $exec->bindValue(':tanggal_lahir',$tanggal_lahir);
         $exec->bindValue(':jenis_kelamin',$jenis_kelamin);
         $exec->bindValue(':alamat',$alamat);
         $exec->bindValue(':rt',$rt);
         $exec->bindValue(':rw',$rw);
         $exec->bindValue(':kelurahan_desa', $desa);
         $exec->bindValue(':kecamatan', $kecamatan);
         $exec->bindValue(':agama', $agama);
         $exec->bindValue(':status_perkawinan', $status_perkawinan);
         $exec->bindValue(':pekerjaan', $pekerjaan);
         $exec->bindValue(':kewarganegaraan', $kewarganegaraan);
         $exec->bindValue(':berlaku_hingga',$nik);
         $exec->bindValue(':nikOriginal',$original);
         if ($exec->execute()) {
             return true;
         }
    } catch (Exception $e) {
        throw new Exception($e->getMessage(), 1);
        
    }
    
}

function get_data_desa_by_kecamatan($kecamatan) {
     $i = 0;
     foreach (connect()->query("SELECT * FROM ktp WHERE kecamatan='$kecamatan' ORDER BY nama ASC") as  $value) {
        $i++;
        $data['data'][] = [
            $i,
            $value['nama'],
            (string)$value['nik'],
            $value['jenis_kelamin'],
            sprintf('%s,%s',$value['tempat_lahir'], strtoupper(tanggal_indonesia($value['tanggal_lahir']))),
            sprintf('%s,RT %s/RW %s DESA/KEL %s, KEC. %s',$value['alamat'],$value['rt'],$value['rw'],$value['kelurahan_desa'],$value['kecamatan']),
            $value['agama'],
            $value['status_perkawinan'],
            $value['pekerjaan'],
            $value['kewarganegaraan'],
            $value['input_date'],
            sprintf('<a onclick="return confirm(\'Apakah anda yakin!\');" href="%s?id=%s" class="w3-button w3-danger">
                                Hapus
                            </a>','proses_delete.php',$value['nik']).
            sprintf('<a href="%s&id=%s" class="w3-button w3-success">
                                Edit data
                            </a>','?halaman=edit-data',$value['nik'])
            ,
        ];
    }


    if (empty($data)) {
        return array('data'=>[]);
    } else {
        return $data;
    }
}

?>
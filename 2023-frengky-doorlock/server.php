<?php

include 'admin/include/koneksi/koneksi.php';



function cek_status($tanggalSaatIni, $tanggalMulai, $tanggalSelesai) {
    $tanggalSaatIni = strtotime($tanggalSaatIni);
    $tanggalMulai = strtotime($tanggalMulai);
    $tanggalSelesai = strtotime($tanggalSelesai);

    if ($tanggalSaatIni >= $tanggalMulai && $tanggalSaatIni <= $tanggalSelesai) {
        return true;
    } else {
        return false;
    }
}


function cek_jadwal()
{
        $respon = false;
        $querytabel = "SELECT * FROM data_jadwal where  status='terkonfirmasi' ";
        $proses = mysql_query($querytabel);
        while ($data = mysql_fetch_array($proses)) {
            $mulai = $data['waktu_mulai'];
            $selesai = $data['waktu_selesai'];
            $tanggalSaatIni = date("Y-m-d H:i:s");
            $cek = cek_status($tanggalSaatIni, $mulai, $selesai);
            if ($cek == true)
            {
                $respon = true;
            }
        }
        return $respon;
}





if (!empty($_GET)) {
    // Mengubah parameter GET menjadi format string
    $getParams = '';
    foreach ($_GET as $key => $value) {
        $getParams .= $key . " : " . $value . PHP_EOL;
    }
    
    if (!(isset($_GET['apikey'])))
    {
         echo 'APIKEY TIDAK VALID';
        die();
    }
    else
    {
    if (!($_GET['apikey'] == "844fd3c289085bda3a1455c29aac8d92"))
    {
         echo 'APIKEY TIDAK VALID';
        die();
       
    }
        
    }
    
    // $id_tracking = "TRA".date('Ymdhis');
    //           $id_mobil="1";
    //           $lat=($_GET['lat']);
    //           $lng=($_GET['lng']);


function baca_database($tabel,$field,$query)
{
	
	if ($query=="")
	{
		$sql = 'SELECT * FROM '.$tabel;
	}
	else
	{
		$sql = $query;
	}
	
	$querytabelualala=$sql;
	$prosesulala = mysql_query($querytabelualala);
	$datahasilpemrosesanquery = mysql_fetch_array($prosesulala);
	$hasiltermantab = $datahasilpemrosesanquery[$field];
	return $hasiltermantab;
}


$status = "0";
if (cek_jadwal() == true)
{
    $status = "1";
}


  
$json = '{
    "out_1": "'.$status.'",
    "out_2": "0",
    "out_3": "0",
    "out_4": "0",
    "out_5": "0",
    "out_6": "0",
    "out_7": "0",
    "out_8": "0",
    "out_9": "0",
    "out_10": "0"
}';

echo $json;


} else {
    echo "Tidak ada parameter GET yang dikirimkan.";
}



?>

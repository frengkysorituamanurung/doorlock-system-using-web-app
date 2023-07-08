<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_jadwal'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}


$id_jadwal = id_otomatis("data_jadwal", "id_jadwal", "10");
              $waktu_booking=xss($_POST['waktu_booking']);
              $waktu_mulai=xss($_POST['waktu_mulai']);
              $waktu_selesai=xss($_POST['waktu_selesai']);
              $waktu_mulai = str_replace("T"," ",$waktu_mulai);
$waktu_selesai = str_replace("T"," ",$waktu_selesai);
              $id_user=xss($_POST['id_user']);
              $id_ruangan=xss($_POST['id_ruangan']);
              $status=xss($_POST['status']);


$query = mysql_query("insert into data_jadwal values (
'$id_jadwal'
 ,'$waktu_booking'
 ,'$waktu_mulai'
 ,'$waktu_selesai'
 ,'$id_user'
 ,'$id_ruangan'
 ,'$status'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>

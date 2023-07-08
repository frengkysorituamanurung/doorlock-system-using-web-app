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

$id_jadwal = xss($_POST['id_jadwal']);
$waktu_booking = xss($_POST['waktu_booking']);
$waktu_mulai = xss($_POST['waktu_mulai']);
$waktu_selesai = xss($_POST['waktu_selesai']);
$id_user = xss($_POST['id_user']);
$id_ruangan = xss($_POST['id_ruangan']);
$status = xss($_POST['status']);


$query = mysql_query("update data_jadwal set 
waktu_booking='$waktu_booking',
waktu_mulai='$waktu_mulai',
waktu_selesai='$waktu_selesai',
id_user='$id_user',
id_ruangan='$id_ruangan',
status='$status'

where id_jadwal='$id_jadwal' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>

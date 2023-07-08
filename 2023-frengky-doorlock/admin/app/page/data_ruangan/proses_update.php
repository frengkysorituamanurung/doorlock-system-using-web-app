<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_ruangan'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_ruangan = xss($_POST['id_ruangan']);
$nama_ruangan = xss($_POST['nama_ruangan']);
$kode_device = xss($_POST['kode_device']);


$query = mysql_query("update data_ruangan set 
nama_ruangan='$nama_ruangan',
kode_device='$kode_device'

where id_ruangan='$id_ruangan' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>

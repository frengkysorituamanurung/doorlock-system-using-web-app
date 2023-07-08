<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_manual_open'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_manual_open = xss($_POST['id_manual_open']);
$id_ruangan = xss($_POST['id_ruangan']);
$status = xss($_POST['status']);


$query = mysql_query("update data_manual_open set 
id_ruangan='$id_ruangan',
status='$status'

where id_manual_open='$id_manual_open' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>

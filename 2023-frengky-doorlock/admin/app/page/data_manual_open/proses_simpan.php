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


$id_manual_open = id_otomatis("data_manual_open", "id_manual_open", "10");
              $id_ruangan=xss($_POST['id_ruangan']);
              $status=xss($_POST['status']);


$query = mysql_query("insert into data_manual_open values (
'$id_manual_open'
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

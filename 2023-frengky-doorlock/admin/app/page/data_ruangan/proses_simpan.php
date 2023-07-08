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


$id_ruangan = id_otomatis("data_ruangan", "id_ruangan", "10");
              $nama_ruangan=xss($_POST['nama_ruangan']);
              $kode_device=xss($_POST['kode_device']);


$query = mysql_query("insert into data_ruangan values (
'$id_ruangan'
 ,'$nama_ruangan'
 ,'$kode_device'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>

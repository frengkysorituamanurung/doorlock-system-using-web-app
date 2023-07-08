<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_role'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}


$id_role = id_otomatis("data_role", "id_role", "10");
              $role=xss($_POST['role']);


$query = mysql_query("insert into data_role values (
'$id_role'
 ,'$role'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>

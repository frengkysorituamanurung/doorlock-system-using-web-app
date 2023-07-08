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

$id_role = xss($_POST['id_role']);
$role = xss($_POST['role']);


$query = mysql_query("update data_role set 
role='$role'

where id_role='$id_role' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>

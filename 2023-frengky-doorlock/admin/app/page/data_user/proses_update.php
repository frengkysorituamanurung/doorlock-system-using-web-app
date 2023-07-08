<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_user'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_user = xss($_POST['id_user']);
$nama = xss($_POST['nama']);
$id_role = xss($_POST['id_role']);
$username = xss($_POST['username']);
$password = md5($_POST['password']);


$query = mysql_query("update data_user set 
nama='$nama',
id_role='$id_role',
username='$username',
password='$password'

where id_user='$id_user' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>

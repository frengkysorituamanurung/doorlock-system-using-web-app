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


$id_user = id_otomatis("data_user", "id_user", "10");
              $nama=xss($_POST['nama']);
              $id_role=xss($_POST['id_role']);
              $username=xss($_POST['username']);
              $password=md5($_POST['password']);


$query = mysql_query("insert into data_user values (
'$id_user'
 ,'$nama'
 ,'$id_role'
 ,'$username'
 ,'$password'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>

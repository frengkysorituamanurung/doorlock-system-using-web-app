
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
    <div class="content-box-content">
        <table <?php tabel_in(100, '%', 0, 'center'); ?>>		
            <tbody>
               
                <?php
                if (!isset($_GET['proses'])) {
                        
                    ?>
                <script>
                    alert("AKSES DITOLAK");
                    location.href = "index.php";
                </script>
                <?php
                die();
            }
            $proses = decrypt(mysql_real_escape_string($_GET['proses']));
            $sql = mysql_query("SELECT * FROM data_ruangan where id_ruangan = '$proses'");
            $data = mysql_fetch_array($sql);
            ?>
           <!--h
            <tr>
                <td class="clleft" width="25%">Id Ruangan </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_ruangan']; ?></td>	
            </tr>
           h-->

            <tr>
                <td class="clleft" width="25%">Nama Ruangan </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['nama_ruangan']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Kode Device </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['kode_device']; ?></td>
            </tr>




            </tbody>
        </table>
    </div>
</div>

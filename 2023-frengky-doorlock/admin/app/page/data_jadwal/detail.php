
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
            $sql = mysql_query("SELECT * FROM data_jadwal where id_jadwal = '$proses'");
            $data = mysql_fetch_array($sql);
            ?>
           <!--h
            <tr>
                <td class="clleft" width="25%">Id Jadwal </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_jadwal']; ?></td>	
            </tr>
           h-->

            <tr>
                <td class="clleft" width="25%">Waktu Booking </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['waktu_booking']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Waktu Mulai </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['waktu_mulai']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Waktu Selesai </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['waktu_selesai']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Nama </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo baca_database("","nama","select * from data_user where id_user='$data[id_user]'")  ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Nama Ruangan </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo baca_database("","nama_ruangan","select * from data_ruangan where id_ruangan='$data[id_ruangan]'")  ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Status </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['status']; ?></td>
            </tr>




            </tbody>
        </table>
    </div>
</div>

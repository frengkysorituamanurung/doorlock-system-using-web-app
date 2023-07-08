
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI KE HALAMAN SEBELUMNYA'); ?>
</a>

    <div class="col-sm-12" style="margin-bottom: 20px; margin-top: 20px;">
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <strong>Edit Data Jadwal </strong>
        <hr class="message-inner-separator">
            <p>Silahkan Update Data Jadwal  dibawah ini.</p>
        </div>
    </div>


<div class="content-box">
    <form action="proses_update.php"  enctype="multipart/form-data"  method="post">
        <div class="content-box-content">
            <div id="postcustom">	
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
                        <td width="25%" class="leftrowcms">					
                            <label >Id Jadwal  <font color="red">*</font></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                           <?php echo $data['id_jadwal']; ?>	
                        </td>
                    </tr>
                    h-->
                    <input type="hidden" class="form-control" name="id_jadwal" value="<?php echo $data['id_jadwal']; ?>" readonly  id="id_jadwal" required="required">

                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Waktu Booking  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input value="<?php echo ($data['waktu_booking']); ?>" class="form-control" style="width:50%" type="text" name="waktu_booking" id="waktu_booking" placeholder="Waktu Booking " required="required">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Waktu Mulai  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input value="<?php echo ($data['waktu_mulai']); ?>" class="form-control" style="width:50%" type="text" name="waktu_mulai" id="waktu_mulai" placeholder="Waktu Mulai " required="required">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Waktu Selesai  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input value="<?php echo ($data['waktu_selesai']); ?>" class="form-control" style="width:50%" type="text" name="waktu_selesai" id="waktu_selesai" placeholder="Waktu Selesai " required="required">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Nama  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_user" id="id_user" placeholder="Id User " required="required">
                                <option value="<?php echo ($data['id_user']); ?>">- <?php echo baca_database("","nama","select * from data_user where id_user='$data[id_user]'"); ?> -</option><?php combo_database_v2('data_user','id_user','nama',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Nama Ruangan  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_ruangan" id="id_ruangan" placeholder="Id Ruangan " required="required">
                                <option value="<?php echo ($data['id_ruangan']); ?>">- <?php echo baca_database("","nama_ruangan","select * from data_ruangan where id_ruangan='$data[id_ruangan]'"); ?> -</option><?php combo_database_v2('data_ruangan','id_ruangan','nama_ruangan',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Status  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="status" id="status" placeholder="Status " required="required">
                                <option value="<?php echo ($data['status']); ?>">- <?php echo ($data['status']); ?> -</option><?php combo_enum('data_jadwal','status',''); ?>
                                </select>
                            </td>
                        </tr>


                    </tbody>
                </table>
                <div class="content-box-content">
                    <center>
                        <?php btn_update(' PROSES UPDATE DATA'); ?>
                    </center>
                </div>		
            </div>
        </div>
    </form>

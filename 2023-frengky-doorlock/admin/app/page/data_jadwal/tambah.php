
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI KEHALAMAN SEBELUMNYA'); ?>
</a>	

    <div class="col-sm-12" style="margin-bottom: 20px; margin-top: 20px;">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <strong>Tambah Data Jadwal </strong>
        <hr class="message-inner-separator">
            <p>Silahkan input Data Jadwal  dibawah ini.</p>
        </div>
    </div>

<div class="content-box">
    <form action="proses_simpan.php" enctype="multipart/form-data"  method="post">
        <div class="content-box-content">
            <div id="postcustom">	
                <table <?php tabel_in(100, '%', 0, 'center'); ?>>		
                    <tbody>
                        <!--h
                        <tr>
                            <td width="25%" class="leftrowcms">					
                                <label >Id Jadwal  <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                              <?php echo id_otomatis("data_jadwal", "id_jadwal", "10"); ?>  		
                            </td>
                        </tr>
                        h-->
                        <input type="hidden" class="form-control" readonly value="<?php echo id_otomatis("data_jadwal", "id_jadwal", "10"); ?>" name="id_jadwal" placeholder="Id Jadwal " id="id_jadwal" required="required">


                                <input  class="form-control" style="width:50%" type="hidden" name="waktu_booking" id="waktu_booking" placeholder="Waktu Booking " required="required" value="<?php echo date('Y-m-d H:i:s');?>">

                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Waktu Mulai  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="datetime-local" name="waktu_mulai" id="waktu_mulai" placeholder="Waktu Mulai " required="required">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Waktu Selesai  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="datetime-local" name="waktu_selesai" id="waktu_selesai" placeholder="Waktu Selesai " required="required">
                            </td>
                        </tr>



                                <input class="form-control" style="width:50%" type="hidden" name="id_user" id="id_user" placeholder="Id User " value="<?php echo $id_user;?>" required="required">


                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Nama Ruangan  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_ruangan" id="id_ruangan" placeholder="Id Ruangan " required="required">
                                <option></option><?php combo_database_v2('data_ruangan','id_ruangan','nama_ruangan',''); ?>
                                </select>
                            </td>
                        </tr>

                                <input class="form-control" style="width:50%" type="hidden" name="status" id="status" placeholder="Status " required="required" value="menunggu konfirmasi">

                        
                
                        
                    </tbody>
                </table>
                <div class="content-box-content">
                    <center>
                        <?php btn_simpan(' PROSES SIMPAN DATA'); ?>
                    </center>
                </div>		
            </div>
        </div>
    </form>

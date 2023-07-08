<br>
<center><h3><?php sambutan(); ?></h3></center>
    <br>


<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number"><?php total('data_user','');?><small> User</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Ruangan</span>
                <span class="info-box-number"><?php total('data_ruangan','');?><small> Ruangan</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Jadwal</span>
                <span class="info-box-number"><?php total('data_jadwal','');?><small> Jadwal</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Role</span>
                <span class="info-box-number"><?php total('data_role','');?><small> Role</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

<h5><b>Info Status Ruangan <?php echo date('d M Y H:i:s');?> : </b></h5>
<div class="row">
<?php



function cek_status($tanggalSaatIni, $tanggalMulai, $tanggalSelesai) {
    $tanggalSaatIni = strtotime($tanggalSaatIni);
    $tanggalMulai = strtotime($tanggalMulai);
    $tanggalSelesai = strtotime($tanggalSelesai);

    if ($tanggalSaatIni >= $tanggalMulai && $tanggalSaatIni <= $tanggalSelesai) {
        return true;
    } else {
        return false;
    }
}


function cek_jadwal($id_ruangan)
{
        $respon = false;
        $querytabel = "SELECT * FROM data_jadwal where id_ruangan='$id_ruangan' and  status='terkonfirmasi' ";
        $proses = mysql_query($querytabel);
        while ($data = mysql_fetch_array($proses)) {
            $mulai = $data['waktu_mulai'];
            $selesai = $data['waktu_selesai'];
            $tanggalSaatIni = date("Y-m-d H:i:s");
            $cek = cek_status($tanggalSaatIni, $mulai, $selesai);
            if ($cek == true)
            {
                $respon = true;
            }
        }
        return $respon;
}




    $querytabel = "SELECT * FROM data_ruangan";
    $proses = mysql_query($querytabel);
    while ($data = mysql_fetch_array($proses)) {
        $id_ruangan = $data['id_ruangan'];


    ?>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-<?php
        if (cek_jadwal($id_ruangan))
        {
            echo "green";
            $status = "Open";
        }
        else
        {
            $status = "Close";
            echo "blue";
        }
        ?>">
            <div class="inner">
                <h3><?php echo $status;?></h3>

                <p><?php echo $data['nama_ruangan']; ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-building-o"></i>
            </div>
            <a target="_blank" href="../data_jadwal/index.php?Berdasarkan=id_ruangan&isi=<?php echo $id_ruangan;?>" class="small-box-footer">Kode : <?php echo $data['kode_device']; ?> </a>
        </div>
    </div>
        <?php } ?>
</div>

<h5><b>Booking jadwal (Menunggu Konfirmasi) <?php echo date('d M Y H:i:s');?> : </b></h5>
<div style="overflow-x:auto;">
    <table <?php tabel(100, '%', 1, 'left'); ?> >
        <tr>

            <th>No</th>
             <th>Id Jadwal </th>
            <th align="center" class="th_border cell"  >Waktu Booking </th>
            <th align="center" class="th_border cell"  >Waktu Mulai </th>
            <th align="center" class="th_border cell"  >Waktu Selesai </th>
            <th align="center" class="th_border cell"  >Nama User</th>
            <th align="center" class="th_border cell"  >Nama Ruangan </th>
            <th align="center" class="th_border cell"  >Status </th>

        </tr>

        <tbody>
        <?php

        if ($id_role == "ROL20230614013017953")
        {
            $q = "";
        }
        else
        {
            $q = " and id_user='$id_user'";
        }


        $no = 0;

        $querytabel = "SELECT * FROM data_jadwal where status='menunggu konfirmasi' $q";

        $proses = mysql_query($querytabel);
        while ($data = mysql_fetch_array($proses)) {
            ?>
            <tr class="event2">

                <td align="center" width="50"><?php $no = (($no + 1) ); echo $no; ?></td>
                <td align="center"><a  href="../data_jadwal/index.php?Berdasarkan=id_jadwal&isi=<?php echo $data['id_jadwal']; ?>"><?php echo $data['id_jadwal']; ?></a></td>
                <td align="center"><?php echo $data['waktu_booking']; ?></td>
                <td align="center"><?php echo $data['waktu_mulai']; ?></td>
                <td align="center"><?php echo $data['waktu_selesai']; ?></td>
                <td align="center"><?php echo baca_database("","nama","select * from data_user where id_user='$data[id_user]'")  ?></td>
                <td align="center"><?php echo baca_database("","nama_ruangan","select * from data_ruangan where id_ruangan='$data[id_ruangan]'")  ?></td>
                <td align="center"><?php echo $data['status']; ?></td>


            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

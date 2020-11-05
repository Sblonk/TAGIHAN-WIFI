  <?php  if ($_SESSION['admin']){ ?>

 <?php 


    $tgl = date("Y-m-d");
    $sql = $koneksi->query("select * from tb_kas where tgl_kas = '$tgl'");

    while($tampil=$sql->fetch_assoc()){

      $kas_hari_ini = $kas_hari_ini+$tampil['penerimaan'];
    }

    $sql2 = $koneksi->query("select * from tb_kas");

    while($tampil2=$sql2->fetch_assoc()){

      $penerimaan = $penerimaan+$tampil2['penerimaan'];
      $pengeluaran = $pengeluaran+$tampil2['pengeluaran'];
      $saldo = $penerimaan-$pengeluaran;
    }


 

  ?>


 <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo number_format($kas_hari_ini,0,",","."); ?></h3>

              <p>Pamasukan Hari Ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo number_format($penerimaan,0,",",".") ?><sup style="font-size: 20px"></sup></h3>

              <p>Total Pemasukan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo number_format($pengeluaran,0,",",".") ?></h3>

              <p>Total Pengeluaran</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo number_format($saldo,0,",",".") ?></h3>

              <p>SALDO</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <?php } ?>




  <?php  if ($_SESSION['user']){ ?>

        <?php 



    function tglIndonesia3($str2){
               $tr2   = trim($str2);
               $str2    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr2);
               return $str2;
           }


 ?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                 Data Tagihan 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example1">

                    


             
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelanggan</th>
                  <th>Nama Paket</th>
                  <th>Bulan/Tahun</th>
                  <th>Tagihan</th>
                  <th>Status Bayar</th>
                   <th>Aksi</th>
                 
             
                </tr>
                </thead>
                <tbody>

                  <?php 

                  

                     

                      $no = 1;

                      $sql = $koneksi->query("select tb_tagihan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat,   tb_paket.nama_paket, tb_pelanggan.no_telp
                          from tb_tagihan
                          inner join tb_pelanggan on tb_tagihan.id_pelanggan=tb_pelanggan.id_pelanggan
                          inner join tb_paket on tb_pelanggan.paket=tb_paket.id_paket
                          where tb_tagihan.id_pelanggan='$id_pelanggan' 
                        ");

                    

                  

                      while ($data = $sql->fetch_assoc()) {
                        
                        $no_hp = $data['no_telp'];
                        $status=$data['status_bayar'] ;

                            if ($status==0) {
                              $status_t="Belum Lunas";
                              $color = "red";
                            }else{
                              $status_t="Lunas";
                              $color = "green";
                            }

                       $bulan_tahun = $data['bulan_tahun'];
                       
                       $tahun  = str_split($bulan_tahun); 

                       $tahun1 = $tahun[0];
                       $tahun2 = $tahun[1];
                       $tahun3 = $tahun[2];
                       $tahun4 = $tahun[3];
                       $tahun5 = $tahun[4];
                       $tahun6 = $tahun[5]; 

                       $bulan = $tahun1.$tahun2; 

                       $tahun = $tahun3.$tahun4.$tahun5.$tahun6;  


                   ?>


                <tr>
                  <td style="color: <?php echo $color ?>"><?php echo $no++; ?></td>
                  <td style="color: <?php echo $color ?>"><?php echo $data['nama_pelanggan'] ?></td>
                  <td style="color: <?php echo $color ?>"><?php echo $data['nama_paket'] ?></td>
                  <td style="color: <?php echo $color ?>"><?php echo $bulan ?>/<?php echo $tahun ?> </td>
                  <td style="color: <?php echo $color ?>"><?php echo number_format( $data['jml_bayar'],0,",",".") ?></td>
                  <td style="color: <?php echo $color ?>"><?php echo $status_t; ?></td>

                  <?php if ($status==0) { ?>

                  <td> 

                    <a  href="#" disabled="" class="btn btn-info btn-sm" title=""><i class="fa fa-money"></i>  Cetak Bukti Bayar</a>

                    

                  </td>

                  

                  <?php }else{ ?>



                  <td> 
                    <a target="blank" href="page/transaksi/cetak.php?id_tagihan=<?php echo $data['id_tagihan'] ;?>" class="btn btn-info btn-sm" title=""><i class="fa fa-money"></i>  Cetak Bukti Bayar</a>
                  </td>

                  <?php } ?>
                 
                  
                 

                  
                </tr>
                

                <?php  }?>

            </tbody>


              

        </table>



    </div>

  
</div>
</div>
</div>
</div>

<?php } ?>






                
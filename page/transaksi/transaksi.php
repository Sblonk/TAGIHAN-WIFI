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

                     <div class="col-md-12" >
<form  method="POST" >
                    <div class="col-md-3">    
                    <div class="form-group">

                    <br><label style="color: white; font-weight: bold;">Bulan</label> <br>
                    <select required=""   class="form-control"  name="bulan" >

                          <option value="">--Pilih Bulan--</option>
                          <option value="01">Januari</option>
                          <option value="02">Februari</option>
                          <option value="03">Maret</option>
                          <option value="04">April</option>
                          <option value="05">Mei</option>
                          <option value="06">Juni</option>
                          <option value="07">Juli</option>
                          <option value="08">Agustus</option>
                          <option value="09">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember</option>
           

                    </select>
              </div> 

          </div>



          <div class="col-md-3">    
                    <div class="form-group">

                    <br><label style="color: white; font-weight: bold;">Tahun</label> <br>
                    <select required=""   class="form-control"  name="tahun" >

                      <option value="">--Pilih Tahun--</option>

                         <?php

                          $tahun = date("Y");

                          for ($i=$tahun-3; $i <= $tahun; $i++) { 
                            echo'

                              <option value="'.$i.'">'.$i.'</option>

                            ';
                          }

                        ?>
           

                    </select>
              </div> 

          </div>

       
                    
          
             <div class="col-md-1">    
               <div class="form-group">
                <button type="submit" name="filter" style="margin-top: 45px;" class="btn btn-default"><i class="fa fa-search"></i> Cari</button>
            </div>

        </div>


             <div class="col-md-2">    
               <div class="form-group">

               <a href="?page=transaksi&aksi=tambah" class="btn btn-default" style="margin-top: 45px;"  title=""><i class="fa fa-plus"></i> Tambah Tagihan</a>
              </div>
              </div> 

               
            

         </form> 

   </div>       


             
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelanggan</th>
                  <th>Nama Paket</th>
                  <th>Bulan/Tahun</th>
                  <th>Tagihan</th>
                  <th>Status Bayar</th>
                 
             
                </tr>
                </thead>
                <tbody>

                  <?php 

                  if (isset($_POST['filter'])) {
                         $bulan = $_POST['bulan'];
                         $tahun = $_POST['tahun'];
                         $bulantahun = $bulan.$tahun;
                      }else{
                        $bulan = date('m');
                        $tahun = date('Y');
                        $bulantahun = $bulan.$tahun;
                      }

                      ?>

                        <div class="callout callout-warning">
                        <p style="margin-left: 10px; font-size: 20px;" >Bulan <?php echo $bulan?>, Tahun <?php echo $tahun?> </p>
                     </div>

                      <?php

                      if ($bulantahun !="") {

                      $no = 1;

                      $sql = $koneksi->query("select tb_tagihan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat,   tb_paket.nama_paket, tb_pelanggan.no_telp
                          from tb_tagihan
                          inner join tb_pelanggan on tb_tagihan.id_pelanggan=tb_pelanggan.id_pelanggan
                          inner join tb_paket on tb_pelanggan.paket=tb_paket.id_paket
                          where tb_tagihan.bulan_tahun='$bulantahun' 
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


                   ?>


                <tr>
                  <td style="color: <?php echo $color ?>"><?php echo $no++; ?></td>
                  <td style="color: <?php echo $color ?>"><?php echo $data['nama_pelanggan'] ?></td>
                  <td style="color: <?php echo $color ?>"><?php echo $data['nama_paket'] ?></td>
                  <td style="color: <?php echo $color ?>"><?php echo $bulan ?> / <?php echo $tahun ?></td>
                  <td style="color: <?php echo $color ?>"><?php echo number_format( $data['jml_bayar'],0,",",".") ?></td>
                  <td style="color: <?php echo $color ?>"><?php echo $status_t; ?></td>

                  <?php if ($status==0) { ?>

                  <td> 

                    <a  href="?page=transaksi&aksi=bayar&id=<?php echo $data['id_tagihan'] ;?>" class="btn btn-danger btn-xs" title=""><i class="fa fa-money"></i>  BAYAR</a>

                    <a  href="https://api.whatsapp.com/send?phone=<?php echo $no_hp ?>&text=Kepada Pelanggan Wifi Bapak/Ibu: <?php echo $data['nama_pelanggan']?>, alamat: <?php echo $data['alamat']?>,  Paket: <?php echo  $data['nama_paket']?>,  Total Tagihan:  Rp <?php echo number_format($data['jml_bayar'])?>,  Pembayaran tanggal 7-20 tiap bulanya, pembayaran bisa via transfer ke No.rek BRI AN.Badria 425901007496538 terima kasih" target="blank" class="btn btn-success btn-xs"> <i class="fa  fa-whatsapp"></i> Kirim WA</a>

                    <a  href="#" disabled="" class="btn btn-info btn-xs" title=""><i class="fa fa-money"></i>  Cetak Bukti Bayar</a>



                  </td>

                  

                  <?php }else{ ?>



                  <td> 
                    <a  href="" disabled="" class="btn btn-danger btn-xs" title=""><i class="fa fa-money"></i>  BAYAR</a>

                      <a  href="https://api.whatsapp.com/send?phone=<?php echo $no_hp ?>&text=Kepada Pelanggan Wifi Bapak/Ibu: <?php echo $data['nama_pelanggan']?>, alamat: <?php echo $data['alamat']?>,  Paket: <?php echo  $data['nama_paket']?>, terima kasih sudah melakukan pembayaran" target="blank" class="btn btn-success btn-xs"> <i class="fa  fa-whatsapp"></i> Kirim WA</a>

                      <a target="blank" href="page/transaksi/cetak.php?id_tagihan=<?php echo $data['id_tagihan'] ;?>" class="btn btn-info btn-xs" title=""><i class="fa fa-money"></i>  Cetak Bukti Bayar</a>
                  </td>

                  <?php } ?>
                 
                  
                 

                  
                </tr>
                

                <?php } }?>

            </tbody>


              

        </table>



    </div>

  
</div>
</div>
</div>
</div>






                
<?php 	
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		include "../../include/koneksi.php";
		 $id_tagihan = $_GET['id_tagihan'];

    


      $satu_hari        = mktime(0,0,0,date("n"),date("j"),date("Y"));
       
          function tglIndonesia($str){
             $tr   = trim($str);
             $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
             return $str;
         }

        

 ?>
<style type="text/css">

	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;     }
</style>
<script>
	

			window.print();
			window.onfocus=function() {window.close();}
				
	

</script>
</head>

<body onload="window.print()">

<?php 

    $sql = $koneksi->query("select * from tb_profile ");

    $data1 = $sql->fetch_assoc();

    $sql2 = $koneksi->query("select tb_tagihan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat,   tb_paket.nama_paket, tb_pelanggan.no_telp
                          from tb_tagihan
                          inner join tb_pelanggan on tb_tagihan.id_pelanggan=tb_pelanggan.id_pelanggan
                          inner join tb_paket on tb_pelanggan.paket=tb_paket.id_paket
                          where tb_tagihan.id_tagihan='$id_tagihan' 
                        ");


                      $data2 = $sql2->fetch_assoc();

 ?>

<table width="100%" >
  <tr>
    
    <td width="10" rowspan="3" valign="top"><img src="../../images/<?php echo $data1['foto']; ?>" width="80" height="85" /></td>
    <td width="383"><?php echo $data1['nama_sekolah']; ?></td>

  </tr>

 
  
</table>
<hr>

<br>	



</body>



<table width="100%" >
  <tr>
    <td width="0">&nbsp;</td>
    <td ><div align="center"><strong>BUKTI PEMBAYARAN <br> <?php echo $data['nama_bayar'] ?></strong></div></td>

  </tr>

   <tr>
     <td width="0">&nbsp;</td>
    <td><div align="center">Tanggal Bayar: <?php echo tglIndonesia(date('d F Y', strtotime($data2['tgl_bayar']))); ?></div></td>
  </tr>
  
</table><br>


<table class="tabel" border="1" width="100%">

  <thead>
    <tr>
      
                  <th>No</th>
                  <th>Nama Pelanggan</th>
                  <th>Paket</th>
                  <th>Bulan/Tahun</th>
                  <th>Harga</th>
                  <th>Status</th>
                  
                  
                  
    </tr>
  </thead>
    <tbody>
  
                     <?php 

                      $no = 1;

                      $sql = $koneksi->query("select tb_tagihan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat,   tb_paket.nama_paket, tb_pelanggan.no_telp
                          from tb_tagihan
                          inner join tb_pelanggan on tb_tagihan.id_pelanggan=tb_pelanggan.id_pelanggan
                          inner join tb_paket on tb_pelanggan.paket=tb_paket.id_paket
                          where tb_tagihan.id_tagihan='$id_tagihan' 
                        ");


                      while ($data = $sql->fetch_assoc()) {

                        $status=  $data['status_bayar'];

                        if ($status==1) {
                          $status_oke = "Lunas";
                        }else{
                           $status_oke = "Belum Lunas";
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
                  <td style="color: <?php echo $color ?>"><?php echo $status_oke; ?></td>
                 

                 </tr> 

                 <?php


                  } 

                  ?>

               

  </tbody>
</table><br><br><br>

<?php $tgl=date('Y-m-d'); ?>
<table width="100%">
<tr>
  <td align="center"></td>
  <td align="center" width="200px">
   Hormat Kami,
    <br/><br/><br/><br/><br/>
    <b><u><?php echo $data1['nama_sekolah']; ?></u><br/></b>
  </td>
</tr>
</table>



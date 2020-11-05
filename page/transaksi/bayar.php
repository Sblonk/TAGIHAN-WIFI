

<?php 


   $id_tagihan = $_GET['id'];
   $tgl_bayar= date('Y-m-d');
   
  
  $sql = $koneksi->query("SELECT * from tb_tagihan, tb_pelanggan, tb_paket where tb_pelanggan.id_pelanggan=tb_tagihan.id_pelanggan and tb_paket.id_paket=tb_pelanggan.paket and tb_tagihan.id_tagihan='$id_tagihan'");

  $data = $sql->fetch_assoc();

  $jml_bayar= $data['jml_bayar'];
  $pelanggan = $data['nama_pelanggan'];
  $paket = $data['nama_paket'];
  $ket = "Pembayaran Internet AN."."&nbsp".$pelanggan.","."&nbsp"."Paket"."&nbsp".$paket;

  $sql2 = $koneksi->query("update tb_tagihan set terbayar='$jml_bayar', status_bayar=1, tgl_bayar='$tgl_bayar' where id_tagihan='$id_tagihan'");

  $query= $koneksi->query(" insert into tb_kas (tgl_kas, keterangan, penerimaan)values('$tgl_bayar', '$ket', '$jml_bayar') ");
  

   if ($sql2) {
              echo "

                  <script>
                      setTimeout(function() {
                          swal({
                              title: 'Tagihan',
                              text: 'Berhasil Dibayar!',
                              type: 'success'
                          }, function() {
                              window.location = '?page=transaksi';
                          });
                      }, 300);
                  </script>

              ";
            }
  
  

 ?>



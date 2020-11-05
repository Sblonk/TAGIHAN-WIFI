
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                 Data Paket
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example1">
            
               <button type="button" class="btn btn-info" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-default">
               Tambah
              </button>
             
                <thead>
                <tr>
                  <th>No</th>
                  <th>Paket</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                	<?php 

                			$no = 1;

                			$sql = $koneksi->query("select * from tb_paket order by id_paket desc");

                			while ($data = $sql->fetch_assoc()) {

                     
                				
                			
                	 ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nama_paket'] ?></td>
                  <td><?php echo number_format($data['harga'],0,",",".") ?></td>
                 
                 

                  <td>

                    <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#mymodal<?php echo $data['id_paket']; ?>"><i class="fa fa-edit"></i> Ubah</a>
                    
                  

                     <a onclick="return confirm('Apakah Anda Yakin Mengahpus Data Ini')" href="?page=paket&aksi=hapus&id=<?php echo $data['id_paket'] ;?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>  Hapus</a>


                  </td>
                  
                </tr>

                  <div class="modal fade" id="mymodal<?php echo $data['id_paket']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                     <div class="box box-primary box-solid">
                      <div class="box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                           Ubah Data Paket
                      </div>
                      <div class="modal-body">

                        <form role="form"  method="POST"> 
                        <?php 

                          $id_paket = $data['id_paket'];

                          $sql1 = $koneksi->query("select * from tb_paket where id_paket='$id_paket'");

                         while ($data1 = $sql1->fetch_assoc()) {

                          


                        ?>

                        <input type="hidden" name="id_paket" value="<?php echo $data1['id_paket']; ?>">
                        <div class="form-group">
                          <label>Paket</label>
                          <input required="" type="text" name="nama_paket" class="form-control" value="<?php echo $data1['nama_paket']; ?>">      
                        </div>

                        <div class="form-group">
                          <label>Harga Paket</label>
                          <input required="" type="text" name="harga" class="form-control uang" value="<?php echo $data1['harga']; ?>">      
                        </div>
                       

                     

                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                       
                      </div>

                      <?php } ?>

                       </form>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                

                <?php } ?>

               <?php 



              if (isset($_POST['simpan'])) {
                $id_paket_ubah = $_POST['id_paket'];
                $nama_paket = $_POST['nama_paket'];
                $harga = $_POST['harga'];
                $harga_oke = str_replace(".", "", $harga);
                
                

                $sql = $koneksi->query("update  tb_paket set nama_paket='$nama_paket', harga='$harga_oke' where id_paket='$id_paket_ubah'");

              

                if ($sql) {
                    echo "

                        <script>
                            setTimeout(function() {
                                swal({
                                    title: 'Data Paket',
                                    text: 'Berhasil Diubah!',
                                    type: 'success'
                                }, function() {
                                    window.location = '?page=paket';
                                });
                            }, 300);
                        </script>

                    ";
                  }



              }


           ?>

            </tbody>

        </table>

    </div>
</div>
</div>


<!-- AWAL TAMBAH DATA TAHUN AJARAN -->

<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                 Tambah Data Paket
            </div>
                
               
              
              <div class="modal-body">
                <form role="form"  method="POST"> 
                        <div class="form-group">
                          <label>Paket</label>
                          <input required="" type="text" name="nama_paket" class="form-control" >      
                        </div>

                        <div class="form-group">
                          <label>Harga Paket</label>
                          <input required="" type="text" name="harga" class="form-control uang" >      
                        </div>
             
                      
                      <div class="modal-footer">
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                       
                      </div>

                     

                       </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 


<?php 

      if (isset($_POST['tambah'])) {
  
        $nama_paket = $_POST['nama_paket'];
        $harga = $_POST['harga'];
        $harga_oke2 = str_replace(".", "", $harga);
        
        

        $sql = $koneksi->query("insert into tb_paket (nama_paket, harga)values('$nama_paket', '$harga_oke2') ");

      

        if ($sql) {
            echo "

                <script>
                    setTimeout(function() {
                        swal({
                            title: 'Data Paket',
                            text: 'Berhasil Disimpan!',
                            type: 'success'
                        }, function() {
                            window.location = '?page=paket';
                        });
                    }, 300);
                </script>

            ";
          }



      }

 ?>   


 <!-- AKHIR TAMBAH DATA TAHUN AJARAN -->   
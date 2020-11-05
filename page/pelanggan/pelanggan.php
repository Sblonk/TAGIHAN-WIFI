
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                 Data Pelanggan
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
                 
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No. Telp.</th>
                  <th>Paket</th>
                  <th>Harga</th>
                 
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                  <?php 

                      $no = 1;

                      $sql = $koneksi->query("select * from tb_pelanggan, tb_paket where tb_pelanggan.paket=tb_paket.id_paket order by tb_pelanggan.id_pelanggan desc");

                      while ($data = $sql->fetch_assoc()) {

                     
                        
                      
                   ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  
                  <td><?php echo $data['nama_pelanggan'] ?></td>
                  <td><?php echo $data['alamat'] ?></td>
                  <td><?php echo $data['no_telp'] ?></td>
                  <td><?php echo $data['nama_paket'] ?></td>  
                  <td><?php echo number_format( $data['harga'],0,",",".") ?></td>
                  
                
                 
                  <td>

                    <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#mymodal<?php echo $data['id_pelanggan']; ?>"><i class="fa fa-edit"></i> Ubah</a>
                    
                  

                     <a onclick="return confirm('Apakah Anda Yakin Mengahpus Data Ini')" href="?page=pelanggan&aksi=hapus&id=<?php echo $data['id_pelanggan'] ;?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>  Hapus</a>


                  </td>
                  
                </tr>

                  <div class="modal fade" id="mymodal<?php echo $data['id_pelanggan']; ?>">
                  <div class="modal-dialog" >
                    <div class="modal-content" >
                     <div class="box box-primary box-solid">
                      <div class="box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                           Ubah Data Pelanggan
                      </div>
                      <div class="modal-body">

                        <form role="form"  method="POST"> 
                        <?php 

                          $id_pelanggan = $data['id_pelanggan'];

                          $sql1 = $koneksi->query("select * from tb_pelanggan where id_pelanggan='$id_pelanggan'");

                         while ($data1 = $sql1->fetch_assoc()) {

                          


                        ?>

                        <input type="hidden" name="id_pelanggan" value="<?php echo $data1['id_pelanggan']; ?>">

                      
                          
                        

                        

                        <div class="form-group">
                          <label>Nama Pelanggan</label>
                          <input type="text" name="nama" class="form-control" value="<?php echo $data1['nama_pelanggan']; ?>" required="">      
                        </div>

                         <div class="form-group">
                                <label>Alamat </label>
                                <textarea class="form-control" rows="3" name="alamat"><?php echo $data['alamat']; ?></textarea>
                          </div> 

                           <div class="form-group">
                          <label>No Telp (Contoh 6285781480396)</label>
                          <input type="text" name="no_telp" class="form-control" value="<?php echo $data1['no_telp']; ?>" required="">      
                        </div>

                       

                        <div class="form-group">

                            <label>Paket :</label> <br>
                            <select   class="form-control" name="paket">

                               
                                        <?php


                                            $query = $koneksi->query("SELECT * FROM tb_paket ORDER by id_paket");
                                             
                                            while ($tampil_t=$query->fetch_assoc()) {
                                                $pilih_t=($tampil_t['id_paket']==$data1['paket']?"selected":"");
                                              echo "<option value='$tampil_t[id_paket]' $pilih_t> $tampil_t[nama_paket]-$tampil_t[harga]</option>";
                                            }

                                        ?>

                            </select>
                        </div>

                        


                     
                       

                     

                      </div>
                      <div class="modal-footer">
                        

                        <button type="submit" name="simpan" class="btn btn-block btn-primary btn-lg">Simpan</button>
                       
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
                $id_pelanggan_ubah = $_POST['id_pelanggan'];
                $nama = $_POST['nama'];
        
                $alamat = $_POST['alamat'];
                $no_telp = $_POST['no_telp'];
                $paket = $_POST['paket'];
                
                

                $sql = $koneksi->query("update  tb_pelanggan set 
                                         nama_pelanggan='$nama',
                                         alamat='$alamat', 
                                         no_telp='$no_telp',
                                         paket='$paket'
                                          
                                         where id_pelanggan='$id_pelanggan_ubah'");

              

                if ($sql) {
                    echo "

                        <script>
                            setTimeout(function() {
                                swal({
                                    title: 'Data Pelanggan',
                                    text: 'Berhasil Diubah!',
                                    type: 'success'
                                }, function() {
                                    window.location = '?page=pelanggan';
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


<!-- AWAL TAMBAH DATA SISWA -->

<div class="modal fade"  id="modal-default">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                 Tambah Pelanggan
            </div>
                
               
              
              <div class="modal-body">
                <form role="form"  method="POST"> 
                        
                          
                          <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $data1['username']; ?>" required="">      
                        </div>

                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" value="<?php echo $data1['password']; ?>" required="">      
                        </div>

                         <div class="form-group">
                          <label>Nama Pelanggan</label>
                          <input type="text" name="nama" class="form-control" value="<?php echo $data1['nama_pelanggan']; ?>" required="">      
                        </div>

                         <div class="form-group">
                                <label>Alamat </label>
                                <textarea class="form-control" rows="3" name="alamat"><?php echo $data['alamat']; ?></textarea>
                          </div> 

                           <div class="form-group">
                          <label>No Telp (Contoh 6285781480396)</label>
                          <input type="text" name="no_telp" class="form-control" value="<?php echo $data1['no_telp']; ?>" required="">      
                        </div>

                       

                        <div class="form-group">

                            <label>Paket :</label> <br>
                            <select   class="form-control" name="paket">

                               
                                        <?php


                                            $query = $koneksi->query("SELECT * FROM tb_paket ORDER by id_paket");
                                             
                                            while ($tampil_t=$query->fetch_assoc()) {
                                                
                                              echo "<option value='$tampil_t[id_paket]' $pilih_t> $tampil_t[nama_paket]-$tampil_t[harga]</option>";
                                            }

                                        ?>

                            </select>
                        </div>

                        


                       


                     

                      </div>
                      <div class="modal-footer">
                        
                          <button type="submit" name="tambah" class="btn btn-block btn-primary btn-lg">Simpan</button>
                       
                      </div>

                     

                       </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 


<?php 

      if (isset($_POST['tambah'])) {
  
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $paket = $_POST['paket'];

        $sql3=$koneksi->query("select * from tb_user where username='$username'");
          
            $data = $sql3->num_rows;
            
            if($data >=1){
                ?>
                    <script type="text/javascript">
                        alert("username Ini Sudah Tercatat Di Database silahkan ulangi kembali");
                    </script>
                <?php
            }else{
        
        

        $sql = $koneksi->query("insert into tb_pelanggan (nama_pelanggan, alamat, no_telp, paket)values('$nama', '$alamat', '$no_telp', '$paket') ");

        $id_pelanggan = $koneksi->insert_id;

        $sql = $koneksi->query("insert into tb_user (username, nama_user, password, level, foto, id_pelanggan)values('$username', '$nama', '$password', 'user', 'admin.png', '$id_pelanggan') ");



      

        if ($sql) {
            echo "

                <script>
                    setTimeout(function() {
                        swal({
                            title: 'Data Pelanggan',
                            text: 'Berhasil Disimpan!',
                            type: 'success'
                        }, function() {
                            window.location = '?page=pelanggan';
                        });
                    }, 300);
                </script>

            ";
          }

          }

      }

 ?>   


 <!-- AKHIR TAMBAH DATA SISWA -->   
<?php 


		$id_pelanggan = $_GET['id'];

		$sql=$koneksi->query("delete from tb_pelanggan where id_pelanggan='$id_pelanggan'");

		if ($sql) {
			?>

				<script>
				    setTimeout(function() {
				        sweetAlert({
				            title: 'OKE!',
				            text: 'Data Berhasil Dihapus!',
				            type: 'error'
				        }, function() {
				            window.location = '?page=pelanggan';
				        });
				    }, 300);
				</script>

			<?php
		}

 ?>



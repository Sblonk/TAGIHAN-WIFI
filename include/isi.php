<?php 


		$page = $_GET['page'];
		$aksi = $_GET['aksi'];

		if ($page == "paket") {
			if ($aksi == "") {
				include "page/paket/paket.php";
			}

			

			if ($aksi == "hapus") {
				include "page/paket/hapus.php";
			}

			
		}


		if ($page == "kelas") {
			if ($aksi == "") {
				include "page/kelas/kelas.php";
			}


			if ($aksi == "hapus") {
				include "page/kelas/hapus.php";
			}
		}

		if ($page == "kenaikan") {
			if ($aksi == "") {
				include "page/kenaikan/kenaikan.php";
	
		    }

	    }

		if ($page == "kelulusan") {
			if ($aksi == "") {
				include "page/kelulusan/kelulusan.php";

			 }
	
	
		}

		if ($page == "profile") {
			if ($aksi == "") {
				include "page/profile/profile.php";

			 }
	
	
		}


		if ($page == "laporan_tagihan_siswa") {
			if ($aksi == "") {
				include "page/laporan/laporan_tagihan_siswa.php";

			 }
	
	
		}

		if ($page == "laporan_data_siswa") {
			if ($aksi == "") {
				include "page/laporan/laporan_data_siswa.php";

			 }
	
	
		}

		



		if ($page == "pelanggan") {
			if ($aksi == "") {
				include "page/pelanggan/pelanggan.php";
			}

			

			if ($aksi == "hapus") {
				include "page/pelanggan/hapus.php";
			}
		}

		if ($page == "jenisbayar") {
			if ($aksi == "") {
				include "page/jenisbayar/jenisbayar.php";
			}

			if ($aksi == "tambah") {
				include "page/jenisbayar/tambah.php";
			}

			if ($aksi == "hapus") {
				include "page/jenisbayar/hapus.php";
			}

			if ($aksi == "ubahbulanan") {
				include "page/jenisbayar/ubah_bulanan.php";
			}

			if ($aksi == "hapusbulanan") {
				include "page/jenisbayar/hapusbayar.php";
			}

			if ($aksi == "seting") {
				include "page/jenisbayar/bulanan.php";
			}

			if ($aksi == "ubahbebas") {
				include "page/jenisbayar/ubah_bebas.php";
			}

			if ($aksi == "hapusbebas") {
				include "page/jenisbayar/hapus_bebas.php";
			}
		}


		if ($page == "ubah_p") {
      if ($aksi == "") {
      include "ubah_password.php";
      }
    }


		if ($page == "transaksi") {
			if ($aksi == "") {
				include "page/transaksi/transaksi.php";
			}

			if ($aksi == "lihat") {
				include "page/transaksi/lihat.php";
			}

			if ($aksi == "tambah") {
				include "page/transaksi/tambah.php";
			}

			if ($aksi == "bayar") {
				include "page/transaksi/bayar.php";
			}

			

			

			if ($aksi == "hapus") {
				include "page/transaksi/hapus.php";
			}
		}







		if ($page == "pengguna") {
			if ($aksi == "") {
				include "page/pengguna/pengguna.php";
			}

			if ($aksi == "tambah") {
				include "page/pengguna/tambah.php";
			}

			if ($aksi == "ubah") {
				include "page/pengguna/ubah.php";
			}

			if ($aksi == "hapus") {
				include "page/pengguna/hapus.php";
			}
		}


		if ($page == "kas") {
			if ($aksi == "") {
				include "page/kas/kas.php";
			}

		}	
	



		if ($page == "") {
			include "home.php";
		}



 ?>
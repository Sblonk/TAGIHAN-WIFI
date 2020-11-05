    <?php 
   error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

		 include "include/koneksi.php";
		 session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <link rel="stylesheet" type="text/css" href="sw/dist/sweetalert.css">
  <script type="text/javascript" src="sw/dist/sweetalert.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
  body{
    background: url('images/photo2.png') no-repeat center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;

  }
</style>
</head>
<body class="hold-transition login-page  login-img">
<div class="login-box">
  <div class="login-logo">
   
  </div>

   <?php 

    $sql2 = $koneksi->query("select * from tb_profile ");

    $data1 = $sql2->fetch_assoc();

 ?>

  <!-- /.login-logo -->
  <div class="login-box-body">
     <h3 style=" text-align: center; " > <img  src="images/<?php echo $data1['foto'] ?>" width="90" height="80" alt=""></h3>

    <h3 style="color: black; font-size: 17px;  text-align: center;"> <b><?php echo $data1['nama_sekolah'] ?></b></h3>
    <p style="color: black; font-size: 18px;" class="login-box-msg">Halaman Login</p>

    <form  method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" autofocus="" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-info btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>



</body>
</html>


<?php 



		if (isset($_POST['login'])) {
			
			$username= addslashes(trim($_POST['username']));

			$pass= addslashes(trim($_POST['pass']));


			$sql = $koneksi->query("select * from tb_user where username='$username' and password='$pass'");

			$data = $sql->fetch_assoc();

			$ketemu = $sql->num_rows;

			if ($ketemu >=1) {

				session_start();
				

				if ($data['level']=="admin") {
					$_SESSION['admin'] = $data['id'];

					header("location:index.php");

				}
				else if ($data['level']=="user") {
					$_SESSION['user'] = $data['id'];

					header("location:index.php");
				}
			}else{

				?>

					<script>
            setTimeout(function() {
                sweetAlert({
                    title: 'Username dan Password Salah!',
                    text: 'Silahkan Masukan Username dan Password Yang Benar!',
                    type: 'error'
                }, function() {
                    window.location = 'login.php';
                });
            }, 300);
        </script>

				<?php
			}
		}



 ?>

<!DOCTYPE html>
<?php
  include "connection/koneksi.php";
  ob_start();
  session_start();
  $id = $_SESSION['level'];

  if ($id == 1 ) {

?>

<html lang="en">

<head>
    <title>Daftar</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="gambar/logo155.jpg" />
    <link rel="stylesheet" href="template/dashboard/css/bootstrap.min.css" />
    <link rel="stylesheet" href="template/dashboard/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="template/dashboard/css/colorpicker.css" />
    <link rel="stylesheet" href="template/dashboard/css/datepicker.css" />
    <link rel="stylesheet" href="template/dashboard/css/uniform.css" />
    <link rel="stylesheet" href="template/dashboard/css/select2.css" />
    <link rel="stylesheet" href="template/dashboard/css/matrix-style.css" />
    <link rel="stylesheet" href="template/dashboard/css/matrix-media.css" />
    <link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
    <link href="template/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

    <!--Header-part-->
    <div id="header">
        <h1><a href="daftar.php">Kantin SMKN 15 Jakarta</a></h1>
        <img src="gambar/logo155.jpg" alt="logo-smkn15"
            style="width: 50px; height:50px; margin-top:-25px; margin-left:70px; border-radius: 5px;">
    </div>
    <!--close-Header-part-->

    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
                    data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span
                        class="text">&nbsp;Daftar Akun</span></a>
            </li>
        </ul>
    </div>

    <!--start-top-serch-->

    <!--close-top-serch-->

    <!--sidebar-menu-->

    <div id="sidebar"> <a href="beranda.php" class="visible-phone"><i class="icon icon-list"></i>&nbsp;Beranda</a>
        <ul>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="entri_referensi.php"><i class="icon icon-tasks"></i> <span>Entri Referensi</span></a>
            <li> <a href="kasir1.php"><i class="icon icon-tasks"></i> <span>Kasir 1</span></a>
            <li> <a href="kasir2.php"><i class="icon icon-tasks"></i> <span>Kasir 2</span></a>
            <li> <a href="kasir3.php"><i class="icon icon-tasks"></i> <span>Kasir 3</span></a>
            <li> <a href="kasir4.php"><i class="icon icon-tasks"></i> <span>Kasir 4</span></a>
            <li class="active"><a href="daftar.php"><i class="icon icon-book"></i> <span>Daftar Akun</span></a> </li>
        </ul>
    </div>

    <!--close-left-menu-stats-sidebar-->

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="#"><i class="icon-user"></i>Daftar</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Isi data pendaftaran</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="" method="post" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Nama :</label>
                                    <div class="controls">
                                        <input name="nama_user" type="text" class="span11" placeholder="Nama Anda"
                                            required />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Username :</label>
                                    <div class="controls">
                                        <input name="username" type="text" class="span11" placeholder="Username"
                                            required />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                        <input name="password" type="password" class="span11"
                                            placeholder="Enter Password" required />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Level Pengguna</label>
                                    <div class="controls">
                                        <select class="span11" name="id_level">
                                            <!--<option value="1">Administrator</option>-->
                                            <option value="1">Administrator</option>
                                            <option value="2">Kasir 1</option>
                                            <option value="3">Kasir 2</option>
                                            <option value="4">Kasir 3</option>
                                            <option value="5">Kasir 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" name="kirim_daftar" class="btn btn-success"><i
                                            class='icon icon-save'></i>&nbsp; Daftar</button>
                                </div>
                            </form>
                            <?php
            if(isset($_POST['kirim_daftar'])){
              $nama_user = $_POST['nama_user'];
              $username = $_POST['username'];
              $password = $_POST['password'];
              $id_level = $_POST['id_level'];
              $status = 'aktif';

           
              //echo "<br>";
              //echo $nama_user . " || " . $username . " || " . $password . " || " . $id_level . " || " . $status;
              //echo "<br></br>";
              $query_daftar = "insert into tb_user values ('','$username','$password','$nama_user','$id_level','$status')";
              $sql_daftar = mysqli_query($conn, $query_daftar);
              if($sql_daftar){
                header('location: index.php');
                $_SESSION['daftar'] = 'sukses';
              }
            }
          ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; KANTIN <a href="#">SMKN 15 JAKARTA</a> </div>
    </div>
    <?php } else {?>
    <div class="alert alert-orange alert-block">
        <center>
            <h1 class="alert-heading">404 NOT FOUND</h1>
            halaman tidak ditemukan ! <br> <br>
            <a href="beranda.php" style="text-align : center;">kembali ke beranda</a>
        </center>

    </div>
    <?php }?>
    <!--end-Footer-part-->
    <script src="template/dashboard/js/jquery.min.js"></script>
    <script src="template/dashboard/js/jquery.ui.custom.js"></script>
    <script src="template/dashboard/js/bootstrap.min.js"></script>
    <script src="template/dashboard/js/bootstrap-colorpicker.js"></script>
    <script src="template/dashboard/js/bootstrap-datepicker.js"></script>
    <script src="template/dashboard/js/jquery.toggle.buttons.js"></script>
    <script src="template/dashboard/js/masked.js"></script>
    <script src="template/dashboard/js/jquery.uniform.js"></script>
    <script src="template/dashboard/js/select2.min.js"></script>
    <script src="template/dashboard/js/matrix.js"></script>
    <script src="template/dashboard/js/wysihtml5-0.3.0.js"></script>
    <script src="template/dashboard/js/jquery.peity.min.js"></script>
    <script src="template/dashboard/js/bootstrap-wysihtml5.js"></script>
    <script>
    $('.textarea_editor').wysihtml5();
    </script>

</body>

</html>

<?php 
  ob_flush();
?>
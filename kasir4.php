<!DOCTYPE html>

<?php
include "connection/koneksi.php";
session_start();
ob_start();

$id = $_SESSION['id_user'];

if(isset($_SESSION['edit_menu4'])){
  echo $_SESSION['edit_men4'];
  unset($_SESSION['edit_menu4']);

}

if(isset ($_SESSION['username'])){
  
  $query = "select * from tb_user natural join tb_level where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

  while($r = mysqli_fetch_array($sql)){
    
    $nama_user = $r['nama_user'];

?>

<html lang="en">

<head>
    <title>Kasir 3</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="gambar/logo155.jpg" />
    <link rel="stylesheet" href="template/dashboard/css/bootstrap.min.css" />
    <link rel="stylesheet" href="template/dashboard/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="template/dashboard/css/fullcalendar.css" />
    <link rel="stylesheet" href="template/dashboard/css/matrix-style.css" />
    <link rel="stylesheet" href="template/dashboard/css/matrix-media.css" />
    <link href="template/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="template/dashboard/css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

    <!--Header-part-->
    <div id="header">
        <h1><a href="kasir3.php">Kasir 4</a></h1>
        <img src="gambar/logo155.jpg" alt="logo-smkn15" style="width: 50px; height:50px; margin-top:-25px; margin-left:70px; border-radius: 5px;">
    </div>
    <!--close-Header-part-->


    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
                    data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span
                        class="text">Welcome <?php echo $r['nama_user'];?></span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i><?php echo "&nbsp;&nbsp;".$r['nama_level'];?></a></li>
                </ul>
            </li>
            <li class="" onclick="show()" style="cursor:pointer;"><a title=""><i class="icon icon-share-alt"></i> <span
                        class="text">Logout</span></a></li>
        </ul>
    </div>
    <!--close-top-Header-menu-->
    <!--start-top-serch-->

    <!--close-top-serch-->
    <!--sidebar-menu-->
    <div id="sidebar"><a href="kasir3.php" class="visible-phone"><i class="icon icon-tasks"></i> <span>Kasir
                1</span></a>
        <ul>
            <?php
    if($r['id_level'] == 1){
  ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="entri_referensi.php"><i class="icon icon-tasks"></i> <span>Entri Referensi</span></a>
            <li> <a href="kasir1.php"><i class="icon icon-tasks"></i> <span>Kasir 1</span></a>
            <li> <a href="kasir2.php"><i class="icon icon-tasks"></i> <span>Kasir 2</span></a>
            <li> <a href="kasir3.php"><i class="icon icon-tasks"></i> <span>Kasir 3</span></a>
            <li class="active"> <a href="kasir4.php"><i class="icon icon-tasks"></i> <span>Kasir 4</span></a>
            <li> <a href="daftar.php"><i class="icon icon-user"></i> <span>Tambah Kasir</span></a>

            </li>
            <?php
    } else if($r['id_level'] == 2){
  ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Entri Order</span></a> </li>
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
            <?php
    } else if($r['id_level'] == 3){
  ?>
            <li class="active"><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Entri Order</span></a> </li>
            <li> <a href="entri_transaksi.php"><i class="icon icon-inbox"></i> <span>Entri Transaksi</span></a> </li>
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li <?php
    } else if($r['id_level'] == 4){
  ?> <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
            <?php
    } else if($r['id_level'] == 5){
  ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Entri Order</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
            <?php
    }
  ?>
        </ul>
    </div>
    <!--sidebar-menu-->

    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="kasir3.php" title="Go to here" class="tip-bottom"><i
                        class="icon icon-tasks"></i> Kasir 4</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
            <div class="row-fluid">
                <?php
      if($r['id_level'] == 1){
    ?>
                <div class="widget-box">
                    <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
                        <h5>Menu kasir 4</h5>
                        <a href="tambah_menu3.php" class="btn btn-info btn-mini label"><i
                                class="icon-plus"></i>&nbsp;Tambah Data</a>
                    </div>
                    <div class="widget-content">
                        <ul class="thumbnails">
                            <div class="btn-icon-pg">
                                <ul>
                                    <!--Looping-->
                                    <?php
                  $query_data_makanan = "select * from tb_masakan JOIN tb_level ON tb_masakan.id_level = tb_level.id_level WHERE tb_level.nama_level = 'kasir4' ORDER BY tb_masakan.id_masakan DESC";
                  $sql_data_makanan = mysqli_query($conn, $query_data_makanan);
                  $no_makanan = 1;

                  while($r_dt_makanan = mysqli_fetch_array($sql_data_makanan)){
                ?>
                                    <li class="span2">
                                        <a> <img src="gambar/<?php echo $r_dt_makanan['gambar_masakan']?>" alt=""> </a>
                                        <div class="actions">
                                            <a class="lightbox_trigger"
                                                href="gambar/<?php echo $r_dt_makanan['gambar_masakan'];?>"><i
                                                    class="icon-search"></i>&nbsp;Lihat</a>
                                        </div>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $r_dt_makanan['nama_masakan'];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Harga / Porsi</td>
                                                    <td>Rp. <?php echo $r_dt_makanan['harga'];?>,-</td>
                                                </tr>
                                                <tr>
                                                    <td>Stok</td>
                                                    <td><?php echo $r_dt_makanan['stok'];?> Porsi</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <form action="" method="post">
                                            <button type="submit" value="<?php echo $r_dt_makanan['id_masakan'];?>"
                                                name="edit_menu4" class="btn btn-success btn-mini"><i
                                                    class='icon-pencil'></i>&nbsp;&nbsp;Edit &nbsp;&nbsp;</button>
                                            <button type="submit" value="<?php echo $r_dt_makanan['id_masakan'];?>"
                                                name="hapus_menu" class="btn btn-mini btn-danger"><i
                                                    class='icon icon-trash'></i>&nbsp; Hapus</button>
                                        </form>
                                    </li>
                                    <?php
                    }
                    if(isset($_REQUEST['hapus_menu'])){
                      //echo $_REQUEST['hapus_menu'];
                      $id_masakan = $_REQUEST['hapus_menu'];

                      $query_lihat = "select * from tb_masakan where id_masakan = $id_masakan";
                      $sql_lihat = mysqli_query($conn, $query_lihat);
                      $result_lihat = mysqli_fetch_array($sql_lihat);
                      if(file_exists('gambar/'.$result_lihat['gambar_masakan'])){
                        //echo $result_lihat['gambar_masakan'];
                        unlink('gambar/'.$result_lihat['gambar_masakan']);
                      }
                      $query_hapus_masakan = "delete from tb_masakan where id_masakan = $id_masakan";
                      $sql_hapus_masakan= mysqli_query($conn, $query_hapus_masakan);
                      if($sql_hapus_masakan){
                        header('location: kasir4.php');
                      }
                    }

                    if(isset($_REQUEST['edit_menu4'])){
                      //echo $_REQUEST['hapus_menu'];
                      $id_masakan = $_REQUEST['edit_menu4'];
                      $_SESSION['edit_menu4'] = $id_masakan;

                      header('location: tambah_menu4.php');
                    }
                  ?>
                                    <!--End Looping-->
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
                <?php
        }
      ?>
            </div>
            <!--End-Action boxes-->
        </div>
    </div>

    <!--end-main-container-part-->

    <!--Footer-part-->

    <div class="row-fluid">
        <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; KANTIN <a href="#">SMKN
                15 JAKARTA</a>
        </div>

        <!--end-Footer-part-->

        <script src="template/dashboard/js/excanvas.min.js"></script>
        <script src="template/dashboard/js/jquery.min.js"></script>
        <script src="template/dashboard/js/jquery.ui.custom.js"></script>
        <script src="template/dashboard/js/bootstrap.min.js"></script>
        <script src="template/dashboard/js/jquery.flot.min.js"></script>
        <script src="template/dashboard/js/jquery.flot.resize.min.js"></script>
        <script src="template/dashboard/js/jquery.peity.min.js"></script>
        <script src="template/dashboard/js/fullcalendar.min.js"></script>
        <script src="template/dashboard/js/matrix.js"></script>
        <script src="template/dashboard/js/matrix.dashboard.js"></script>
        <script src="template/dashboard/js/jquery.gritter.min.js"></script>
        <script src="template/dashboard/js/matrix.interface.js"></script>
        <script src="template/dashboard/js/matrix.chat.js"></script>
        <script src="template/dashboard/js/jquery.validate.js"></script>
        <script src="template/dashboard/js/matrix.form_validation.js"></script>
        <script src="template/dashboard/js/jquery.wizard.js"></script>
        <script src="template/dashboard/js/jquery.uniform.js"></script>
        <script src="template/dashboard/js/select2.min.js"></script>
        <script src="template/dashboard/js/matrix.popover.js"></script>
        <script src="template/dashboard/js/jquery.dataTables.min.js"></script>
        <script src="template/dashboard/js/matrix.tables.js"></script>

        <script type="text/javascript">
        function show(){
        let logout = confirm("Apakah anda yakin ingin logout ? ");
        if(logout){
            location.href = "logout.php";
            }
        }
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage(newURL) {

            // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {

                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-") {
                    resetMenu();
                }
                // else, send page to designated URL            
                else {
                    document.location.href = newURL;
                }
            }
        }

        // resets the menu selection upon entry to this page:
        function resetMenu() {
            document.gomenu.selector.selectedIndex = 2;
        }
        </script>
</body>

</html>
<?php
  }
} else {
  header('location: logout.php');
}
ob_flush();
?>
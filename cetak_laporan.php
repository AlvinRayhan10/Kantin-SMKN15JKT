<!DOCTYPE html>
<html lang="en">
<?php
include "connection/koneksi.php";
session_start();
ob_start();

$id = $_SESSION['id_user'];

if(isset($_SESSION['edit_order'])){
  //echo $_SESSION['edit_order'];
  unset($_SESSION['edit_order']);

}

if(isset ($_SESSION['username'])){
  
  $query = "select * from tb_user natural join tb_level where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

  while($r = mysqli_fetch_array($sql)){
    
    $nama_user = $r['nama_user'];
    $uang = 0;
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>&nbsp;</title>

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

    <style>
    @page {
        size: auto;
    }

    body {
        background: rgb(204, 204, 204);
    }

    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.1cm rgba(0, 0, 0, 0.5);
    }

    page[size="A4"] {
        width: 29.7cm;
        height: 21cm;
    }

    page[size="A4"][layout="potrait"] {
        width: 29.7cm;
        height: 21cm;
    }

    page[size="A3"] {
        width: 29.7cm;
        height: 42cm;
    }

    page[size="A3"][layout="landscape"] {
        width: 42cm;
        height: 29.7cm;
    }

    page[size="A5"] {
        width: 14.8cm;
        height: 21cm;
    }

    page[size="A5"][layout="landscape"] {
        width: 21cm;
        height: 19.8cm;
    }

    page[size="dipakai"][layout="landscape"] {
        width: 20cm;
        height: 20cm;
    }

    @media print {

        body,
        page {
            margin: auto;
            box-shadow: 0;
        }
    }
    </style>


</head>

<body>

    <page size="dipakai" layout="landscape">
        <br>
        <div class="container">
            <span id="remove">
                <a class="btn btn-success" id="ct"><span class="icon-print"></span> CETAK</a>
            </span>
        </div>
        <?php
        
      $id_order = $_REQUEST['konten'];
      $query_order = "SELECT * FROM tb_masakan  LEFT JOIN tb_user ON tb_masakan.id_level = tb_user.id_level WHERE tb_user.id_user = $id";;
      $sql_order = mysqli_query($conn, $query_order);
      $result_order = mysqli_fetch_array($sql_order);
      
      //echo $id_order
    ?>
        <center>
            <img src="gambar/logo155.jpg" height="100px" width="100px">
            <h4>
                KANTIN SMKN 15 JAKRTA
            </h4>
            <span>
                Jl. Mataram I, Kec. Kebayoran Baru, Jakarta Selatan<br>
                Telp. 0821-7243559 || E-mail smkn15jkt@gmail.com
            </span>
        </center>
        <hr>
        <table style="width: 100%" class="">
            <tr>
                <td style="width: 15%">
                    Nama Kasir
                </td>
                <td style="width: 5%">
                    :
                </td>
                <td style="width: 80%">
                    <?php echo $nama_user; ?>
                </td>
               
            </tr>
            <tr>
                <td style="width: 15%">
                   <p>Tanggal Cetak</p>
                </td>
                <td style="width: 5%">
                    <p>:</p>
                </td>
                <td style="width: 80%">
                  <p id="date"></p>
                </td>
               
            </tr>
           
           
        </table>

        <hr>

        <table class="table table-bordered table-invoice-full">
                                <thead>
                                    <tr>
                                        <th class="head0">No.</th>
                                        <th class="head0">Nama Menu</th>
                                        <th class="head1">Sisa Stok</th>
                                        <th class="head0">Jumlah Terjual</th>
                                        <th class="head0 right">Harga</th>
                                        <th class="head0 right">Total Masukan</th>
                                    </tr>
                                </thead>
                                <?php
                $no = 1;
                $query_lihat_menu = "SELECT * FROM tb_masakan  LEFT JOIN tb_user ON tb_masakan.id_level = tb_user.id_level WHERE tb_user.id_user = $id";
                $sql_lihat_menu = mysqli_query($conn, $query_lihat_menu);

              ?>
                                <tbody>
                                    <?php
                while($r_lihat_menu = mysqli_fetch_array($sql_lihat_menu)){
              ?>
                                    <tr>
                                        <td>
                                            <center><?php echo $no++;?>.</center>
                                        </td>
                                        <td><?php echo $r_lihat_menu['nama_masakan'];?></td>
                                        <td>
                                            <center><?php echo $r_lihat_menu['stok'];?></center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                        $id_masakan = $r_lihat_menu['id_masakan'];
                        $query_lihat_stok = "select * from tb_stok left join tb_pesan on tb_stok.id_pesan = tb_pesan.id_pesan left join tb_masakan on tb_pesan.id_masakan = tb_masakan.id_masakan where status_cetak = 'belum cetak'";
                        $query_jumlah = "select sum(jumlah_terjual) as jumlah_terjual from tb_stok left join tb_pesan on tb_stok.id_pesan = tb_pesan.id_pesan where id_masakan = $id_masakan and status_cetak = 'belum cetak'";
                        $sql_jumlah = mysqli_query($conn, $query_jumlah);
                        $result_jumlah = mysqli_fetch_array($sql_jumlah);

                        $jml = 0;

                        if($result_jumlah['jumlah_terjual'] != 0 || $result_jumlah['jumlah_terjual'] != null || $result_jumlah['jumlah_terjual'] != ""){
                          //echo $result_jumlah['jumlah_terjual'];
                          $jml = $result_jumlah['jumlah_terjual'];
                          echo $jml;
                        } else {
                          $jml = 0;
                          echo $jml;
                        }
                      ?>
                                            </center>
                                        </td>
                                        <td style="text-align: right">Rp. <?php echo $r_lihat_menu['harga'];?> ,-</td>
                                        <td style="text-align: right">Rp.

                                            <?php

                        $id_masakan = $r_lihat_menu['id_masakan'];
                        $query_lihat_stok = "select * from tb_stok left join tb_pesan on tb_stok.id_pesan = tb_pesan.id_pesan left join tb_masakan on tb_pesan.id_masakan = tb_masakan.id_masakan where status_cetak = 'belum cetak'";
                        $query_jumlah = "select sum(jumlah_terjual) as jumlah_terjual from tb_stok left join tb_pesan on tb_stok.id_pesan = tb_pesan.id_pesan where id_masakan = $id_masakan and status_cetak = 'belum cetak'";
                        $sql_jumlah = mysqli_query($conn, $query_jumlah);
                        $result_jumlah = mysqli_fetch_array($sql_jumlah);

                        $jml = 0;

                        if($result_jumlah['jumlah_terjual'] != 0 || $result_jumlah['jumlah_terjual'] != null || $result_jumlah['jumlah_terjual'] != ""){
                          //echo $result_jumlah['jumlah_terjual'];
                          $jml = $result_jumlah['jumlah_terjual'] * $r_lihat_menu['harga'];
                          echo $jml;
                        } else {
                          $jml = $result_jumlah['jumlah_terjual'] * $r_lihat_menu['harga'];
                          echo $jml;
                        }
                        $uang += $jml; ?> ,-</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>        
        <hr>
        <div class="container-fluid">
            <div class="row-fluid">
                <ul class="quick-actions">
                    <li class="bg_lg"> <a></i>
                            <h4>Uang Masuk</h4>
                            <h4>Rp.<?php echo $uang;?></h4>
                        </a> </li>
                </ul>
            </div>
        </div>
        

    </page>
</body>

<?php
    }
  }
?>

<script>
        const d = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        const dateLocaleString = d.toLocaleDateString('id-ID', options);
        document.getElementById("date").innerHTML = dateLocaleString;
    </script>

<script type="text/javascript">
document.getElementById('ct').onclick = function() {
    $("#remove").remove();
    window.print();
}
$(document).ready(function() {
    $("remove").remove();

});
</script>

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

</html>
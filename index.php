<?php
    session_start();
    include 'connection.php';
    if(!isset($_SESSION["session_key"])){
        header("Location: " . "http://localhost/ilham/login.php");
    }else{
      $session_key = $_SESSION["session_key"];
      $sql = "SELECT nama from admin WHERE session='$session_key';";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $nama = $row["nama"];
        }
      }else{
        $conn->close();
      }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Ilham Andrian</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mdb.min.css">
  <style>
  </style>
</head>

<body class="fixed-sn white-skin">
  <header>
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">
        <li class="logo-sn waves-effect py-3">
          <div class="text-center">
            <a href="#" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"></a>
          </div>
        </li>
        <li>
          <ul class="collapsible collapsible-accordion">
            <li>
              <a href="index.php?page=prodi" class="collapsible-header waves-effect"><i
                  class="w-fa fas fa-graduation-cap"></i>Prodi</a>
            </li>
            <li>
              <a href="index.php?page=matakuliah" class="collapsible-header waves-effect"><i
                  class="w-fa fas fa-book"></i>Mata Kuliah</a>
            </li>
            <li>
              <a href="index.php?page=ruang" class="collapsible-header waves-effect"><i
                  class="w-fa fas fa-home"></i>Ruang</a>
            </li>
            <li>
              <a href="index.php?page=mahasiswa" class="collapsible-header waves-effect"><i
                  class="w-fa fas fa-users"></i>Mahasiswa</a>
            </li>
            <li>
              <a href="index.php?page=jadwal" class="collapsible-header waves-effect"><i
                  class="w-fa fas fa-clock"></i>Jadwal</a>
            </li>
          </ul>
        </li>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
      </div>
      <div class="breadcrumb-dn mr-auto">
        <p>Absensi</p>
      </div>

      <div class="d-flex change-mode">
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block"><?php echo $nama; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="http://localhost/ilham/logout.php">Log Out</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main>
    <?php include "config.php";?>
  </main>

  <button type="button" id="modal-button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalDanger" style="display: none;">Hapus</button>

  <div class="modal fade" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-notify modal-danger" role="document">
       <!--Content-->
       <div class="modal-content">
         <!--Header-->
         <div class="modal-header">
           <p class="heading lead">Konfirmasi</p>

           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true" class="white-text">&times;</span>
           </button>
         </div>

         <!--Body-->
         <div class="modal-body">
           <div class="text-center">
             <i class="fas fa-trash fa-4x mb-3 animated rotateIn"></i>
             <p>Apakah anda yakin akan menghapus </p>
             <h2>
                <span class="badge">
                  <div id="content">
                    123456789
                  </div>
                </span>
             </h2>
           </div>
         </div>

         <!--Footer-->
         <div class="modal-footer justify-content-center">
           <a type="button" class="btn btn-danger" href="" id="delete_link">YA <i class="fas fa-check ml-1 text-white"></i></a>
           <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">BATAL<i class="fas fa-times ml-1 text-red"></i></a>
         </div>
       </div>
       <!--/.Content-->
     </div>
   </div>


  <!-- <footer class="page-footer pt-0 mt-5 rgba-stylish-light">
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © 2019 Ilham Andrian - 20137300xx
      </div>
    </div>
  </footer> -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>

  <script>
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    $(function () {
      $('#dark-mode').on('click', function (e) {

        e.preventDefault();

        $('footer, .card').toggleClass('dark-card-admin');
        $('body, .navbar').toggleClass('white-skin navy-blue-skin');
        $(this).toggleClass('white text-dark btn-outline-black');
        $('body').toggleClass('dark-bg-admin');
        $('h6, .card, p, td, th, i, li a, h4, input, label').not(
          '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
        $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
        $('.gradient-card-header').toggleClass('white black lighten-4');
        $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');

      });
    });

    $(document).ready(function() {
      $('.mdb-select').materialSelect();
    });

    function launchModal(object_type, name, id){
      var url = "index.php?page=delete_" + object_type + "&id=" + id;
      document.getElementById("content").innerHTML = name; 
      document.getElementById("delete_link").href=url; 
      document.getElementById("modal-button").click()
    }
  </script>

</body>

</html>

<?php
$page = (isset($_GET['page']))? $_GET['page'] : '';
switch($page){
  case 'home':
  include "views/home.php"; 
  break;
  
  case 'matakuliah':
  include "views/matakuliah/matakuliah.php";
  break;

  case 'new_matakuliah':
  include "views/matakuliah/new_matakuliah.php";
  break;
  
  case 'mahasiswa':
  include "views/mahasiswa/mahasiswa.php"; 
  break;

  case 'new_mahasiswa':
  include "views/mahasiswa/new_mahasiswa.php"; 
  break;
  
  case 'ruang':
  include "views/ruang/ruang.php"; 
  break;

  case 'new_ruang':
  include "views/ruang/new_ruang.php"; 
  break;

  case 'mk-mahasiswa':
  include "views/mk_mahasiswa.php"; 
  break;

  case 'mk-jadwal':
  include "views/mk_jadwal.php"; 
  break;

  case 'mahasiswa-mk':
  include "views/mahasiswa_mk.php"; 
  break;

  case 'jadwal':
  include "views/jadwal/jadwal.php"; 
  break;

  case 'new_jadwal':
  include "views/jadwal/new_jadwal.php"; 
  break;

  case 'absensi':
  include "views/absensi/absensi.php"; 
  break;

  case 'absensi_mk':
  include "views/absensi/absensi_mk.php"; 
  break;
  
  default: 
  include "views/home.php";
}
?>
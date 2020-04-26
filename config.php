<?php
$page = (isset($_GET['page']))? $_GET['page'] : '';
switch($page){
  case 'home':
  include "views/home.php"; 
  break;
  
  case 'matakuliah':
  include "views/matakuliah/index.php";
  break;

  case 'edit_matakuliah':
  include "views/matakuliah/edit.php";
  break;

  case 'delete_matakuliah':
  include "views/matakuliah/delete.php";
  break;

  case 'new_matakuliah':
  include "views/matakuliah/new.php";
  break;
  
  case 'mahasiswa':
  include "views/mahasiswa/index.php"; 
  break;

  case 'edit_mahasiswa':
  include "views/mahasiswa/edit.php"; 
  break;

  case 'delete_mahasiswa':
  include "views/mahasiswa/delete.php"; 
  break;

  case 'new_mahasiswa':
  include "views/mahasiswa/new.php"; 
  break;
  
  case 'ruang':
  include "views/ruang/index.php"; 
  break;

  case 'edit_ruang':
  include "views/ruang/edit.php"; 
  break;

  case 'delete_ruang':
  include "views/ruang/delete.php"; 
  break;

  case 'new_ruang':
  include "views/ruang/new.php"; 
  break;

  case 'mk_mahasiswa':
  include "views/mk_mahasiswa/index.php"; 
  break;

  case 'delete_mk_mahasiswa':
  include "views/mk_mahasiswa/delete.php"; 
  break;

  case 'mk-jadwal':
  include "views/mk_jadwal.php"; 
  break;

  case 'mahasiswa_mk':
  include "views/mahasiswa_mk/index.php"; 
  break;

  case 'delete_mahasiswa_mk':
  include "views/mahasiswa_mk/delete.php"; 
  break;

  case 'new_mahasiswa_mk':
  include "views/mahasiswa_mk/new.php"; 
  break;

  case 'jadwal':
  include "views/jadwal/index.php"; 
  break;

  case 'edit_jadwal':
  include "views/jadwal/edit.php"; 
  break;

  case 'delete_jadwal':
  include "views/jadwal/delete.php"; 
  break;

  case 'new_jadwal':
  include "views/jadwal/new.php"; 
  break;

  case 'absensi':
  include "views/absensi/index.php"; 
  break;

  case 'absensi_mk':
  include "views/absensi/absensi_mk.php"; 
  break;

  case 'prodi':
  include "views/prodi/index.php"; 
  break;

  case 'new_prodi':
  include "views/prodi/new.php"; 
  break;

  case 'edit_prodi':
  include "views/prodi/edit.php"; 
  break;

  case 'delete_prodi':
  include "views/prodi/delete.php"; 
  break;



  
  default: 
  include "views/home.php";
}
?>
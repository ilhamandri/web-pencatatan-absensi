<?php
    include '../../connection.php';
	$id   = $_GET['id'];
	$kode = $_POST['kode'];
	$nama = $_POST['nama'];
	$sks  = $_POST['sks'];
	$absent = $_POST['absent'];
	// query SQL untuk insert data
	$query="UPDATE matakuliah SET kode='$kode',nama='$nama',sks=$sks,absent=$absent where id=$id";
	mysqli_query($conn, $query);
	// mengalihkan ke halaman index.php
	header("location:/ilham/index.php?page=matakuliah");
?>
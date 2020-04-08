<?php
	$id   = $_GET['id'];
	$nama = $_POST['nama'];
	$gedung  = $_POST['gedung'];
	$lantai = $_POST['lantai'];
	// query SQL untuk insert data
	$query="UPDATE ruang SET nama='$nama',gedung=$gedung,lantai=$lantai where id=$id";
	mysqli_query($conn, $query);
	// mengalihkan ke halaman index.php
	header("location:/ilham/index.php?page=ruang");
?>
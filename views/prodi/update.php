<?php
    include '../../connection.php';
	$id   = $_GET['id'];
	$nama = $_POST['nama'];
	// query SQL untuk insert data
	$query="UPDATE prodi SET nama='$nama' where id=$id";
	mysqli_query($conn, $query);
	// mengalihkan ke halaman index.php
	header("location:/ilham/index.php?page=prodi");
?>
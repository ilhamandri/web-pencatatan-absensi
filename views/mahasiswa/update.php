<?php
    include '../../connection.php';
	$id   = $_GET['id'];
	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	$prodi_id = $_POST['prodi_id'];
	// query SQL untuk insert data
	$query="UPDATE mahasiswa SET nama='$nama', npm=$npm, prodi_id=$prodi_id where id=$id";
	mysqli_query($conn, $query);
	// mengalihkan ke halaman index.php
	header("location:/ilham/index.php?page=mahasiswa");
?>
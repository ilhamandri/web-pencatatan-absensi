<?php
	$id   = $_GET['id'];
	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	// query SQL untuk insert data
	$query="UPDATE mahasiswa SET nama='$nama', npm=$npm where id=$id";
	mysqli_query($conn, $query);
	// mengalihkan ke halaman index.php
	header("location:/ilham/index.php?page=mahasiswa");
?>
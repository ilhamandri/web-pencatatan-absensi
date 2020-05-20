<?php
    include '../../connection.php';
	$id   = $_GET['id'];
	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$prodi_id = $_POST['prodi_id'];
	// query SQL untuk insert data
	$query="UPDATE mahasiswa SET nama='$nama', npm=$npm, prodi_id=$prodi_id, email=$email, password=$password where id=$id";
	mysqli_query($conn, $query);
	// mengalihkan ke halaman index.php
	header("location:/ilham/index.php?page=mahasiswa");
?>
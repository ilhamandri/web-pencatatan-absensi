<?php
    include '../../connection.php';
	$id   = $_GET['id'];
	$matakuliah_id = $_POST["matakuliah_id"];
  	$hari = $_POST["hari"];
  	$jam_mulai = $_POST["jam_mulai"];
  	$jam_selesai = $_POST["jam_selesai"];
  	$ruang_id = $_POST["ruang_id"];
  	$token = md5(time()."JADWAL");

	// query SQL untuk insert data
	$query="UPDATE jadwal SET matakuliah_id=$matakuliah_id, hari=$hari, jam_mulai=$jam_mulai, jam_selesai=$jam_selesai, ruang_id=$ruang_id, token='$token', last_update=CURRENT_TIMESTAMP where id=$id";
	$sql = mysqli_query($conn, $query);
	header("location:/ilham/index.php?page=jadwal");
?>
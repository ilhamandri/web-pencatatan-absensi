<?php
	$id = $_GET['id'];
	$mahasiswa_id = $_GET['mahasiswa_id'];

	$result = mysqli_query($conn, "DELETE FROM mk_mahasiswa WHERE id=$id");
	
	header("Location: " . "http://localhost/ilham?page=mahasiswa");

?>
<?php
	$id = $_GET['id'];

	$result = mysqli_query($conn, "DELETE FROM prodi WHERE id=$id");
	
	header("Location: " . "http://localhost/ilham?page=prodi");

?>
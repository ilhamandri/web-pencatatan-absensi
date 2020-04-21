<?php

	$id = $_GET['id'];

	$result = mysqli_query($conn, "DELETE FROM jadwal WHERE id=$id");
	
	header("Location: " . "http://localhost/ilham?page=jadwal");

?>
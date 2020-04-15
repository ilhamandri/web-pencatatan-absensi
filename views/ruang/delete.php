<?php

	$id = $_GET['id'];

	$result = mysqli_query($conn, "DELETE FROM ruang WHERE id=$id");
	
	header("Location: " . "http://localhost/ilham?page=ruang");

?>
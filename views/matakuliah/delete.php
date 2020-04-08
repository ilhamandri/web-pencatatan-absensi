<?php

	$id = $_GET['id'];

	$result = mysqli_query($conn, "DELETE FROM matakuliah WHERE id=$id");
	
	header("Location: " . "http://localhost/ilham?page=matakuliah");

?>
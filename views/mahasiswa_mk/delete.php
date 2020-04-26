<?php
	$id = $_GET['id'];
	

	$sql = "SELECT mahasiswa_id FROM mk_mahasiswa WHERE id=".$id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	    	$mahasiswa_id = $row["mahasiswa_id"];
			$result = mysqli_query($conn, "DELETE FROM mk_mahasiswa WHERE id=$id");
			
			header("Location: " . "http://localhost/ilham?page=mahasiswa_mk&id=".$mahasiswa_id);
	    }
	}


?>
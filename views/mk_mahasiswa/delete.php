<?php
	$id = $_GET['id'];

	$sql = "SELECT matakuliah_id FROM mk_mahasiswa WHERE id=".$id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	    	$matakuliah_id = $row["matakuliah_id"];
			$result = mysqli_query($conn, "DELETE FROM mk_mahasiswa WHERE id=$id");
			
			header("Location: " . "http://localhost/ilham?page=mk_mahasiswa&id=".$matakuliah_id);
	    }
	}

?>
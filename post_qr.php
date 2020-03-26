<?php
	include 'check_session.php';
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	 
	// database connection will be here
	

	$mahasiswa_id = $mahasiswa["id"];
	$qr_code = $data["qr_code"];

	$sql = "SELECT jadwal.id AS jadwal_id, matakuliah_id, matakuliah.nama AS nama_matkul, matakuliah.kode AS kode_matkul, ruang.nama AS nama_ruang FROM jadwal JOIN matakuliah ON matakuliah.id = jadwal.matakuliah_id JOIN ruang ON jadwal.ruang_id = ruang.id WHERE token = '$qr_code';";
	$error = "Terjadi kesalahan, silahkan scan ulang qr";
	$data = array();
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	    	$matakuliah_id = $row["matakuliah_id"];
	    	$jadwal_id = $row["jadwal_id"];
	    	$date_today = date("Y-m-d");
	    	$sql2 = "SELECT absensi.* FROM absensi JOIN jadwal ON jadwal.matakuliah_id = absensi.matakuliah_id WHERE mahasiswa_id = $mahasiswa_id AND absensi.matakuliah_id = $matakuliah_id AND DATE(jam) = '$date_today'";
			$result2 = mysqli_query($conn, $sql2);
	    	if (mysqli_num_rows($result2) > 0) {
	    		$error = "Anda sudah melakukan absensi";
	    	}else{
	    		$sql = "INSERT INTO absensi (matakuliah_id, mahasiswa_id, jam) VALUES ($matakuliah_id, $mahasiswa_id, CURRENT_TIMESTAMP)";
	    	if ($conn->query($sql) === TRUE){
	    		$token = md5($matakuliah_id.time());
	    		$sql = "UPDATE jadwal SET token = '$token', last_update = CURRENT_TIMESTAMP WHERE id=$jadwal_id";
	    		if ($conn->query($sql) === TRUE){
		    		$data = array(
			        	"kode" => $row["kode_matkul"],
			        	"nama" => $row["nama_matkul"],
			        	"ruang" => $row["nama_ruang"]
			        );
	    		}
	    	}
	    	}
	    	
	    }
	} 

	mysqli_close($conn);
	if(!empty($data)){
		echo json_encode(array(
    		"STATUS_CODE" => "OK",
			"data" => $data
		));
	}else{
		echo json_encode(array(
    		"STATUS_CODE" => "NOK",
    		"ERROR" => $error
		));
	}

?>
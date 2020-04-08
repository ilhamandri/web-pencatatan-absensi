<?php
	include 'check_session.php';
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	 
	// database connection will be here
	

	$id_mahasiswa = $mahasiswa["id"];
	$id_matakuliah = $data["matakuliah_id"];

	$sql = "SELECT jam, absent, nama FROM absensi LEFT JOIN matakuliah ON absensi.matakuliah_id = matakuliah.id WHERE mahasiswa_id = $id_mahasiswa AND matakuliah_id = $id_matakuliah";
	$result = mysqli_query($conn, $sql);
	$absensi = array();
	$jumlah = 0;
	$total = 0;
	$nama = "";
	if (mysqli_num_rows($result) > 0) {
		$jumlah = mysqli_num_rows($result);
	    while($row = mysqli_fetch_assoc($result)) {
	        $temp = array(
	        	"tanggal" => explode(" ", $row["jam"])[0],
	        	"jam" => explode(" ", $row["jam"])[1]
	        );
	        array_push($absensi, $temp);
	        $total = $row["absent"];
	        $nama = $row["nama"];
	    }
	} 

	mysqli_close($conn);

	if(count($absensi) > 0){
		http_response_code(200);
		$resume = array(
			"jumlah" => $jumlah,
			"total" => (int)$total,
			"nama" => $nama
		);
		echo json_encode(array(
			"resume" => $resume,
			"data" => $absensi
		));
	}else{
		http_response_code(400);
		echo json_encode(array());
	}
?>
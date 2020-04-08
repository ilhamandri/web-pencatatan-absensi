<?php
	include 'check_session.php';
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	 
	// database connection will be here
	$mahasiswa_id = $mahasiswa['id'];
	$sql = "SELECT matakuliah.id AS id, matakuliah.kode AS kode, matakuliah.nama AS nama, matakuliah.sks AS sks FROM matakuliah JOIN mk_mahasiswa ON matakuliah.id = mk_mahasiswa.matakuliah_id WHERE mk_mahasiswa.mahasiswa_id = $mahasiswa_id";
	$result = mysqli_query($conn, $sql);
	$matkul_arr = array();
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	        $temp = array(
	        	"id" => $row["id"],
	        	"kode" => $row["kode"],
	        	"nama" => $row["nama"],
	        	"sks" => $row["sks"]
	        );
	        array_push($matkul_arr, $temp);
	    }
	} 

	mysqli_close($conn);

	if(count($matkul_arr) > 0){
		echo json_encode(array(
    		"STATUS_CODE" => "OK",
			"matakuliah" => $matkul_arr
		));
	}else{
		echo json_encode(array(
    		"STATUS_CODE" => "NOK",
			"mahasiswa" => $mahasiswa,
			"matakuliah" => $matkul_arr
		));
	}
?>
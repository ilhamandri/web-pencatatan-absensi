<?php
	include '../connection.php';

	$data = json_decode(file_get_contents('php://input'), true);

	$token = $data["token"];
	$id_ruang = $data["id_ruang"];

	$days = array(
	    1 => 'Monday',
	    2 => 'Tuesday',
	    3 => 'Wednesday',
	    4 => 'Thursday',
	    5 => 'Friday',
	    6 => 'Saturday',
	    7 => 'Sunday'
	);
	date_default_timezone_set('Asia/Jakarta'); 
	$jam = date("H");
	$hari = array_search (date('l'), $days);

	// $jam = 16;
	// $hari = 1;
	$sql = "SELECT (CURRENT_TIMESTAMP - last_update) AS diff, token, jadwal.id AS id_jadwal, jam_mulai, jam_selesai, matakuliah.nama AS nama_matkul, matakuliah.kode AS kode_matkul, ruang.nama AS nama_ruang FROM jadwal JOIN  matakuliah ON matakuliah.id = jadwal.matakuliah_id JOIN ruang on ruang.id = jadwal.ruang_id WHERE ruang_id = $id_ruang AND jam_mulai <= $jam AND jam_selesai >= $jam AND hari = $hari";
	$result = mysqli_query($conn, $sql);
	$data = array();
	$new_token = "";
	$curr_token = "";
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	    	$curr_token = $row["token"];
	    	$id = $row["id_jadwal"];
	    	$diff = $row["diff"];
	    	$minute = (int)date("i",$diff);
	    	$second = (int)date("s",$diff);
	    	$change = false;
	    	$interval = 30;
	    	if($minute > 0){
	    		$change = true;
	    	}else{
	    		if($second > $interval){
	    			$change = true;
	    		}
	    	}

	    	if($curr_token!=$token){
	    		$change = true;
	    	}

	    	if($change == true){
	    		$token = md5($id_ruang.time());
	    		$sql = "UPDATE jadwal SET token = '$token', last_update = CURRENT_TIMESTAMP WHERE id=$id";
			    if ($conn->query($sql) === TRUE){
			    	$data = array(
			        	"kode" => $row["kode_matkul"],
			        	"nama" => $row["nama_matkul"],
			        	"ruang" => $row["nama_ruang"]
			        );
			    	$new_token = $token;
			    }
			}else{
				$new_token = $curr_token;
			}
	    }
	}else{
		$token = "asd";
	}

	mysqli_close($conn);

	if($new_token != ""){
		echo json_encode(array(
    		"STATUS_CODE" => "OK",
			"token" => $new_token,
			"data" => $data
		));
	}else{
		echo json_encode(array(
    		"STATUS_CODE" => "NOK",
    		"token" => $curr_token
		));
	}
?>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "skripsi";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$data = json_decode(file_get_contents('php://input'), true);

	$token = $data["token"];
	$id_ruang = $data["id_ruang"];

	$jam = 9;
	$sql = "SELECT (CURRENT_TIMESTAMP - last_update) AS diff, token, jadwal.id AS id_jadwal, jam_mulai, jam_selesai, matakuliah.nama AS nama_matkul, matakuliah.kode AS kode_matkul, ruang.nama AS nama_ruang FROM jadwal JOIN  matakuliah ON matakuliah.id = jadwal.matakuliah_id JOIN ruang on ruang.id = jadwal.ruang_id WHERE ruang_id = $id_ruang AND jam_mulai <= $jam AND jam_selesai >= $jam";
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
	    	if($minute > 0){
	    		$change = true;
	    	}else{
	    		if($second > 15){
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
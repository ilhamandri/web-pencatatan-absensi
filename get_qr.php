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

	$jam = 7;
	$sql = "SELECT code, id FROM jadwal WHERE ruang_id = $id_ruang AND jam_mulai < $jam AND jam_selesai > $jam";
	$result = mysqli_query($conn, $sql);
	$matkul_arr = array();
	$new_token = "";
	$curr_token = "";
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	    	$curr_token = $row["code"];
	    	$id = $row["id"];
	    	if($curr_token != $token){
	    		$token = md5($id_ruang.time());
	    		$sql = "UPDATE jadwal SET code = '$token' WHERE id=$id";
			    if ($conn->query($sql) === TRUE){
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
			"token" => $new_token
		));
	}else{
		echo json_encode(array(
    		"STATUS_CODE" => "NOK",
    		"token" => $curr_token
		));
	}
?>
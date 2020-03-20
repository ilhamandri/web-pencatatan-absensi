<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "skripsi";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$session_key = "123456789";

	$data = json_decode(file_get_contents('php://input'), true);

	$token = $data["token"];
	if($token!=""){
		$session_key = $token;
	}


	$mahasiswa = array();
	if($session_key == ""){
		echo json_encode(array(
    		"STATUS_CODE" => "NOK",
			"MESSAGE" => "Silahkan melakukan login."
		));
	}else{
		$sql = "SELECT id, nama, email FROM mahasiswa WHERE session_key = '$session_key'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		        $mahasiswa = array(
		        	"id" => $row["id"],
		        	"nama" => $row["nama"],
		        	"email" => $row["email"]
		        );
		    }
		} else{
			echo json_encode(array(
	    		"STATUS_CODE" => "NOK",
				"MESSAGE" => "Silahkan melakukan login."
			));
		}
	}
?>
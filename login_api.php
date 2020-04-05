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

	$mahasiswa = array();
	
	if($data["email"]!=""){
		$email = $data["email"];
		$password = $data["password"];
		$token = md5($email.$password.date("Y-m-d h:i:sa"));
		$sql = "SELECT npm, mahasiswa.id AS mahasiswa_id, mahasiswa.nama AS nama_mahasiswa, email, prodi.nama AS nama_prodi FROM mahasiswa JOIN prodi ON prodi.id = mahasiswa.prodi_id  WHERE email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		        $mahasiswa = array(
		        	"id" => $row["mahasiswa_id"],
		        	"nama" => $row["nama_mahasiswa"],
		        	"email" => $row["email"],
		        	"npm" => $row["npm"],
		        	"prodi" => $row["nama_prodi"],
		        	"token" => $token
		        );
		    }
		    $mahasiswa_id = $mahasiswa["id"];
		    $sql = "UPDATE mahasiswa SET session_key = '$token' WHERE email='$email'";
		    if ($conn->query($sql) === TRUE) {
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
		    	echo json_encode(array(
		    		"STATUS_CODE" => "OK",
					"mahasiswa" => $mahasiswa
					//"matakuliah" => $matkul_arr
				));
			} else {
				echo json_encode(array("STATUS_CODE" => "NOK", "MESSAGE" => "Terjadi kendala diserver. Token gagal dimuat."));
			}
		} else{
			echo json_encode(array("STATUS_CODE" => "NOK", "MESSAGE" => "Email dan kata sandi tidak sesuai."));
		}
	}else{
		echo json_encode(array("STATUS_CODE" => "NOK", "MESSAGE" => "Terjadi kendala diserver."));
	}

	$conn->close();
?>
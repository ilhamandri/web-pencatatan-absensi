<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	 
	// database connection will be here
	$sql = "SELECT ruang.id AS id, ruang.nama AS nama FROM ruang";
	$result = mysqli_query($conn, $sql);
	$ruang_arr = array();
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	        $temp = array(
	        	"id" => $row["id"],
	        	"nama" => $row["nama"]
	        );
	        array_push($ruang_arr, $temp);
	    }
	} 

	mysqli_close($conn);

	if(count($ruang_arr) > 0){
		echo json_encode(array(
    		"STATUS_CODE" => "OK",
			"matakuliah" => $ruang_arr
		));
	}else{
		echo json_encode(array(
    		"STATUS_CODE" => "NOK",
			"MESSAGE" => "Terjadi kendala diserver."
		));
	}
?>
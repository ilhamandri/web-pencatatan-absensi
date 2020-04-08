<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
          <div class="col-12">
            <div class="card">
            	<?php
            		$mahasiswa_id = (isset($_GET['mahasiswa_id']))? $_GET['mahasiswa_id'] : '';
            		$matakuliah_id = (isset($_GET['matakuliah_id']))? $_GET['matakuliah_id'] : '';

            		$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "skripsi";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					if (!$conn) {
					    die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "SELECT nama, absent FROM matakuliah WHERE id=".$matakuliah_id;
					$result = mysqli_query($conn, $sql);
					$nama_matkul = "";
					$nama_mahasiswa = "";
					$absent = "";
					if (mysqli_num_rows($result) > 0) {
					    while($row = mysqli_fetch_assoc($result)) {
					    	$nama_matkul = $row["nama"];
					    	$absent = (int)$row["absent"];
					    }
					}

					$sql = "SELECT nama FROM mahasiswa WHERE id=".$mahasiswa_id;
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
					    while($row = mysqli_fetch_assoc($result)) {
					    	$nama_mahasiswa = $row["nama"];
					    }
					}

					if ($nama_matkul != ""){
					    echo '<div class="card-header white-text primary-color"><h5 class="font-weight-500 my-1">Daftar Mata Kuliah - '.$nama_matkul.' (' .$nama_mahasiswa.')</h5></div>';
					}else{
						echo '<div class="card-header white-text primary-color"><h5 class="font-weight-500 my-1">Daftar Mata Kuliah</h5></div>';
					}
					$sql = "SELECT jam, mahasiswa.npm AS mahasiswa_npm FROM mahasiswa JOIN absensi ON mahasiswa.id = absensi.mahasiswa_id WHERE absensi.mahasiswa_id = ".$mahasiswa_id." AND absensi.matakuliah_id=".$matakuliah_id;
					$result = mysqli_query($conn, $sql);
					$jumlah = (int)mysqli_num_rows($result);
					$percentage = ($jumlah / $absent) * 100;
					echo "<br> Jumlah Pertemuan : ".$absent;
					echo "<br> Jumlah Absensi : ".$jumlah." (".round($percentage)."%) </p>"
            	?>
              	
              	<div class="card">
		          	<div class="card-body table-responsive">

		            <!-- Table -->
		            	<table class="table">
		              		<thead>
		                		<tr class="blue-grey lighten-4">
		                  			<!-- <th class="th-lg">Mahasiswa</th> -->
		                  			<th class="th-lg">Tanggal</th>
		                  			<th class="th-lg"></th>
		                  			<th></th>
		                		</tr>
			              	</thead>
			              	<tbody>
			              		<?php
									

									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
									        // echo "<td>".$row["mahasiswa_npm"]."</td>";
				                  			echo "<td>".$row["jam"]."</td>";
									    }
									} 

									mysqli_close($conn);
									?>
			              </tbody>
		            	</table>
		            <!-- Table -->

		          	</div>
		        </div>
            </div>
        </div>
    </section>
</div>
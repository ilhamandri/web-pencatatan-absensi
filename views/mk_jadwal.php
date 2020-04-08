<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
          <div class="col-12">
            <div class="card">
            	<?php
            		$matakuliah_id = (isset($_GET['id']))? $_GET['id'] : '';

            		$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "skripsi";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					if (!$conn) {
					    die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "SELECT nama, kode FROM matakuliah WHERE id=".$matakuliah_id;
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    while($row = mysqli_fetch_assoc($result)) {
					    	echo '<div class="card-header white-text primary-color"><h5 class="font-weight-500 my-1">Jadwal - '.$row["nama"].' ( '.$row["kode"].' ) </h5></div>';
					    }
					}else{
						echo '<div class="card-header white-text primary-color"><h5 class="font-weight-500 my-1">Jadwal</h5></div>';
					}
            	?>
              	
              	<div class="card">
		          	<div class="card-body table-responsive">

		            <!-- Table -->
		            	<table class="table">
		              		<thead>
		                		<tr class="blue-grey lighten-4">
		                  			<th class="th-lg">Hari</th>
		                  			<th class="th-lg">Jam</th>
		                  			<th class="th-lg">Jenis</th>
		                  			<th class="th-lg">Ruang</th>
		                  			<th></th>
		                		</tr>
			              	</thead>
			              	<tbody>
			              		<?php
									$sql = "SELECT jadwal.id AS jadwal_id, matakuliah.id AS mk_id, jam_mulai, jam_selesai, hari, ruang.nama AS nama_ruang, ruang.gedung AS gedung, ruang.lantai AS lantai FROM jadwal JOIN matakuliah ON matakuliah.id = jadwal.matakuliah_id JOIN ruang ON ruang.id = jadwal.ruang_id WHERE matakuliah.id = ".$matakuliah_id;
									$result = mysqli_query($conn, $sql);
									$hari = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
									        echo "<td>".$hari[$row["hari"]-1]."</td>";
				                  			echo "<td>".$row["jam_mulai"]."-".$row["jam_selesai"]."</td>";
				                  			echo "<td>".$row["nama_ruang"]." (".$row["gedung"].".".$row["lantai"].")</td>";
				                  			echo "<td>";
				                  			echo "<a href='index.php?page=absensi_mk&jadwal_id=".$row["jadwal_id"]."' class='btn btn-success'> Absensi </a>";
				                  			echo "</td>";
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
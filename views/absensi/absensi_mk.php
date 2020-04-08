<?php
	$jadwal_id = (isset($_GET['jadwal_id']))? $_GET['jadwal_id'] : '';
?>
<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
          <div class="col-12">
            <div class="card">
            	<?php
					$sql = "SELECT matakuliah.nama AS nama_matkul , matakuliah.id AS matakuliah_id FROM jadwal JOIN matakuliah on jadwal.matakuliah_id = matakuliah.id WHERE jadwal.id = $jadwal_id";
					$result = mysqli_query($conn, $sql);
					$nama_matkul = "";
					$matakuliah_id;
					if (mysqli_num_rows($result) > 0) {
					    while($row = mysqli_fetch_assoc($result)) {
					    	$nama_matkul = $row["nama_matkul"];
					    	$matakuliah_id = $row["matakuliah_id"];
					    }
					}

					if ($nama_matkul != ""){
					    echo '<div class="card-header white-text primary-color"><h5 class="font-weight-500 my-1">Daftar Absensi - '.$nama_matkul.'</h5></div>';
					}else{
						echo '<div class="card-header white-text primary-color"><h5 class="font-weight-500 my-1">Daftar Absensi</h5></div>';
					}
            	?>
              	
              	<div class="card">
		          	<div class="card-body table-responsive">

		            <!-- Table -->
		            	<table class="table">
		              		<thead>
		                		<tr class="blue-grey lighten-4">
		                  			<!-- <th class="th-lg">Mahasiswa</th> -->
		                  			<th class="th-lg">NPM</th>
		                  			<th class="th-lg">Tanggal</th>
		                  			<th class="th-lg"></th>
		                  			<th></th>
		                		</tr>
			              	</thead>
			              	<tbody>
			              		<?php
									$sql = "SELECT npm, jam FROM absensi JOIN mahasiswa ON mahasiswa.id = absensi.mahasiswa_id WHERE matakuliah_id = $matakuliah_id;";

									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
									        echo "<td>".$row["npm"]."</td>";
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
<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
          <div class="col-12">
            <div class="card">
            	<?php
            		$mahasiswa_id = (isset($_GET['id']))? $_GET['id'] : '';

            		$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "skripsi";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					if (!$conn) {
					    die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "SELECT nama, npm FROM mahasiswa WHERE id=".$mahasiswa_id;
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    while($row = mysqli_fetch_assoc($result)) {
					    	echo '<div class="card-header white-text primary-color"><h5 class="font-weight-500 my-1">Daftar Mata Kuliah - '.$row["nama"].' ( '.$row["npm"].' ) </h5></div>';
					    }
					}else{
						echo '<div class="card-header white-text primary-color"><h5 class="font-weight-500 my-1">Daftar Mata Kuliah</h5></div>';
					}
            	?>
              	
              	<div class="card">
		          	<div class="card-body table-responsive">

		            <!-- Table -->
		            	<table class="table">
		              		<thead>
		                		<tr class="blue-grey lighten-4">
		                  			<th class="th-lg">Mahasiswa</th>
		                  			<th class="th-lg">Tanggal</th>
		                  			<th class="th-lg"></th>
		                  			<th></th>
		                		</tr>
			              	</thead>
			              	<tbody>
			              		<?php
									$sql = "SELECT mahasiswa.id AS id, matakuliah.id AS mk_id, matakuliah.kode, matakuliah.nama, matakuliah.sks FROM mahasiswa JOIN mk_mahasiswa ON mk_mahasiswa.mahasiswa_id = mahasiswa.id JOIN matakuliah ON matakuliah.id = mk_mahasiswa.matakuliah_id WHERE mahasiswa.id = ".$mahasiswa_id;
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
									        echo "<td>".$row["kode"]."</td>";
				                  			echo "<td>".$row["nama"]."</td>";
				                  			echo "<td>".$row["sks"]."</td>";
				                  			echo "<td>";
				                  			echo "<a href='index.php?page=absensi&mahasiswa_id=".$row["id"]."&matakuliah_id=".$row["mk_id"]."' class='btn btn-primary'> Absensi </a>";
				                  			echo "&nbsp &nbsp";
				                  			echo "<a href='index.php?page=mk-jadwal&id=".$row["id"]."' class='btn btn-success'> Jadwal </a>";
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
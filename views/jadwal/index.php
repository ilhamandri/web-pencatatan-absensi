<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
        	<div class="col-12 text-right">
        		<a href="?page=new_jadwal">
        			<button class="btn btn-warning  text-right">
        				Tambah
        			</button>
        		</a>
        	</div>
          <div class="col-12">
            <div class="card">
              	<div class="card-header white-text primary-color">
                	<h5 class="font-weight-500 my-1">Jadwal Mata Kuliah</h5>
              	</div>
              	<div class="card">
		          	<div class="card-body table-responsive">

		            <!-- Table -->
		            	<table class="table">
		              		<thead>
		                		<tr class="blue-grey lighten-4">
		                  			<th class="th-lg">Kode MatKul</th>
		                  			<th class="th-lg">Nama MatKul</th>
		                  			<th class="th-lg">Hari</th>
		                  			<th class="th-lg">Jam</th>
		                  			<th class="th-lg">Ruang</th>
		                  			<th></th>
		                		</tr>
			              	</thead>
			              	<tbody>
			              		<?php

									$sql = "SELECT jadwal.id as jadwal_id, jam_mulai, jam_selesai, matakuliah.kode AS kode_matkul, matakuliah.nama AS nama_matkul, hari,  ruang.nama AS nama_ruang FROM jadwal JOIN matakuliah on matakuliah.id = jadwal.matakuliah_id JOIN ruang ON ruang.id = jadwal.ruang_id";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
									        echo "<td>".$row["kode_matkul"]."</td>";
				                  			echo "<td>".$row["nama_matkul"]."</td>";
				                  			$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
				                  			echo "<td>".$hari[$row["hari"]]."</td>";
				                  			echo "<td>".$row["jam_mulai"]."-".$row["jam_selesai"]."</td>";
				                  			echo "<td>".$row["nama_ruang"]."</td>";
				                  			echo "<td>";
				                  			echo "<a href='index.php?page=absensi_mk&jadwal_id=".$row["jadwal_id"]."' class='btn btn-primary'> Absensi </a>";
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
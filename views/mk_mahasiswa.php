<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
          <div class="col-12 text-right">
          	<a href="?page=new_mahasiswa_mk&id=<?php echo $_GET['id'] ?>">
    			<button class="btn btn-warning  text-right">
    				Tambah Mahasiswa
    			</button>
    		</a>
          </div>
          <div class="col-12">
            <div class="card">
            	<?php
            		$matakuliah_id = (isset($_GET['id']))? $_GET['id'] : '';
					$sql = "SELECT nama, kode FROM matakuliah WHERE id=".$matakuliah_id;
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    while($row = mysqli_fetch_assoc($result)) {
					    	echo '<div class="card-header white-text primary-color"><h5 class="font-weight-500 my-1">Daftar Mata Kuliah - '.$row["nama"].' ( '.$row["kode"].' ) </h5></div>';
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
		                  			<th class="th-lg">NPM</th>
		                  			<th class="th-lg">Nama</th>
		                  			<th></th>
		                		</tr>
			              	</thead>
			              	<tbody>
			              		<?php
									$sql = "SELECT mahasiswa.id AS id, matakuliah.id AS mk_id, mahasiswa.npm, mahasiswa.nama FROM mahasiswa JOIN mk_mahasiswa ON mk_mahasiswa.mahasiswa_id = mahasiswa.id JOIN matakuliah ON matakuliah.id = mk_mahasiswa.matakuliah_id WHERE matakuliah.id = ".$matakuliah_id;
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
									        echo "<td>".$row["npm"]."</td>";
				                  			echo "<td>".$row["nama"]."</td>";
				                  			echo "<td>";
				                  			echo "<a href='index.php?page=absensi&mahasiswa_id=".$row["id"]."&matakuliah_id=".$row["mk_id"]."' class='btn btn-primary'> Absensi </a>";
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
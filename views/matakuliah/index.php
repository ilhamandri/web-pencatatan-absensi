<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
        	<div class="col-12 text-right">
        		<a href="?page=new_matakuliah">
        			<button class="btn btn-warning  text-right">
        				Tambah
        			</button>
        		</a>
        	</div>
          <div class="col-12">
            <div class="card">
              	<div class="card-header white-text primary-color">
                	<h5 class="font-weight-500 my-1">Data Mata Kuliah</h5>
              	</div>
              	<div class="card">
		          	<div class="card-body table-responsive">

		            <!-- Table -->
		            	<table class="table">
		              		<thead>
		                		<tr class="blue-grey lighten-4">
		                  			<th class="th-lg">Kode</th>
		                  			<th class="th-lg">Nama</th>
		                  			<th class="th-lg">SKS</th>
		                  			<th></th>
		                		</tr>
			              	</thead>
			              	<tbody>
			              		<?php

									$sql = "SELECT id, kode, nama, sks FROM matakuliah";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
									        echo "<td>".$row["kode"]."</td>";
				                  			echo "<td>".$row["nama"]."</td>";
				                  			echo "<td>".$row["sks"]."</td>";
				                  			echo "<td>";
				                  			echo "<a href='index.php?page=edit_matakuliah&id=".$row["id"]."' class='btn btn-warning'> Ubah </a>";
				                  			echo '<button type="button" class="btn btn-danger" onclick="launchModal(\'matakuliah\',\''.$row["nama"].'\', \''.$row["id"].'\')">Hapus</button>';
				                  			echo "<a href='index.php?page=mk-mahasiswa&id=".$row["id"]."' class='btn btn-primary'> Mahasiswa </a> &nbsp&nbsp";
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
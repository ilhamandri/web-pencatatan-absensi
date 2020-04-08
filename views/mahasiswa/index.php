<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
        	<div class="col-12 text-right">
        		<a href="?page=new_mahasiswa">
        			<button class="btn btn-warning  text-right">
        				Tambah
        			</button>
        		</a>
        	</div>
          <div class="col-12">
            <div class="card">
              	<div class="card-header white-text primary-color">
                	<h5 class="font-weight-500 my-1">Data Mahasiswa</h5>
              	</div>
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
									
									$sql = "SELECT id,npm, nama FROM mahasiswa";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
									        echo "<td>".$row["npm"]."</td>";
				                  			echo "<td>".$row["nama"]."</td>";
				                  			echo "<td>";
				                  			echo "<a href='index.php?page=edit_mahasiswa&id=".$row["id"]."' class='btn btn-warning'> Ubah </a> &nbsp";
				                  			echo "<a href='index.php?page=delete_mahasiswa&id=".$row["id"]."' class='btn btn-danger'> Hapus </a> &nbsp";
				                  			echo "<a href='index.php?page=mahasiswa-mk&id=".$row["id"]."' class='btn btn-primary'> Mata Kuliah </a>";
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
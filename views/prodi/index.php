<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
        	<div class="col-12 text-right">
        		<a href="?page=new_prodi">
        			<button class="btn btn-warning  text-right">
        				Tambah
        			</button>
        		</a>
        	</div>
          <div class="col-12">
            <div class="card">
              	<div class="card-header white-text primary-color">
                	<h5 class="font-weight-500 my-1">Data Prodi</h5>
              	</div>
              	<div class="card">
		          	<div class="card-body table-responsive">

		            <!-- Table -->
		            	<table class="table">
		              		<thead>
		                		<tr class="blue-grey lighten-4">
		                  			<th class="th-lg">Nama</th>
		                  			<th class="th-lg"></th>
		                  			<th></th>
		                		</tr>
			              	</thead>
			              	<tbody>
			              		<?php

									$sql = "SELECT id, nama FROM prodi";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
				                  			echo "<td>".$row["nama"]."</td>";
				                  			echo "<td><a href='index.php?page=edit_prodi&id=".$row["id"]."' class='btn btn-warning'> Ubah </a>  &nbsp&nbsp";
				                  			echo '<button type="button" class="btn btn-danger" onclick="launchModal(\'prodi\',\''.$row["nama"].'\', \''.$row["id"].'\')">Hapus</button>';
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
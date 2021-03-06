<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
        	<div class="col-12 text-right">
        		<a href="?page=new_ruang">
        			<button class="btn btn-warning  text-right">
        				Tambah
        			</button>
        		</a>
        	</div>
          <div class="col-12">
            <div class="card">
              	<div class="card-header white-text primary-color">
                	<h5 class="font-weight-500 my-1">Data Ruang</h5>
              	</div>
              	<div class="card">
		          	<div class="card-body table-responsive">

		            <!-- Table -->
		            	<table class="table">
		              		<thead>
		                		<tr class="blue-grey lighten-4">
		                  			<th class="th-lg">Nama</th>
		                  			<th class="th-lg">Gedung</th>
		                  			<th class="th-lg">Lantai</th>
		                  			<th></th>
		                		</tr>
			              	</thead>
			              	<tbody>
			              		<?php

									$sql = "SELECT id, nama, gedung, lantai FROM ruang";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
									        echo "<td>".$row["nama"]."</td>";
				                  			echo "<td>".$row["gedung"]."</td>";
				                  			echo "<td>".$row["lantai"]."</td>";
				                  			echo "<td>";
				                  			echo "<a href='index.php?page=edit_ruang&id=".$row["id"]."' class='btn btn-warning'> Ubah </a>  &nbsp&nbsp";
				                  			echo '<button type="button" class="btn btn-danger" onclick="launchModal(\'ruang\',\''.$row["nama"].'\', \''.$row["id"].'\')">Hapus</button>';
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


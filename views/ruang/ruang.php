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
                	<h5 class="font-weight-500 my-1">Data Mata Kuliah</h5>
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
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "skripsi";
									$conn = mysqli_connect($servername, $username, $password, $dbname);
									if (!$conn) {
									    die("Connection failed: " . mysqli_connect_error());
									}

									$sql = "SELECT id, nama, gedung, lantai FROM ruang";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
									        echo "<td>".$row["nama"]."</td>";
				                  			echo "<td>".$row["gedung"]."</td>";
				                  			echo "<td>".$row["lantai"]."</td>";
				                  			echo "<td>";
				                  			echo "<a href='/?id=".$row["id"]."' class='btn btn-primary'> Detil </a>";
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
<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
          	<div class="col-12">
            	<div class="card">
            		<h5 class="card-header info-color white-text text-center py-4">
				        <strong>Ubah Mahasiswa</strong>
				    </h5>
				    <?php 
						$id = $_GET['id'];
						$query_mysql = mysqli_query($conn,"SELECT * FROM mahasiswa WHERE id='$id'");
						while($data = mysqli_fetch_array($query_mysql)){
					?>
				    <div class="card-body px-lg-5 pt-0">

				        <form class="text-center" style="color: #757575;" action="views/mahasiswa/update.php?id=<?php echo $data['id'] ?>" method="POST">

				            <div class="md-form mt-3">
				                <input type="text" id="materialContactFormName" class="form-control" name="npm" value="<?php echo $data['npm'] ?>" required>
				                <label for="materialContactFormName">NPM</label>
				            </div>

				            <div class="md-form">
				                <input type="text" id="materialContactFormEmail" class="form-control" name="nama" value="<?php echo $data['nama'] ?>" required>
				                <label for="materialContactFormEmail">Nama</label>
				            </div>

				            <div class="md-form">
				                <input type="text" id="materialContactFormEmail" class="form-control" name="email" value="<?php echo $data['email'] ?>" required>
				                <label for="materialContactFormEmail">Email</label>
				            </div>

				            <div class="md-form">
				                <input type="text" id="materialContactFormEmail" class="form-control" name="password" value="<?php echo $data['password'] ?>" required>
				                <label for="materialContactFormEmail">Password</label>
				            </div>

				            <div class="md-form mt-3">
					            <select name="prodi_id" class="mdb-select md-form" searchable="Cari Prodi ..." required>
	  								<?php
	  									$sql = "SELECT nama, id FROM prodi;";
	  									$result = mysqli_query($conn, $sql);
										if (mysqli_num_rows($result) > 0) {
		    								while($row = mysqli_fetch_assoc($result)) {
		    									echo "<option value='".$row["id"]."'>".$row["nama"]."</option>";
		    								}
		    							}
	  								?>
	  							</select>
  							</div>
				            
				            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="submit">Ubah</button>

				        </form>

				    </div>
					<?php } ?>
            	</div>
        	</div>
    	</div>
	</section>
</div>
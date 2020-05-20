<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
          	<div class="col-12">
            	<div class="card">
            		<h5 class="card-header info-color white-text text-center py-4">
				        <strong>Ubah Jadwal</strong>
				    </h5>
				    <?php 
						$id = $_GET['id'];
						$query_mysql = mysqli_query($conn,"SELECT jadwal.id as jadwal_id, jam_mulai, jam_selesai, matakuliah.id AS matkul_id, matakuliah.nama AS nama_matkul, hari,  ruang.id AS ruang_id, ruang.nama AS nama_ruang FROM jadwal JOIN matakuliah on matakuliah.id = jadwal.matakuliah_id JOIN ruang ON ruang.id = jadwal.ruang_id WHERE jadwal.id='$id'");
						while($data = mysqli_fetch_array($query_mysql)){
					?>
				    <div class="card-body px-lg-5 pt-0">

				        <form class="text-center" style="color: #757575;" action="views/jadwal/update.php?id=<?php echo $data['jadwal_id']; ?>" method="POST">

				            <select name="matakuliah_id" class="mdb-select md-form" searchable="Cari Mata Kuliah ..." required>
  								<option value="" disabled selected>Pilih Mata Kuliah</option>
  								<?php
  									$sql = "SELECT nama, id, kode FROM matakuliah;";
  									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result) > 0) {
	    								while($row = mysqli_fetch_assoc($result)) {
	    									if($data['matkul_id'] == $row["id"]){
	    										echo "<option value='".$row["id"]."' selected>".$row["kode"]." - ".$row["nama"]."</option>";
	    									}else{
	    										echo "<option value='".$row["id"]."'>".$row["kode"]." - ".$row["nama"]."</option>";
	    									}
	    								}
	    							}
  								?>
  							</select>

  							<select name="ruang_id" class="mdb-select md-form" searchable="Cari Ruang ..."  required>
  								<option value="" disabled selected>Pilih Ruang</option>
  								<?php
  									$sql = "SELECT id, nama, gedung, lantai FROM ruang;";
  									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result) > 0) {
	    								while($row = mysqli_fetch_assoc($result)) {
	    									if($data['ruang_id'] == $row["id"]){
	    										echo "<option selected value='".$row["id"]."'>".$row["nama"]." - ".$row["gedung"]."-".$row["lantai"]."</option>";
	    									}else{
	    										echo "<option value='".$row["id"]."'>".$row["nama"]." - ".$row["gedung"]."-".$row["lantai"]."</option>";
	    									}
	    								}
	    							}
  								?>
  							</select>

				            <select name="hari" class="mdb-select md-form" required>
							  	<option value="" disabled selected>Pilih Hari</option>
				            	<?php 
				            		$hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumal", "Sabtu"];
				            		echo $data["hari"];
				            		foreach($hari as $key=>$value) {
				            			if(($key+1) == (int)$data["hari"]){
				            				echo '<option value="'.($key+1).'" selected>'.$value.'</option>';
				            			}else{
				            				echo '<option value="'.($key+1).'">'.$value.'</option>';
				            			}
				            		}
				            	?>

							</select>

				            <div class="row">
				            	<div class="col">
				            		<div class="md-form">
						                <input name="jam_mulai"  value="<?php echo $data['jam_mulai']?>" type="number" min="7" id="materialContactFormEmail" class="form-control" name="nama" required="required" max="16">
						                <label for="materialContactFormEmail">Jam Mulai</label>
				            		</div>	
				            	</div>
				            	<div class="col">
				            		<div class="md-form">
						                <input name="jam_selesai" type="number" required="required" min="7" id="materialContactFormEmail" class="form-control" name="nama" value="<?php echo $data['jam_selesai']?>" max="17">
						                <label for="materialContactFormEmail">Jam Selesai</label>
						            </div>
				            	</div>
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
<?php
	$error = false;

	if(isset($_POST['matakuliah_id'])) {
	  	$matakuliah_id = $_POST["matakuliah_id"];
	  	$hari = $_POST["hari"];
	  	$jam_mulai = $_POST["jam_mulai"];
	  	$jam_selesai = $_POST["jam_selesai"];
	  	$ruang_id = $_POST["ruang_id"];
	  	$token = md5(time()."JADWAL");
		$sql = "INSERT INTO jadwal (matakuliah_id, hari, jam_mulai, jam_selesai, ruang_id, token, last_update)
		VALUES ($matakuliah_id, $hari, $jam_mulai, $jam_selesai, $ruang_id,'$token', CURRENT_TIMESTAMP)";
		if(mysqli_query($conn, $sql)){
			header("Location: " . "http://localhost/ilham?page=jadwal");
		}else{
			$error = true;
		}
	}
?>
<div class="container-fluid">
	<?php
		if($error){
	?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Data gagal ditambahkan. </strong> Silahkan memasukkan data secara benar dan lengkap.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php
		}
	?>
    <section class="pb-3">
        <div class="row">
          	<div class="col-12">
            	<div class="card">
            		<h5 class="card-header info-color white-text text-center py-4">
				        <strong>Tambah Jadwal</strong>
				    </h5>

				    <div class="card-body px-lg-5 pt-0">

				        <form class="text-center" style="color: #757575;" action="" method="POST">

				            <select name="matakuliah_id" class="mdb-select md-form" searchable="Cari Mata Kuliah ..." required>
  								<option value="" disabled selected>Pilih Mata Kuliah</option>
  								<?php
  									$sql = "SELECT nama, id, kode FROM matakuliah;";
  									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result) > 0) {
	    								while($row = mysqli_fetch_assoc($result)) {
	    									echo "<option value='".$row["id"]."'>".$row["kode"]." - ".$row["nama"]."</option>";
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
	    									echo "<option value='".$row["id"]."'>".$row["nama"]." - ".$row["gedung"]."-".$row["lantai"]."</option>";
	    								}
	    							}
  								?>
  							</select>

				            <select name="hari" class="mdb-select md-form" required>
							  <option value="" disabled selected>Pilih Hari</option>
							  <option value="1">Senin</option>
							  <option value="2">Selasa</option>
							  <option value="3">Rabu</option>
							  <option value="4">Kamis</option>
							  <option value="5">Jumat</option>
							  <option value="6">Sabtu</option>

							</select>

				            <div class="row">
				            	<div class="col">
				            		<div class="md-form">
						                <input name="jam_mulai" type="number" min="7" max="16" id="materialContactFormEmail" class="form-control" name="nama" required="required">
						                <label for="materialContactFormEmail">Jam Mulai</label>
				            		</div>	
				            	</div>
				            	<div class="col">
				            		<div class="md-form">
						                <input name="jam_selesai" type="number" max="17" required="required" min="7" id="materialContactFormEmail" class="form-control" name="nama">
						                <label for="materialContactFormEmail">Jam Selesai</label>
						            </div>
				            	</div>
				            </div>
				            
				            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="submit">Tambah</button>

				        </form>

				    </div>

            	</div>
        	</div>
    	</div>
	</section>
</div>
<?php
	$error = false;

	if(isset($_POST['matakuliah_id'])) {
	  	$matakuliah_id = $_POST["matakuliah_id"];
	  	$mahasiswa_id = $_POST["mahasiswa_id"];
		$sql = "INSERT INTO mk_mahasiswa (matakuliah_id, mahasiswa_id)
		VALUES ($matakuliah_id, $mahasiswa_id)";
		if(mysqli_query($conn, $sql)){
			header("Location: " . "http://localhost/ilham?page=matakuliah");
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
				        <strong>Tambah Matakuliah ke Mahasiswa</strong>
				    </h5>

				    <div class="card-body px-lg-5 pt-0">

				        <form class="text-center" style="color: #757575;" action="" method="POST">

				            <select name="matakuliah_id" class="mdb-select md-form" required>
  								<?php
  									$mk = "";
  									$mk_id = $_GET['id'];
  									$sql = "SELECT nama, id, kode FROM matakuliah WHERE id=$mk_id;";
  									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result) > 0) {
	    								while($row = mysqli_fetch_assoc($result)) {
	    									echo "<option value='".$row["id"]."' selected>".$row["kode"]." - ".$row["nama"]."</option>";
	    								}
	    							}
  								?>
  							</select>

  							<select name="mahasiswa_id" class="mdb-select md-form" searchable="Cari Mahasiswa ..."  required>
  								<option value="" disabled selected>Pilih Mahasiswa</option>
  								<?php
  									$sql = "SELECT id, nama, npm FROM mahasiswa;";
  									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result) > 0) {
	    								while($row = mysqli_fetch_assoc($result)) {
	    									echo "<option value='".$row["id"]."'>".$row["nama"]." - ".$row["npm"]."</option>";
	    								}
	    							}
  								?>
  							</select>
				            
				            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="submit">Tambah</button>

				        </form>

				    </div>

            	</div>
        	</div>
    	</div>
	</section>
</div>
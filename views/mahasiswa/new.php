<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "skripsi";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$error = false;

	if(isset($_POST['npm'])) {
	  	$npm = $_POST["npm"];
	  	$name = $_POST["nama"];
	  	$email = $_POST["email"];
	  	$password = $_POST["password"];
		$sql = "INSERT INTO mahasiswa (nama, npm, email, password)
		VALUES ('$name', $npm, '$email', ,'$password')";
		if(mysqli_query($conn, $sql)){
			echo "DATA BERHASIL DISIMPAN!";
			header("Location: " . "http://localhost/ilham?page=mahasiswa");
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
				        <strong>Tambah Mahasiswa</strong>
				    </h5>

				    <div class="card-body px-lg-5 pt-0">

				        <form class="text-center" style="color: #757575;" action="" method="POST">

				            <div class="md-form mt-3">
				                <input type="text" id="materialContactFormName" class="form-control" name="npm">
				                <label for="">NPM</label>
				            </div>

				            <div class="md-form">
				                <input type="text" id="materialContactFormEmail" class="form-control" name="nama">
				                <label for="">Nama</label>
				            </div>

				            <div class="md-form mt-3">
				                <input type="email" id="materialContactFormName" class="form-control" name="email">
				                <label for="">Email</label>
				            </div>

				            <div class="md-form mt-3">
				                <input type="password" id="" class="form-control" name="password">
				                <label for="">Kata Sandi</label>
				            </div>
				            
				            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="submit">Tambah</button>

				        </form>

				    </div>

            	</div>
        	</div>
    	</div>
	</section>
</div>
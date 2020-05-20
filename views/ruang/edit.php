<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
          	<div class="col-12">
            	<div class="card">
            		<h5 class="card-header info-color white-text text-center py-4">
				        <strong>Ubah Ruang</strong>
				    </h5>
				    <?php 
						$id = $_GET['id'];
						$query_mysql = mysqli_query($conn,"SELECT * FROM ruang WHERE id='$id'");
						while($data = mysqli_fetch_array($query_mysql)){
					?>
				    <div class="card-body px-lg-5 pt-0">

				        <form class="text-center" style="color: #757575;" action="views/ruang/update.php?id=<?php echo $data['id'] ?>" method="POST">

				            <div class="md-form">
				                <input type="text" id="materialContactFormEmail" class="form-control" name="nama" value="<?php echo $data['nama'] ?>" required>
				                <label for="materialContactFormEmail">Nama</label>
				            </div>

				            <div class="md-form">
				                <input type="number" id="materialContactFormEmail" class="form-control" name="gedung" min=0 value="<?php echo $data['gedung'] ?>" required>
				                <label for="materialContactFormEmail">Gedung</label>
				            </div>

				            <div class="md-form">
				                <input type="number" id="materialContactFormEmail" class="form-control" name="lantai" min=0  value="<?php echo $data['lantai'] ?>" required>
				                <label for="materialContactFormEmail">Lantai</label>
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
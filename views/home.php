<div class="container-fluid">
    <section class="pb-3">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                    <div class="col-6 text-left">
                        <h5>
                            Selamat Datang, <?php echo $nama ?>!
                        </h5>
                    </div>
                    <div class="col-6 text-right" onload="startTime()">
                        <div id="txt"></div>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                	<div class="col-6 text-center">
                		<a href="index.php?page=matakuliah" class="btn btn-primary">
                			Daftar Mata Kuliah
                		</a>
                	</div>
                	<div class="col-6 text-center">
                		<a href="index.php?page=mahasiswa" class="btn btn-primary">
                			Daftar Mahasiswa
                		</a>
                	</div>
                	<div class="col-4 text-center">
                        <a href="index.php?page=ruang" class="btn btn-primary">
                            Daftar Ruang
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <a href="index.php?page=jadwal" class="btn btn-primary">
                            Daftar Jadwal
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <a href="index.php?page=jadwal" class="btn btn-primary">
                            Daftar Prodi
                        </a>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </section>
</div>
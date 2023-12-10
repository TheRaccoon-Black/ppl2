<div class="card">
  <p>Selamat datang,
    <?= $this->session->userdata('nama') ?>!
  </p>

  <!-- <a href="http://beritacoding.test/index.php/coba/c/" style="width: 200px;margin-left:10px" class="btn btn-block btn-success">tambah +</a> -->
  <!-- <?= json_encode($users) ?> -->
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
          <div class="inner">
            <h3>
              <?= $jumser ?>
            </h3>
            <p>Jumlah user</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
          <div class="inner">
            <h3>Rp
              <?= number_format($uangK) ?>
            </h3>
            <p>Uang keluar</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
          <div class="inner">
            <h3>Rp<?=number_format($uangM)?></h3>
            <p>Uang Masuk</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>nama</th>
          <th>username</th>
          <!-- <th>foto</th> -->
          <th>email</th>
          <th>Edit</th>
          <th>Hapus</th>
        </tr>
      </thead>
      <?php $no = 1;
      foreach ($user as $us):
        ?>
        <tbody>
          <tr>
            <!-- <td><?= $no++ ?></td> -->
            <td>
              <?= $us['id_user'] ?>
            </td>
            <td>
              <?= $us['nama'] ?>
            </td>
            <td>
              <?= $us['username'] ?>
            </td>
            <td>
              <?= $us['email'] ?>
            </td>
            <!-- <td><img src="http://beritacoding.test/foto_uploads/<?= $us['foto'] ?>" style="width:30px;heigth:30px;" class="gambar"></td> -->
            <td><a href="<?= base_url('index.php/admin/u/') . $us['id_user'] ?>" class="btn btn-warning btn-sm"><i
                  class="fa fa-edit"></i></a></td>
            <td><a href="<?= base_url('index.php/admin/d/') . $us['id_user'] ?>" class="btn btn-danger btn-sm"><i
                  class="fa fa-trash"></i></a></td>
          </tr>
        </tbody>
      <?php endforeach ?>
    </table>
  </div>
</div>
<style>
  .gambar {
    max-width: 100%;
    /* Maksimum lebar gambar dalam kontainer */
    transition: transform 0.3s;
    /* Animasi perubahan ukuran */
  }

  .gambar.diperbesar {
    transform: scale(20);
    /* Perbesar gambar menjadi 1.5 kali ukuran aslinya */
  }
</style>
<script>
  // Dapatkan semua elemen gambar dengan class "gambar"
  const gambarElements = document.querySelectorAll('.gambar');

  // Tambahkan event listener untuk setiap gambar
  gambarElements.forEach(function (gambar) {
    gambar.addEventListener('click', function () {
      gambar.classList.toggle('diperbesar');
    });
  });
</script>
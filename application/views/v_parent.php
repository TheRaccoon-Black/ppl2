<?php $user_id = $this->session->userdata('id');
$nama = $this->session->userdata('nama');
?>

<?php if (isset($error_message)): ?>
    <div class="alert alert-danger">
        <?= $error_message ?>
    </div>
<?php endif ?>

<p>Selamat datang, id
    <?= $user_id ?> dan user
    <?= $nama ?>!
</p>

<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Tambah Kategori
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form inside modal -->
                <form action="<?= base_url('index.php/parentkat/tambah') ?>" method="post">
                    <input type="hidden" name="id_user" value="<?= $user_id ?>">
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" name="kategoriParent" class="form-control" placeholder="Alokasi gaji ">
                    </div>
                    <div class="form-group">
                        <label>Alokasi(dalam persentase)</label>
                        <input type="text" name="persentase" class="form-control" placeholder="Masukkan Persentase">
                    </div>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Rest of your code -->

<div class="row mt-5">
    <div class="col-8">
        <!-- Kategori -->
        <div class="card card-row card-primary">
            <div class="card-header">
                <h3 class="card-title">Kategori</h3>
            </div>
            <div class="card-body" style="max-height: 600px; overflow-y: auto;">
                <?php foreach ($kategoriPar as $par): ?>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title">
                                        <?= $par['kategori_parent'] ?>
                                    </h5>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <h5 class="card-title ml-auto  ">
                                        <?= $par['persentase'] ?> %
                                    </h5>
                                </div>
                            </div>
                            <!-- Add your card tools or actions here if needed -->
                            <!-- <div class="card-tools">
                <a href="<?= base_url('index.php/kategori/delete/') . $par['id_parent'] ?>" class="btn btn-tool btn-link"><i class="fas fa-trash"></i></a>
                <a href="<?= base_url('index.php/kategori/update/') . $par['id_parent'] ?>" class="btn btn-tool"><i class="fas fa-pen"></i></a>
            </div> -->
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>

    <!-- <div class="col-4"> -->
    <!-- Kategori Pengeluaran -->
    <!-- <div class="card card-row card-secondary">
            <div class="card-header">
                <h3 class="card-title">Kategori Pengeluaran</h3>
            </div>
            <div class="card-body" style="max-height: 280px; overflow-y: auto;">
                <?php foreach ($keluar as $out): ?>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">
                                <?= $out['namaKategori'] ?>
                            </h5>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div> -->

    <!-- Kategori Pemasukkan -->
    <!-- <div class="card card-row card-secondary">
            <div class="card-header">
                <h3 class="card-title">Kategori Pemasukkan</h3>
            </div>
            <div class="card-body" style="max-height: 260px; overflow-y: auto;">
                <?php foreach ($masuk as $in): ?>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">
                                <?= $in['namaKategori'] ?>
                            </h5>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div> -->
</div>
</div>
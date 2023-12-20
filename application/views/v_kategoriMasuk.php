<?php $user_id = $this->session->userdata('id');
// $nama = $this->session->userdata('username'); 
$nama = $this->session->userdata('nama');
?>
<?php if (isset($error_message)): ?>
    <div class="alert alert-danger">
        <?= $error_message ?>
    </div>
<?php endif ?>


<div class="row mb-4">
    <form action="<?= base_url('index.php/kategori/tambah') ?>" method="post" class="col-12">
        <div class="form-row">
            <div class="col-8">
                <input type="hidden" name="id_user" value="<?= $user_id ?>">
                <input type="hidden" name="Deskripsi" value="pemasukkan">
                <input type="hidden" name="keluar" value="<?php foreach ($parent as $pr): echo $pr["id_parent"]; endforeach ?>">
                <input type="text" name="namaKategori" class="form-control" placeholder="Kategori baru">
            </div>
            <div class="col-2">
                <input type="submit" class="form-control btn btn-success" value="Tambah">
            </div>
        </div>
    </form>
</div>


<div class="row mb-4">
    <div class="col-8">

        <div class="card card-row card-primary">
            <div class="card-header">
                <h3 class="card-title">Kategori</h3>
            </div>
            <div class="card-body" style="max-height: 600px; overflow-y: auto;">
                <?php foreach ($kategori as $us): ?>
                    <div class="card card-primary card-outline d-flex">
                        <div class="card-header">
                            <h5 class="card-title">
                                <?= $us['namaKategori'] ?>
                            </h5>
                            <h5 class="card-title ml-auto">
                                [
                                <?= $us['kategori_parent'] ?>]
                            </h5>
                            <div class="card-tools">
                                <a href="<?= base_url('index.php/kategori/delete/') . $us['id_kategori'] ?>"
                                    class="btn btn-tool btn-link"><i class="fas fa-trash"></i></a>
                                <a href="<?= base_url('index.php/kategori/update/') . $us['id_kategori'] ?>"
                                    class="btn btn-tool"><i class="fas fa-pen"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <div class="col-4">
        <!-- Kategori Pengeluaran -->
        <div class="card card-row card-secondary">
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
        </div>

        <!-- Kategori Pemasukkan -->
        <div class="card card-row card-secondary">
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
        </div>
    </div>
</div>
</div>
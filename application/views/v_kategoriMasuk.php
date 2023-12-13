<?php $user_id = $this->session->userdata('id');
// $nama = $this->session->userdata('username'); 
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

<form action="<?= base_url('index.php/kategori/tambah') ?>" method="post">
    <div class="row mb-2">
        <div class="col">
            <input type="hidden" name="id_user" value="<?= $user_id ?>">
            <input type="hidden" name="Deskripsi" value="pemasukkan">
            <input type="text" name="namaKategori" class="form-control" placeholder="Kategori baru">
        </div>
        <!-- <div class="col">
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-input " name="Deskripsi" value="pengeluaran" checked="">Pengeluaran

                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="control-input" name="Deskripsi" value="Pemasukkan">Pemasukkan
                </div>
            </div>
        </div> -->
        <div class="col"><select class="form-control" name="keluar">
            <?php foreach ($parent as $pr):?>
            <option value="<?= $pr['id_parent']?>"> <?=$pr['kategori_parent']?></option>
            <?php endforeach?>
        </select></div>
        <div class="col"><input type="submit" style="width: 190px;margin-left:10px" class="btn btn-block btn-success"
                value="tambah">
        </div>
        <div class="col"></div>
</form>
<a href="parentkat"><div class="col btn btn-lg btn-primary mb-4" style="padding:-10px;"> + Parent kategori
        </div></a>
</div>
<div class="row">
    <div class="col-8">
        <!-- Kategori -->
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
                                [<?= $us['kategori_parent'] ?>]
                            </h5>
                            <div class="card-tools">
                                <a href="<?= base_url('index.php/kategori/delete/').$us['id_kategori']?>" class="btn btn-tool btn-link"><i class="fas fa-trash"></i></a>
                                <a href="<?= base_url('index.php/kategori/update/').$us['id_kategori']?>" class="btn btn-tool"><i class="fas fa-pen"></i></a>
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

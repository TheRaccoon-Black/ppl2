<div class="container-fluid">
    <div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
    <div>
        <h3 class="card-title">Tujuan keuangan</h3>
    </div>
    <div class="ml-auto">
        <a href="<?= base_url('index.php/menu/tujuan/tambah') ?>" class="btn btn-primary">Tambah transaksi</a>
    </div>
</div>


        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Tujuan(Goal)</th>
                        <th>Terkumpul sekarang</th>
                        <th>Total yang dibutuhkan</th>
                        <th>Progress</th>
                        <th style="width: 40px">Label</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tujuan as $goal):?>
                    <tr>
                        <td>no</td>
                        <td><?= $goal['tujuan_keuangan']?></td>
                        <td>Rp<?= number_format($goal['uang_sekarang'],0,',','.')?></td>
                        <td>Rp<?= number_format($goal['jumlah_dibutuhkan'],0,',','.')?></td>
                        <td>
                        <div class="progress progress-xs">
    <div class="progress-bar progress-bar-danger" style="width: <?= $goal['uang_sekarang'] / $goal['jumlah_dibutuhkan'] * 100 ?>%   "></div>
</div>

                        </td>
                        <td><span class="badge bg-primary"><?= number_format($goal['uang_sekarang'] / $goal['jumlah_dibutuhkan'] * 100, 2) ?>
%</span></td>
                    </tr>
                    <?php endforeach;?>
                    <tr>
                        <td>2.</td>
                        <td>Dana beli baju</td>
                        <td>Rp1.400.000</td>
                        <td>Rp2.000.000</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-warning" style="width: 70%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-warning">70%</span></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Sepatu Baru</td>
                        <td>Rp600.000</td>
                        <td>Rp2.000.000</td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-primary">30%</span></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Modal Ngedate</td>
                        <td>Rp1.800.000</td>
                        <td>Rp2.000.000</td>    
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-success" style="width: 90%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-success">90%</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
    </div>
</div>
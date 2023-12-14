<section class="content">
    <div class="container-fluid"><!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <h1 class="mb-5 ml-3"><strong>Selamat Datang
            <?php echo ucfirst($this->session->userdata('username')); ?> di Uang.KU!
        </strong></h1>

    <div class="container-fluid center" style="margin-bottom: 100px;">
        <div class="row" style="height: 200px;">
            <div class="col-lg-6 col-12">
                <div class="small-box bg-info" style="height: 200px;">
                    <div class="inner" style="height: 175px;">
                        <p>Saldo</p>
                        <!-- tes -->


                        <!-- tes -->
                        <!-- <?= var_dump($pemasukkan_kategori); ?> -->
                        <h3>Rp
                            <?= number_format($total_m, 0, ',', '.') ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="small-box bg-danger" style="height: 200px;">
                    <div class="inner" style="height: 175px;">
                        <p>Pengeluaran </p>
                        <h3>Rp
                            <?= number_format($total_k, 0, ',', '.') ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-3 justify-content-around">
    <?php foreach($par as $p):?>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success d-flex justify-content-between">
                <div class="inner">
                    <h3><?=$p['persentase']?>%</h3>
                    <h3>Rp<?= number_format((($p['persentase']*$total_m)/100), 0, ',', '.') ?></h3>
                    <p>Alocated for <?=$p['kategori_parent'] ?></p>
                    <?php
                    foreach($per as $pr):
                    ?>
                    <p><?php
                    if($p['kategori_parent']==$pr['kategori_parent']){
                        echo ("Rp".number_format(((($p['persentase']*$total_m)/100)-$pr["jum"]), 0, ',', '.')." tersisa<br>");
                        echo "Terpakai ".number_format((($pr["jum"])/(($p['persentase']*$total_m)/100)*100), 0, ',', '.')."%";
                        
                    }else{}
                    ?></p>
                    <?php endforeach?>
                    
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php endforeach?>  
</div>

        <div class="row mt-5" height="200px">
            <div class="col col-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pemasukkan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChartMasuk" class="mx-auto"
                            style="min-height: 250px; max-height: 250px; max-width: 100%; width: 80%;"></canvas>
                    </div>

                </div>
            </div>
            <div class="col col-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pengeluaran</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChartKeluar" class="mx-auto"
                            style="min-height: 250px; max-height: 250px; max-width: 100%; width: 80%;"></canvas>
                    </div>

                </div>
            </div>
        </div>


        <script src="<?= base_url('assets/templates') ?>/plugins/jquery/jquery.min.js"></script>

        <script src="<?= base_url('assets/templates') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="<?= base_url('assets/templates') ?>/plugins/chart.js/Chart.min.js"></script>

        <script>
            var pieChartCanvas = $('#pieChartKeluar').get(0).getContext('2d');
            var pengeluaranData = <?= json_encode($pengeluaran_kategori) ?>;

            var pieData = {
                labels: pengeluaranData.map(item => item.namaKategori),
                datasets: [{
                    data: pengeluaranData.map(item => item.jumlah_transaksi),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800'],
                }]
            };

            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }

            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            });

        </script>
        <script>
            var pieChartCanvas = $('#pieChartMasuk').get(0).getContext('2d');
            var pemasukkanData = <?= json_encode($pemasukkan_kategori) ?>;

            var pieData = {
                labels: pemasukkanData.map(item => item.namaKategori),
                datasets: [{
                    data: pemasukkanData.map(item => item.jumlah_transaksi),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800'],
                }]
            };

            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }

            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            });

        </script>
    </div>
</div>
</section>
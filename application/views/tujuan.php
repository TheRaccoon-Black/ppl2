<div class="container-fluid">
    <div class="card">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 class="card-title">Tujuan keuangan</h3>
            </div>
            <div class="ml-auto">
                <a href="<?= base_url('index.php/menu/tujuan/tambah') ?>" class="btn btn-primary">Tambah Goal</a>
            </div>
        </div>


        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Tujuan(Goal)</th>
                        <th>Terkumpul sekarang</th>
                        <th>Total yang dibutuhkan</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal</th>
                        <th>Hitung Mundur</th>
                        <th style="width:30px">Progress</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($tujuan as $goal):
                        // Menghitung selisih antara tanggal target dan tanggal sekarang
                        $tanggalTarget = new DateTime($goal['tanggal_target']);
                        $tanggalSekarang = new DateTime();
                        $selisih = $tanggalSekarang->diff($tanggalTarget);

                        // Mendapatkan tahun, bulan, dan hari dari selisih
                        $tahun = $selisih->y;
                        $bulan = $selisih->m;
                        $hari = $selisih->d;
                        ?>
                        <tr>
                            <td>
                                <?= $no++ ?>
                            </td>
                            <td>
                                <?= $goal['tujuan_keuangan'] ?>
                            </td>
                            <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#updateModal<?= $goal['id_rencana'] ?>">Rp
                                    <?= number_format($goal['uang_sekarang'], 0, ',', '.') ?>
                                </button>
                            </td>
                            <td>Rp
                                <?= number_format($goal['jumlah_dibutuhkan'], 0, ',', '.') ?>
                            </td>
                            <td>
                                <?= date('d/m/Y', strtotime($goal['tanggal_buat'])) ?>
                            </td>
                            <td>
                                <?= date('d/m/Y', strtotime($goal['tanggal_target'])) ?>
                            </td>
                            <td>
                                <?= $tahun ?> y
                                <?= $bulan ?> m
                                <?= $hari ?> d
                            </td>
                            <td>
                                <?php $persen = number_format($goal['uang_sekarang'] / $goal['jumlah_dibutuhkan'] * 100, 2);
                                $warna = "danger";
                                if ($persen >= 90) {
                                    $warna = "primary";
                                } elseif ($persen >= 60) {
                                    $warna = "success";
                                } elseif ($persen >= 30) {
                                    $warna = "warning";
                                } else {
                                    $warna = "danger";
                                }


                                ?>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: <?= $persen ?>%;   ">
                                        <span class="badge bg-<?= $warna ?>">
                                            <?= $persen ?>
                                            %
                                        </span>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                    data-target="#myModal">Detail</button>
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- konten modal-->
                                        <div class="modal-content">
                                            <!-- heading modal -->
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Detail pembagian gaji</h4>
                                            </div>
                                            <!-- body modal -->
                                            <div class="modal-body">
                                                <div class="card card-row card-secondary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">progress </h3>
                                                    </div>
                                                    <div class="card-body" style="max-height: 280px; overflow-y: auto;">
                                                        <?php for ($i = 1; $i <= 10; $i++): ?>
                                                            <div class="card card-primary card-outline">
                                                                <div class="card-header">
                                                                    <h5 class="card-title">
                                                                        <?= "Proses ke " . $i ?>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        <?php endfor; ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- footer modal -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="updateModal<?= $goal['id_rencana'] ?>" class="modal fade" role="dialog">
                                    <!-- ... (modal code remains unchanged) ... -->
                                    <div class="modal-dialog">
                                        <!-- body modal -->
                                        <div class="modal-content">
                                            <div class="modal-body">
                                            <form id="formUpdate<?= $goal['id_rencana'] ?>"
      action="<?= base_url('index.php/menu/tujuan/update/' . $goal['id_rencana']) ?>"
      method="post">
    <label for="uang_sekarang">Terkumpul Sekarang</label>
    <input type="number" class="form-control" id="uang_sekarang<?= $goal['id_rencana'] ?>"
           name="uang_sekarang" value="<?= $goal['uang_sekarang'] ?>" required min="<?= $goal['uang_sekarang'] ?>">
    <button type="submit" class="btn btn-primary">Update</button>
</form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ... (modal code remains unchanged) ... -->
                                </div>

                            </td>
                        </tr>
                    <?php endforeach; ?>
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
<script>
    $(document).ready(function () {
        var rows = $('.table tbody tr');
        var rowsPerPage = 10;
        var totalPages = Math.ceil(rows.length / rowsPerPage);
        var currentPage = 1;

        showPage(currentPage);

        $('#pagination').twbsPagination({
            totalPages: totalPages,
            visiblePages: 5,
            onPageClick: function (event, page) {
                currentPage = page;
                showPage(currentPage);
            }
        });

        function showPage(page) {
            var start = (page - 1) * rowsPerPage;
            var end = start + rowsPerPage;

            rows.hide();
            rows.slice(start, end).show();
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var formUpdate = document.getElementById("formUpdate<?= $goal['id_rencana'] ?>");
        formUpdate.addEventListener("submit", function (event) {
            var uangSekarang = parseFloat(document.getElementById("uang_sekarang<?= $goal['id_rencana'] ?>").value);

            // Validasi: Uang sekarang hanya dapat ditambah
            if (uangSekarang < <?= $goal['uang_sekarang'] ?>) {
                alert("Error: Uang sekarang hanya dapat ditambah!");
                event.preventDefault(); // Mencegah pengiriman formulir jika validasi gagal
            }
        });
    });
</script> 

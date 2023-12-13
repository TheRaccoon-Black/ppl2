<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h2 class="m-0 text-dark">Laporan Uang Keluar</h2>
                <p class="m-0 text-muted">Filter berdasarkan bulan dan tahun:</p>
                <form action="" method="post" class="form-inline">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="bulan" class="sr-only">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <option value="all">Semua Data</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                            <!-- Tambahkan opsi untuk bulan lainnya -->
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tahun" class="sr-only">Tahun</label>
                        <input type="text" name="tahun" id="tahun" class="form-control" placeholder="Tahun">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Filter</button>
                </form>
            </div>
            <div>
                <a href="laporan/tambahkeluar" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>

        <?php foreach ($transaksi as $tanggal => $data): ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?= date('d-m-Y', strtotime($tanggal)) ?>
                    </h3>
                    <div class="card-tools"></div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Transaksi</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                                <tr>
                                    <td>
                                        <?= $item['transaksi'] ?>
                                    </td>
                                    <td>
                                        <?= $item['kategori'] ?>
                                    </td>
                                    <td>
                                        <?= $item['jumlah'] ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
        <button onclick="printPageAsPDF()">Print as PDF</button>
    </div><!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        // Fungsi generasi PDF
        function generatePDF() {
            let doc = new jsPDF('p', 'pt', 'a4');
            // Tambahkan logika untuk menambahkan konten PDF

            // Contoh: Tambahkan teks ke PDF
            doc.text('Hello, this is an auto-generated PDF!', 20, 20);

            // Simpan PDF dengan nama file
            doc.save('auto_generated.pdf');
        }

        // Panggil fungsi generasi PDF saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', function () {
            generatePDF();
        });
    </script>
</section>
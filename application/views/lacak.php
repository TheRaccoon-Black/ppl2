<section class="content">
    <div class="container-fluid">
        <div class="d-flex flex-row-reverse mb-5">
            <a href="" class="btn btn-primary">Tambah Data</a>
        </div>

        <?php foreach ($transaksi as $tanggal => $data): ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= date('d-m-Y', strtotime($tanggal)) ?></h3>
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
                                    <td><?= $item['transaksi'] ?></td>
                                    <td><?= $item['kategori'] ?></td>
                                    <td><?= $item['jumlah'] ?></td>
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

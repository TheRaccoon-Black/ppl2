<?php $user_id = $this->session->userdata('id') ?>
<?= $this->session->userdata("username") ?>
<div class="card card-primary">
    <!-- <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
        <div class="d-flex flex-row-reverse">
            <a href="http://localhost/ppl2/index.php/kategori" class="btn btn-secondary">Tambah Kategori</a>
        </div>
    </div> -->
    <!-- /.card-header -->
    <!-- form start -->
    <?php echo form_open_multipart(); 
    $kini = date('Y/m/d');
    ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_user" value="<?= $user_id ?>">
        <input type="hidden" name="tgl_sekarang" id="tgl_sekarang_input" value="<?= $kini ?>">
<script>
    // Ambil nilai tanggal dari input
    let tglSekarangInput = document.getElementById('tgl_sekarang_input');
    let tglSekarangValue = tglSekarangInput.value;

    // Split tanggal menjadi array [yyyy, mm, dd]
    let dateParts = tglSekarangValue.split('/');

    // Buat format baru: yyyy-mm-dd
    let formattedTanggal = dateParts[0] + '-' + dateParts[1] + '-' + dateParts[2];

    // Setel nilai tanggal yang telah diformat ke input
    tglSekarangInput.value = formattedTanggal;
</script>
        <input type="hidden" name="jumlah_sekarang" value="<?=0?>">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Tujuan(goal)</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_goal" placeholder="Nama Goal">
            </div>
            <div class="form-group">
                <label>Tanggal Target</label>
                <div class="input-group" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control" name="tanggal" placeholder="DD-MM-YYYY">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

            <!-- Pastikan jQuery dan datetimepicker sudah dimuat -->

            <div class="form-group">
                <label for="exampleInputPassword1">Jumlah dibutuhkan(Rp)</label>
                <input type="text" class="form-control" name="jumlah" id="exampleInputPassword1" placeholder="Jumlah" oninput="formatNumber(this)">
            </div>
            <script>
                function formatNumber(input) {
                    // Hilangkan karakter selain digit
                    let value = input.value.replace(/\D/g, '');

                    // Format angka dengan menambahkan titik setiap 3 digit
                    value = new Intl.NumberFormat('id-ID').format(value);

                    // Update nilai input
                    input.value = value;

                    // Hapus titik sebelum mengirim ke database
                    let rawValue = value.replace(/\./g, '');

                    // Kembalikan nilai tanpa titik
                    return rawValue;
                }

                // Menangkap event submit form
                document.querySelector('form').addEventListener('submit', function() {
                    // Cari elemen input jumlah
                    let inputJumlah = document.querySelector('[name="jumlah"]');

                    // Ambil nilai raw (tanpa titik) dari input jumlah
                    let rawValue = inputJumlah.value.replace(/\./g, '');

                    // Setel nilai tanpa titik ke input
                    inputJumlah.value = rawValue;
                     // Konversi format tanggal sebelum mengirim ke server
    let inputTanggal = document.querySelector('[name="tanggal"]');
    let tanggalValue = inputTanggal.value;

    // Split tanggal menjadi array [dd, mm, yyyy]
    let dateParts = tanggalValue.split('-');

    // Buat format baru: yyyy-mm-dd
    let formattedTanggal = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];

    // Setel nilai tanggal yang telah diformat ke input
    inputTanggal.value = formattedTanggal;
                });
            </script>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" value="simpan">Submit</button>
        </div>
    </form>
</div>
<?php $user_id = $this->session->userdata('id') ?>
<?= $this->session->userdata("username") ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php echo form_open_multipart(); ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_user" value="<? php ?>">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Transaksi</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_user"
                    placeholder="Masukkan User" value="<? php ?>">
            </div>
            <div class="form-group">
                <label for="kategori">kategori</label>
                <select class="form-control" name="kategori">
                    <?php foreach ($kategori as $kat): ?>
                        <option value="<?= $kat['id_kategori']; ?>">
                            <?= $kat["namaKategori"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                  <label>Tanggal</label>
                    <div class="input-group" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

            <!-- Pastikan jQuery dan datetimepicker sudah dimuat --> 
<script>
    $(document).ready(function () {
        // Datepicker initialization
        $('#reservationdate').datepicker({
            format: 'DD/MM/YYYY',  // Set your desired display format
        });

        // Optional: If you want to capture the selected date and convert it to another format
        $('#reservationdate').on('change.datepicker', function (e) {
            let selectedDate = e.date.format('YYYY-MM-DD');
            // You can use 'selectedDate' to send to the server or update other elements.
            console.log(selectedDate);
        });
    });
</script>

            <div class="form-group">
                <label for="exampleInputPassword1">Jumlah(Rp)</label>
                <input type="text" class="form-control" name="jumlah" id="exampleInputPassword1"
                    placeholder="Password" oninput="formatNumber(this)" value="<?php ?>">
            </div>
            <script>
                function formatNumber(input) {
                    // Hilangkan karakter selain digit
                    let value = input.value.replace(/\D/g, '');

                    // Format angka dengan menambahkan titik setiap 3 digit
                    value = new Intl.NumberFormat('id-ID').format(value);

                    // Update nilai input
                    input.value = value;
                }

                
            </script>
            <!-- <script>
    // Fungsi untuk mengonversi format tanggal
    function convertDateFormat(inputDate) {
        // Split tanggal menjadi array [dd, mm, yyyy]
        var parts = inputDate.split('/');
        
        // Gabungkan kembali dengan format yyyy/mm/dd
        return parts[2] + '/' + parts[1] + '/' + parts[0];
    }

    // Menangani perubahan nilai pada input tanggal
    document.getElementById('reservationdate').addEventListener('input', function () {
        var inputValue = this.value;
        
        // Jika nilai input tidak kosong
        if (inputValue.trim() !== '') {
            // Konversi format tanggal
            var convertedDate = convertDateFormat(inputValue);
            
            // Set nilai input kembali dengan format baru
            this.value = convertedDate;
        }
    });
</script> -->
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" value="simpan">Submit</button>
        </div>
    </form>
</div>
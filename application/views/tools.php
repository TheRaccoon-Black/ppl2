<!-- tools.php -->
<!-- Tambahkan jQuery (pastikan Anda sudah menyertakan jQuery di halaman Anda) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Tangani pengiriman formulir menggunakan AJAX
        $('form').submit(function (e) {
            e.preventDefault(); // Mencegah formulir untuk melakukan submit standar
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    // Tampilkan modal dengan hasil konversi
                    $('#conversionModal .modal-body').html(response);
                    $('#conversionModal').modal('show');
                }
            });
        });
    });
</script>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card p-4">
                <h2>Kalkulator Konversi Mata Uang</h2>

                <form action="<?= base_url('index.php/menu/tools/convertCurrency') ?>" method="post">
                    <div class="form-group">
                        <label for="amount">Jumlah:</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="from_currency">Dari Mata Uang:</label>
                        <select class="form-control" id="from_currency" name="from_currency" required>
                            <option value="IDR">IDR (Indonesian Rupiah)</option>
                            <option value="USD">USD (United States Dollar)</option>
                            <option value="EUR">EUR (Euro)</option>
                            <option value="GBP">GBP (British Pound Sterling)</option>
                            <option value="JPY">JPY (Japanese Yen)</option>
                            <option value="AUD">AUD (Australian Dollar)</option>
                            <option value="CAD">CAD (Canadian Dollar)</option>
                            <option value="CHF">CHF (Swiss Franc)</option>
                            <option value="CNY">CNY (Chinese Yuan)</option>
                            <option value="SEK">SEK (Swedish Krona)</option>
                            <option value="NZD">NZD (New Zealand Dollar)</option>
                            <option value="SGD">SGD (Singapore Dollar)</option>
                            <option value="INR">INR (Indian Rupee)</option>
                            <option value="BRL">BRL (Brazilian Real)</option>
                            <option value="ZAR">ZAR (South African Rand)</option>
                            <option value="RUB">RUB (Russian Ruble)</option>
                            <option value="TRY">TRY (Turkish Lira)</option>
                            <option value="KRW">KRW (South Korean Won)</option>
                            <option value="MXN">MXN (Mexican Peso)</option>
                            <option value="MYR">MYR (Malaysian Ringgit)</option>
                            <option value="PHP">PHP (Philippine Peso)</option>
                            <option value="THB">THB (Thai Baht)</option>
                            <option value="VND">VND (Vietnamese Dong)</option>
                            <option value="ARS">ARS (Argentine Peso)</option>
                            <option value="EGP">EGP (Egyptian Pound)</option>
                            <option value="NOK">NOK (Norwegian Krone)</option>
                            <option value="DKK">DKK (Danish Krone)</option>
                            <option value="ILS">ILS (Israeli New Shekel)</option>
                            <option value="KWD">KWD (Kuwaiti Dinar)</option>
                            <option value="QAR">QAR (Qatari Riyal)</option>
                            <option value="SAR">SAR (Saudi Riyal)</option>
                            <!-- Tambahkan pilihan mata uang lainnya sesuai kebutuhan -->
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="to_currency">Ke Mata Uang:</label>
                        <select class="form-control" id="to_currency" name="to_currency" required>
                            <option value="USD">USD (United States Dollar)</option>
                            <option value="EUR">EUR (Euro)</option>
                            <option value="GBP">GBP (British Pound Sterling)</option>
                            <option value="JPY">JPY (Japanese Yen)</option>
                            <option value="AUD">AUD (Australian Dollar)</option>
                            <option value="CAD">CAD (Canadian Dollar)</option>
                            <option value="CHF">CHF (Swiss Franc)</option>
                            <option value="CNY">CNY (Chinese Yuan)</option>
                            <option value="SEK">SEK (Swedish Krona)</option>
                            <option value="NZD">NZD (New Zealand Dollar)</option>
                            <option value="SGD">SGD (Singapore Dollar)</option>
                            <option value="INR">INR (Indian Rupee)</option>
                            <option value="BRL">BRL (Brazilian Real)</option>
                            <option value="ZAR">ZAR (South African Rand)</option>
                            <option value="RUB">RUB (Russian Ruble)</option>
                            <option value="TRY">TRY (Turkish Lira)</option>
                            <option value="KRW">KRW (South Korean Won)</option>
                            <option value="IDR">IDR (Indonesian Rupiah)</option>
                            <option value="MXN">MXN (Mexican Peso)</option>
                            <option value="MYR">MYR (Malaysian Ringgit)</option>
                            <option value="PHP">PHP (Philippine Peso)</option>
                            <option value="THB">THB (Thai Baht)</option>
                            <option value="VND">VND (Vietnamese Dong)</option>
                            <option value="ARS">ARS (Argentine Peso)</option>
                            <option value="EGP">EGP (Egyptian Pound)</option>
                            <option value="NOK">NOK (Norwegian Krone)</option>
                            <option value="DKK">DKK (Danish Krone)</option>
                            <option value="ILS">ILS (Israeli New Shekel)</option>
                            <option value="KWD">KWD (Kuwaiti Dinar)</option>
                            <option value="QAR">QAR (Qatari Riyal)</option>
                            <option value="SAR">SAR (Saudi Riyal)</option>
                            <!-- Tambahkan pilihan mata uang lainnya sesuai kebutuhan -->
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary" data-toggle="modal"
                        data-target="#conversionModal">Konversi</button>
                </form>
            </div>
        </div>
        <!-- Kalkulator Pajak Indonesia -->
        <div class="col-md-6">
            <div class="card p-4">
                <h2>Kalkulator Pajak Indonesia</h2>

                <form action="<?= base_url('index.php/menu/tools/calculateIndonesianTax') ?>" method="post">
                    <div class="form-group">
                        <label for="income">Pendapatan Tahunan:</label>
                        <input type="number" class="form-control" id="income" name="income" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Hitung Pajak</button>
                </form>
            </div>

        </div>
        <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <h2>Gold API Results</h2>

            </div>
        </div>
    </div>
</div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="conversionModal" tabindex="-1" role="dialog" aria-labelledby="conversionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="conversionModalLabel">Hasil Konversi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if (isset($conversion_rate) && isset($converted_amount)): ?>
                        <p>Nilai Tukar:
                            <?= $conversion_rate ?>
                        </p>
                        <p>Jumlah yang Dikonversi:
                            <?= number_format($converted_amount, 0, ',', '.') ?>
                            <?= number_format($to_currency, 0, ',', '.')?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
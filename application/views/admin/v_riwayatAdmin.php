<section>
    <h1>Log Riwayat</h1>
<table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <!-- <th>NO</th> -->
          <th>Id</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <!-- <th>foto</th> -->
          <th>Jumlah</th>
          <th>Jenis</th>
          
        </tr>
      </thead>
      <?php $no = 1;
      foreach($transaksi as $tr):
        ?>
        <tbody>
          <tr>
            <td><?= $tr->id_user ?></td>
            <td>
              <?= $tr->username ?>
            </td>
            <td>
              <?=$tr->tanggal ?>
            </td>
            <td>
              Rp<?=number_format($tr->jumlah,0,',','.')?>
            </td>
            <td>
                <?=$tr->Deskripsi?>
            </td>
          </tr>
        </tbody>
        <?php endforeach?>
    </table>
</section>
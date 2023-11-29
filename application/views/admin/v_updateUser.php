<?php 
if(empty($user)){
    $id_user = $nama = $username = $email = "";
}else{
    $id_user = $user['id_user'];
    $nama = $user['nama'];
    $username = $user['username'];
    $email = $user['email'];
}
?>   
   
   <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?=$hal?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php echo form_open_multipart(); ?>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?= $id_user?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>ID User</label>
                        <input type="text" class="form-control" name="id_user"
                            placeholder="<?= $id_user?>" value="<?= $id_user?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                            placeholder="Masukkan nama user" value="<?= $nama?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputPassword1"
                            placeholder="username" value="<?= $username?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputPassword1"
                            placeholder="email" value="<?= $email?>">
                    </div>
                    <!-- <img src="http://beritacoding.test/foto_uploads/<?=$img?>" width="300px">
                    <div class="form-group">
                        <label for="">foto</label>
                        <input type="file" class="form-control" name="gambar" id="exampleInputPassword1"
                            placeholder="foto" required>
                    </div> -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" value="simpan">Submit</button>
                </div>
            </form>
        </div>
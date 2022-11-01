<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Foto Barang <?= $barang->nama_barang ?></h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Sukses!';
                echo $this->session->flashdata('pesan');
                echo '</h5> </div>';
            };

            ?>

            <?php
            //notifikasi form masih kosong
            echo validation_errors('<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5> </div>');

            //notifikasi form masih kosong
            if (isset($error_upload)) {
                echo '<div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5> </div>';
            }
            echo form_open_multipart('') ?>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Keterangan Gambar</label>
                        <input name="ket" class="form-control" placeholder="Keterangan Gambar" value="<?= set_value('ket') ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="preview_gambar" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/no_image.jpg') ?>" id="gambar_load" width="200px">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="<?= base_url('fotobarang') ?>" class="btn btn-success btn-sm"> Kembali </a>
            </div>

            <?php echo form_close() ?>

            <div class="row">
                <?php foreach ($gambar as $key => $value) { ?>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <img src="<?= base_url('assets/fotogambar/'.$value->gambar) ?>" id="gambar_load" width="250px">
                        </div>
                        <a href="<?= base_url('fotobarang') ?>" class="btn btn-danger btn-sm btn-block"><i class="fas fa-trash"> Delete </i> </a>
                    </div>
                <?php } ?>
            </div>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<script>
    function bacagambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacagambar(this)
    });
</script>
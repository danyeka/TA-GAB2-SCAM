<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <div class="card">
        <div class="card-body" style="width: 70%; margin-bottom: 80px">
            <form action="<?= base_url('/admin/PotonganGaji/tambah_data_aksi') ?>" method="post">
                <div class="form-group">
                    <label">Jenis Potongan</label>
                    <input type="text" name="jenis_potongan" class="form-control">
                    <?= form_error('jenis_potongan', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label">Jumlah Potongan</label>
                    <input type="number" name="jumlah_potongan" class="form-control">
                    <?= form_error('jumlah_potongan', '<div class="text-small text-danger"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
            </form>
        </div>
    </div>

</div>
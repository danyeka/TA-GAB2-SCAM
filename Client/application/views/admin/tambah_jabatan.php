<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <div class="card">
        <div class="card-body" style="width: 70%; margin-bottom: 80px">
            <form action="<?= base_url('/admin/DataJabatan/tambah_data_aksi') ?>" method="post">
                <div class="form-group">
                    <label">Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" class="form-control">
                    <?= form_error('nama_jabatan', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control">
                    <?= form_error('gaji_pokok', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label">Tunjangan Transportasi</label>
                    <input type="number" name="tj_transport" class="form-control">
                    <?= form_error('tj_transport', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label">Uang Makan</label>
                    <input type="number" name="uang_makan" class="form-control">
                    <?= form_error('uang_makan', '<div class="text-small text-danger"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
            </form>
        </div>
    </div>

</div>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/PotonganGaji/tambah_data') ?>">
        <i class="fas fa-plus"> Tambah Data</i>
    </a>

    <?= $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="margin-bottom: 100px">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Potongan</th>
                <th>Jumlah Potongan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Jenis Potongan</th>
                <th>Jumlah Potongan</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>

            <?php $no = 0; foreach($potongan_gaji as $j){ $no++ ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $j->potongan ?></td>
                    <td><?= 'Rp. ' . number_format($j->jml_potongan, 0 , ',', '.') ?></td>
                    <td>
                        <center>
                            <a class="btn btn-sm btn-primary" href="<?= base_url('admin/PotonganGaji/update_data/' . $j->id) ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/PotonganGaji/delete_data/' . $j->id) ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </center>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</div>
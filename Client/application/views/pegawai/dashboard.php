<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <div class="alert alert-success font-weight-bold mb-4">Selamat datang, Anda login sebagai pegawai.</div>

    <div class="card" style="margin-bottom: 120px;">
        <div class="card-header font-weight-bold bg-primary text-white">
            Data Pegawai
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <img style="width:250px" src="<?= base_url('ext/photo/' . $pegawai[0]->photo) ?>">
                </div>

                <div class="col-md-7">
                    <table class="table">
                        <tr>
                            <td>Nama Pegawai</td>
                            <td>:</td>
                            <td><?= $pegawai[0]->nama_pegawai ?></td>
                        </tr>

                        <tr>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td><?= $pegawai[0]->jabatan ?></td>
                        </tr>

                        <tr>
                            <td>Tanggal Masuk</td>
                            <td>:</td>
                            <td><?= $pegawai[0]->tanggal_masuk ?></td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?= $pegawai[0]->status ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
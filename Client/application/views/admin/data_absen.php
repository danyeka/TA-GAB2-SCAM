<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Absen Pegawai
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2 mr-2">
                    <label>Bulan: </label>
                    <select name="bulan" class="form-control ml-2">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">July</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">Novembar</option>
                        <option value="12">Desember</option>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label>Tahun: </label>
                    <select name="tahun" class="form-control ml-2">
                        <option value="">--Pilih Tahun--</option>
                        <?php for($i=2020; $i<date('Y')+5; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2 ml-auto mr-2">
                    <i class="fas fa-eye"> Tampilkan Data</i>
                </button>

                <a class="btn btn-success mb-2" href="<?= base_url('admin/DataAbsen/tambah_data') ?>">
                    <i class="fas fa-plus"> Tambah Data</i>
                </a>
            </form>
        </div>
    </div>

    <?php 
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantaun = $bulan . $tahun;
        }
    ?>

    <div class="alert alert-info">
        Menampilkan Data Kehadiran Pegawai Bulan: <span class="font-weight-bold"><?= $bulan ?></span> Tahun: <span class="font-weight-bold"><?= $tahun ?></span>
    </div>

    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="margin-bottom: 100px">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Alpa</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Alpa</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $no = 0; foreach($absen as $j){ $no++ ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $j->nik ?></td>
                    <td><?= $j->nama_pegawai ?></td>
                    <td><?= $j->jenis_kelamin ?></td>
                    <td><?= $j->jabatan ?></td>
                    <td><?= $j->hadir ?></td>
                    <td><?= $j->sakit ?></td>
                    <td><?= $j->alpha ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</div>
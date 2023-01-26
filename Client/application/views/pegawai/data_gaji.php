<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="margin-bottom: 100px">
            <thead>
                <tr>
                    <th>Bulan / Tahun</th>
                    <th>Gaji Pokok</th>
                    <th>Tj. Transportasi</th>
                    <th>Uang Makan</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th>Cetal Slip</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Bulan / Tahun</th>
                    <th>Gaji Pokok</th>
                    <th>Tj. Transportasi</th>
                    <th>Uang Makan</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th>Cetal Slip</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $no = 0; foreach($gaji as $j){ 
                    $no++; 
                    $potongan = $potongan_gaji * $j->alpha;
                    $total = $j->gaji_pokok + $j->tj_transport + $j->uang_makan - $potongan;
                     ?>
                    <tr>
                        <td><?= $j->bulan ?></td>
                        <td><?= 'Rp.' . number_format($j->gaji_pokok, 0, ',', '.') ?></td>
                        <td><?= 'Rp.' . number_format($j->tj_transport, 0, ',', '.') ?></td>
                        <td><?= 'Rp.' . number_format($j->uang_makan, 0, ',', '.') ?></td>
                        <td><?= 'Rp.' . number_format($potongan, 0, ',', '.') ?></td>
                        <td><?= 'Rp.' . number_format($total, 0, ',', '.') ?></td>
                        <td>
                            <center>
                            <a class="btn btn-sm btn-primary" href="#">
                                <i class="fas fa-print"></i>
                            </a>
                        </center>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>
<!-- File: app/Views/Backend/Transaksi/data-peminjaman.php -->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard-admin') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li>Transaksi</li>
            <li class="active">Data Peminjaman</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Transaksi Peminjaman Buku
                    <a href="<?= base_url('admin/peminjaman-step1') ?>" class="btn btn-primary btn-sm pull-right" style="margin-top:-5px;">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Transaksi Peminjaman
                    </a>
                </div>
                <div class="panel-body">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <table class="table table-striped table-bordered table-hover" 
                           data-toggle="table" 
                           data-search="true" 
                           data-show-refresh="true" 
                           data-show-toggle="true" 
                           data-show-columns="true" 
                           data-pagination="true"
                           data-page-list="[10, 25, 50, 100, ALL]"
                           data-sort-name="tgl_pinjam"
                           data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="no_peminjaman" data-sortable="true">No. Peminjaman</th>
                                <th data-field="nama_anggota" data-sortable="true">Nama Anggota</th>
                                <th data-field="tgl_pinjam" data-sortable="true">Tgl Pinjam</th>
                                <th data-field="total_pinjam" data-sortable="true">Total Buku</th>
                                <th data-field="daftar_judul_buku" data-sortable="false">Judul Buku</th>
                                <th data-field="status_transaksi" data-sortable="true">Status Transaksi</th>
                                <th data-field="status_ambil_buku" data-sortable="true">Status Ambil Buku</th>
                                <th data-field="nama_admin" data-sortable="true">Admin</th>
                                <th data-field="qr_code" data-sortable="false" data-formatter="qrCodeFormatter">QR Code</th>
                                <th data-field="opsi" data-sortable="false">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($data_peminjaman) && !empty($data_peminjaman)) : ?>
                                <?php foreach ($data_peminjaman as $transaksi) : ?>
                                    <tr>
                                        <td><?= esc($transaksi['no_peminjaman']) ?></td>
                                        <td><?= esc($transaksi['nama_anggota']) ?></td> <!-- Asumsi dari join -->
                                        <td><?= date('d-m-Y', strtotime(esc($transaksi['tgl_pinjam']))) ?></td>
                                        <td><?= esc($transaksi['total_pinjam']) ?></td>
                                        <td><?= esc($transaksi['daftar_judul_buku']) ?></td>
                                        <td>
                                            <?php if ($transaksi['status_transaksi'] == 'Berjalan') : ?>
                                                <span class="label label-warning">Berjalan</span>
                                            <?php elseif ($transaksi['status_transaksi'] == 'Selesai') : ?>
                                                <span class="label label-success">Selesai</span>
                                            <?php else: ?>
                                                <span class="label label-default"><?= esc($transaksi['status_transaksi']) ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= esc($transaksi['status_ambil_buku']) ?></td>
                                        <td><?= esc($transaksi['nama_admin']) ?></td> <!-- Asumsi dari join -->
                                        <td>
                                            <?php if (!empty($transaksi['qr_code'])) : ?>
                                                <img src="<?= base_url('Assets/qr_code/' . esc($transaksi['qr_code'])) ?>" alt="QR Code" style="width:60px; height:60px;">
                                            <?php else : ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/detail-transaksi-peminjaman/' . $transaksi['no_peminjaman']) ?>" class="btn btn-info btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span> Lihat Detail
                                            </a>
                                            <!-- Tambahkan tombol lain jika perlu, mis. Selesaikan Transaksi -->
                                            <?php if ($transaksi['status_transaksi'] == 'Berjalan') : ?>
                                                <!-- <a href="<?= base_url('admin/form-pengembalian/' . $transaksi['no_peminjaman']) ?>" class="btn btn-success btn-xs" style="margin-top:5px;">
                                                    <span class="glyphicon glyphicon-check"></span> Proses Pengembalian
                                                </a> -->
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="10" class="text-center">Belum ada data transaksi peminjaman.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div><!--/.main-->

<!-- Panggil Bootstrap Table JS dan CSS jika belum di template utama -->
<link rel="stylesheet" href="<?= base_url('Assets/bootstrap-table/bootstrap-table.min.css') ?>">
<script src="<?= base_url('Assets/bootstrap-table/bootstrap-table.min.js') ?>"></script>

<script>
    // $(function() {
    //     $('table').bootstrapTable(); // Inisialisasi semua tabel dengan data-toggle="table"
    // });

    function qrCodeFormatter(value, row) {
        if (row.qr_code) {
            return '<img src="<?= base_url('Assets/qr_code/') ?>' + row.qr_code + '" style="width:60px; height:60px;" />';
        }
        return '-';
    }
</script>
<?=$this->extend('layouts_admin/template_admin')?>

<?= $this->section('content')?>
    <!-- content wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1>Data Pendaftaran Mahasiswa Baru</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Tabel Data Pendaftaran Mahasiswa Baru
                                    </h3>
                                </div>
                                <div class="card-body table-responsiv">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Pendaftaran</th>
                                                <th>Nama peserta</th>
                                                <th>Prodi </th>
                                                <th>Tanggal Pendaftaran </th>
                                                <th>Status </th>
                                                <th>Aksi </th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <!-- end content wrapper -->
<?= $this->endSection()?>

<?= $this->section('script')?>
<?= $this->endSection()?>
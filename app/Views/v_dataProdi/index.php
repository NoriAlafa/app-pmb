<?=$this->extend('layouts_admin/template_admin')?>

<?=$this->section('content')?>
    <!-- content wrapper -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Data Prodi <?=$nama_fakultas;?></h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- modal add -->
                        <?php include 'add.php';?>
                        <!-- default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Tabel Data Prodi <?=$nama_fakultas;?>
                                </h3>
                                <div class="card-tools">
                                    <a data-toggle='tooltip' data-placement='top' title='Add'>
                                        <button id="addBankSoal" type='button' class='btn btn-outline-primary btn-sm' data-toggle='modal' data-target='#modalAdd'>
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- modal edit -->
        <?php include 'edit.php';?>
    </div>
<?=$this->endSection()?>
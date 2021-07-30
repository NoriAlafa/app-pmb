<?=$this->extends('layouts_admin/template_admin')?>

<?=$this->section('content')?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col sm-12">
                        <h1>Data Fakultas</h1>
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
                        <?php include 'add.php'; ?>
                        <!-- default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Data Fakultas</h3>
                                <div class="card-tools">
                                    <a data-toogle='tooltip' data-placement='top' title='Add'>
                                        <button class='btn btn-outline-primary btn-sm' id='addBankSoal' type='button' data-toggle='modal' data-target='#modalAdd'>
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
                                            <th>Nama Fakultas</th>
                                            <th>Aksi</th>
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
        <!-- modal edit -->
        <?php include 'edit.php'?>
    </div>
<?=$this->endSection()?>

<?=$this->section('script')?>
    <script>
        $(document).ready(function(){
            // menapilkan data fakultas
            $('#example1').DataTable({
                "responsive":true,
                "autoWidth" :false,
                "processing":true,
                "serverSide":true,
                "order"     :[],
                "ajax"      :{
                    "url"   :"datafakultas/ajaxDataFakultas",
                    "type"  :"POST"
                },
                "columnDefs":[{
                    "target":[0],
                    "orderable":false
                }]
            });
            
        });
    </script>
<?=$this->endSection()?>
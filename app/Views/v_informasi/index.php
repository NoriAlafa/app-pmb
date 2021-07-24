<?=$this->extend('layouts_admin/template_admin')?>

<?=$this->section('content')?>
    <!-- Content Wrapper -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Informasi Pendaftaran Mahasiswa Baru</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Table Informasi Pendaftaran Mahasiswa Baru
                        </h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Pembukaan Pendaftaran</th>
                                    <th>Tanggal Penutupan Pendaftaran</th>
                                    <th>Tanggal Pengumuman Lunas Administrasi</th>
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
    </section>

    <!-- Modal Edit -->
    <?php include 'edit.php'; ?>
<?=$this->endSection()?>

<?=$this->section('script')?>
<script>
    $(document).ready(function(){
        // Menampilkan informasi (Data-table-server-side)
        $('#example1').DataTable({
            "responsive" : true,
            "autoWidth"  : false,
            "processing" : true,
            "serverSide" : true,
            "order"      : [],
            "ajax"       :{
                "url"    :"informasi/ajaxInformasi",
                "type"   :"POST"
            },
            "columnDefs" :[{
                "target" :[0],
                "orderable":false
            }] 
        });
    });
</script>
<?=$this->endSection()?>
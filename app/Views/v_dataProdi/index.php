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

<?=$this->section('script')?>
    <script>
        <?php $link = base_url('dataprodi/ajaxDataProdi/'.$id_fakultas);?>
        $(document).ready(function(){
            // menampilkan data prodi (dataTable server-side)
            $('#example1').DataTable({
                "responsive":true,
                "autoWidth":false,
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url:"<?= $link;?>",
                    "type":"POST"
                },
                "columnDefs":[{
                    "target":[0],
                    "orderable":false
                }]
            });

            // save input data prodi
            $("#btn-saveDataProdi").on('click',function(){
                const formInput = $('#formInputDataProdi');
                $.ajax({
                    url         :"<?= base_url('dataprodi/add') ?>",
                    method      :"POST",
                    data        :formInput.serialize(),
                    dataType    :"JSON",
                    success     :function(data){
                        // data error
                        if(data.error){
                            if(data.nama_prodi_error['nama_prodi']!=''){
                                $('#nama_prodi_error').html(data.nama_prodi_error['nama_prodi']);
                            }else{
                                $('#nama_prodi_error').html('');
                            }
                        }
                        // data fakultas berhasil disimpan
                        if(data.success){
                            formInput.trigger('reset');
                            $('#modalAdd').modal('hide');
                            $('#nama_prodi_error').html('');
                            $('#example1').DataTable().ajax.reload();
                            toastr.success('Data Prodi Berhasil DiSimpan');
                        }
                    }
                });
            });

            // menampilkan modal edit data prodi
            $('body').on('click','.btn-editProdi',function(){
                const idProdi = $(this).attr('value');
                $.ajax({
                    url         :"<?=site_url('dataprodi/ajaxUpdate/')?>" + idProdi,
                    type        :"GET",
                    dataType    :"JSON",
                    success     :function(data){
                        $('[name="idProdi"]').val(data.id);
                        $('[name="nama_prodi2"]').val(data.nama_prodi);
                        $('#modalEdit').modal('show');
                    }
                });
            });

            // Save update data prodi
        });
    </script>
<?=$this->endSection()?>
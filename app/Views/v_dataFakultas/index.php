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
            
            // save input data fakultas
            $('#btn-saveDataFakultas').on('click',function(){
                const formInput = $('#formInputDataFakultas');
                $.ajax({
                    url         :"datafakultas/add",
                    method      :"POST",
                    data        :formInput.serialize(),
                    dataType    :"JSON",
                    success     :function(data){
                        // data error
                        if(data.error){
                            if(data.nama_fakultas_error['nama_fakultas'] != ''){
                                $('#nama_fakultas_error').html(data.nama_fakultas_error['nama_fakultas']);
                            }else{
                                $('#nama_fakultas_error').html('');
                            }
                        }
                    // data tdk error
                    if(data.success){
                        formInput.trigger('reset');
                        $('#modalAdd').modal(hide);
                        $('#nama_fakultas_error').html('');
                        $('#example1').DataTable().ajax.reload();
                        toastr.success('Data Fakultas Berhasil Disimpan');
                    }
                    }

                });
            });

            // Menampilkan modal edit data fakultas
            $('body').on('click','.btn-editFakultas',function(){
                const idFakultas = $(this).attr('value');
                $.ajax({
                    url         :"datafakultas/ajaxUpdate/"+idFakultas,
                    type        :"GET",
                    dataType    :"JSON",
                    success     :function(data){
                        $('[name="idFakultas"]').val(data.id);
                        $('[name="nama_fakultas2"]').val(data.nama_fakultas);
                        $('#modalEdit').modal(show);
                    }
                });
            });

            // save update data fakultas
            $('#btn-updateDataFakultas').on('click',function(){
                const formUpdate = $('#formUpdateDataFakultas');
                $.ajax({
                    url         :"datafakultas/update",
                    method      :"POST",
                    data        :formUpdate.serialize(),
                    dataType    :"JSON",
                    success     :function(data){
                        // data error
                        if(data.error){
                            if(data.nama_fakultas_error['nama_fakultas'] !=''){
                                $('#nama_fakultas2_error').html(data.nama_fakultas_error['nama_fakultas']);
                            }else{
                                $('#nama_fakultas2_error').html('');
                            }
                        }
                        // data success
                        if(data.success){
                            formUpdate.trigger('reset');
                            $('#modalEdit').modal('hide');
                            $('#nama_fakultas2_error').html('');
                            $('#example1').DataTable().ajax.reload();
                            toastr.info('Data Fakultas Berhasil Di Simpan');
                        }
                    }
                });
            });

            // hapus data informasi jabatan
            $('body').on('click','.btn-deleteFakultas',function(e){
                e.preventDefault();
                const url = $(this).attr('href');
                Swal.fire({
                    title               :'Hapus data?',
                    text                :"Anda ingin menghapus data fakultas ini?",
                    icon                :'warning',
                    showCancelButton    :true,
                    confrimButtonColor  :'#3085d6',
                    cancelButtonColor   :'#d33',
                    confirmButtonText   :'Yes, Delete It!'
                }).then(result()=>{
                    if(result.value){
                        $.ajax({
                            url:url,
                            method:"POST",
                            success:function(response){
                                $('#example1').DataTable().ajax.reload();
                                toastr.info('Data Fakultas Berhasil diHapus');
                            }
                        });
                    }
                });
            });
        });
    </script>
<?=$this->endSection()?>
<?php
namespace App\Controllers;
use App\Models\FakultasModel;
use App\Models\ProdiModel;
use Config\Services;

class DataProdi extends BaseController{
    protected $M_fakultas;
    protected $M_prodi;
    protected $request;
    protected $form_validation;
    protected $session;

    
    public function __construct()
    {
        $this->request          = Services::request();
        $this->M_fakultas       = new FakultasModel($this->request);
        $this->M_prodi          = new ProdiModel($this->request);
        $this->form_validation  = \Config\Services::validation();
        $this->session          = \Config\Services::session();
    }
    
    // tombol aksi pada tabel data prodi
    private function _action($idProdi){
        $link ="
            <a data-toggle='tooltip' data-placement='top' class='btn-editProdi' title='Update' value='".$idProdi"'>
                <button type='button' class='btn btn-outline-success btn-xs' data-toggle='modal' data-target='#modalEdit'>
                    <i class='fa fa-edit'></i>
                </button>
            </a>
            <a href='".base_url('dataprodi/delete'.$idProdi)".' data-toggle='tooltip' data-placement='top' class='btn-deleteProdi' title='Delete'>
                <button type='button' class='btn btn-outline-danger btn-xs'>
                    <i class='fa fa-trash'></i>
                </button>
            </a>";
        return $link;
    }
}
?>
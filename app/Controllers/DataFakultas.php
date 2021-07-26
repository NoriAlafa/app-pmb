<?php
namespace App\Controllers;
use App\Models\FakultasModel;
use Config\Services;

class DataFakultas extends BaseController{
    protected $M_fakultas;
    protected $request;
    protected $form_validation;
    protected $session;
    
    
    public function __construct()
    {
        $this->request         = Services::request();
        $this->M_fakultas      = new FakultasModel($this->request);
        $this->form_validation = \Config\Services::validation();
        $this->session         = \Config\Services::session();
    }

    // Tombol aksi pada tabel data fakultas
    private function _action($idFakultas){
        $link = "<a data-toggle='tooltip' data-placement='top' class='btn-editFakultas' title='edit'
                    value='.$idFakultas'>
                    <button type='button' class='btn btn-outline-success btn-xs' data-toggle='modal'
                    data-target='#modalEdit'>
                        <i class='fa fa-edit'></i>
                    </button>
                </a>
                <a href='".base_url('datafakultas/delete/'.$idFakultas);"' data-toggle='tooltip' data-placement='top' class='btn-deleteFakultas' title='delete'>
                    <button type='button' class='btn btn-outline-danger btn-xs' data-toggle='modal'
                    data-target='#modalEdit'>
                        <i class='fa fa-trash'></i>
                    </button>
                </a>";              
        return $link;
    }

    
}
?>
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
    
}
?>
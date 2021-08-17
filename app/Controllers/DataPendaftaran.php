<?php
namespace App\Controllers;
use App\Models\PendaftaranModel;
use App\Models\FakultasModel;
use App\Models\ProdiModel;
use Config\Services;

class DataPendaftaran extends BaseController{
    protected $session;
    protected $M_pendaftaran;
    protected $M_fakultas;
    protected $M_prodi;
    protected $request;

    
    public function __construct()
    {
        $this->request = Services::request();
        $this->M_pendaftaran = new PendaftaranModel($this->request);
        $this->M_fakultas = new FakultasModel($this->request);
        $this->M_prodi = new ProdiModel($this->request);
        $this->session = \Config\Services::session();
    }
    
}
?>
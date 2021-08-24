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

    // Tombol aksi pada tabel pendaftaran
    private function _action($idPendaftaran,$statusVerifikasi){
        if($statusVerifikasi == "Lulus" || $statusVerifikasi == "Tidak Lulus"){
            $link = 
            "<a href='".base_url('datapendaftaran/view/'.$idPendaftaran)."' class='btn-viewPendaftaran' data-toggle='tooltip' data-placement='top' title='View'>
                <button type='button' class='btn btn-outline-primary btn-xs'>
                    <i class='fas fa-eye'></i>
                </button>
            </a>";
            return $link;
        }
    }
    
}
?>
<?php
namespace App\Controllers;
use App\Models\InformasiModel;
use Config\Services;

class Infromasi extends BaseController{
    protected $M_informasi;
    protected $request;
    protected $form_validation;
    protected $session;

    
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->request     = Services::request();
        $this->M_informasi = new InformasiModel($this->request);
        $this->session     =\Config\Services::session();
    }

    //tombol aksi pada tabel info
    private function _action($idInformasi){
        $link ="
        <a data-toggle='tooltip' data-placement='top' class='btn-editInformasi'>
            <button type='button' class='btn btn-outline-success btn-xs' data-toggle='modal' data-target='#modalEdit'>
                <i class='fa fa-edit'></i>
            </button>
        </a>";

        return $link;
    }

    //halaman informasi
    public function index(){
        $data['title'] ="Alfa Univ|Informasi" ;
        $data['page']  = "informasi";
        $data['nama']  =$this->session->get('nama');
        $data['email'] =$this->session->get('email') ;

        return view('v_informasi/index' , $data);
    }
    
}
?>
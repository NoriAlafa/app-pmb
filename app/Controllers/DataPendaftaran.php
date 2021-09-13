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
                    <i class='far fa-eye'></i>
                </button>
            </a>";
            return $link;
        }
        else{
            $link = "
            <a href='".base_url('datapendaftaran/view/'.$idPendaftaran)."' class='btn-viewPendaftaran' data-toggle='tooltip' data-placement='top' title='View'>
                <button class='btn btn-outline-primary btn-xs' type='button'>
                    <i class='far fa-eye'></i>
                </button>
            </a>
            <a href='".base_url('datapendaftaran/view/'.$idPendaftaran)."' class='btn-lulusPendaftaran' data-toggle='tooltip' data-placement='top' title='Lulus'>
                <button class='btn btn-outline-success btn-xs' type='button'>
                    <i class='fas fa-check'></i>
                </button>
            </a>
            <a href='".base_url('datapendaftaran/view/'.$idPendaftaran)."' class='btn-tidakLulusPendaftaran' data-toggle='tooltip' data-placement='top' title='Tidak Lulus'>
                <button class='btn btn-outline-danger btn-xs' type='button'>
                    <i class='fas fa-times'></i>
                </button>
            </a>
            ";
            return $link;
        }
    }

    // Halaman Data Pedaftaran
    public function index(){
        $data['title'] = "Alfa Univ|Data Pendaftaran" ;
        $data['page']  = "datapendaftaran";
        $data['nama']  = $this->session->get('nama');
        $data['email'] = $this->session->get('email');
        return view('v_datapendaftaran/index',$data);
    }
    
    //Halaman view pendaftaran
    public function view($id){
        $data['title']  = 'Alfa Univ|View Data Pendaftaran';
        $data['page']   = 'datapendaftaran';
        $data['nama']   = $this->session->get('nama');
        $data['email']  = $this->session->get('email');

        // cek pendaftaran berdasarkan id pendaftaran
        $cekPendaftaran     = $this->M_pendaftaran->where('id',$id)->first();
        $status_pendaftaran = $cekPendaftaran['status_pendaftaran'];
        $fakultas_id        = $cekPendaftaran['fakultas_id'];
        $prodi_id           = $cekPendaftaran['prodi_id'];

        // cek data pendaftaran ada
        if($cekPendaftaran){
            // jika sudah selesai
            if($status_pendaftaran == "Selesai"){
                $data['pendaftaran'] = $cekPendaftaran;
            }
            
            // fakultas
            $cekFakultas = $this->$M_fakultas->where('id',$fakultas_id)->first();
            $data['nama_fakultas'] = $cekFakultas['nama_fakultas'];

            // Prodi
            $cekProdi = $this->M_prodi->where('id',$prodi_id)->first();
            $data['nama_prodi'] =$cekProdi['nama_prodi'];
            return view('v_dataPendaftaran/view',$data);
        }
        // Data pendaftaran tidak ada
        else{
            return view('v_dataPendaftaran/error',$data);
        }
    }
    // lulus
    public function lulus($id){
        //data pendaftaran
        $data = [
            'status_verifikasi' =>'Lulus'
        ];

        //update data pendaftaran
        $this->M_pendaftaran->update($id,$data);
    }
}
?>
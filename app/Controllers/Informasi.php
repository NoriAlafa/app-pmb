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
    
    // Menampilkan informasi pada modal edit informasi
    public function ajaxUpdate($idInformasi){
        //cek informasi berdasarkan id
        $cek = $this->M_informasi->find($idInformasi);
        $id  = $cek['id'];
        //ubah format penanggalan melalui helper
        $tgl_buka       = ubah_tgl2($cek['tgl_buka']);
        $tgl_tutup      = ubah_tgl2($cek['tgl_tutup']);
        $tgl_pengumuman = ubah_tgl2($cek['tgl_pengumuman']);

        $data = [
            'id'                  =>$cek['id'],
            'tanggal_pendaftaran' =>$tgl_buka." - ".$tgl_tutup,
            'tanggal_pengumuman'  =>$tgl_pengumuman
        ];

        echo json_encode($data);
    }

    //update data informasi 
    public function update(){
        $id              = $this->request->getPost('idInformasi');
        $tgl_pendaftaran = $this->request->getPost('tgl_pendaftaran');
        $tgl_pengumuman  = $this->request->getPost('tgl_pengumuman');

        //validasi informasi
        $data = [
            'tgl_pendaftaran' => $tgl_pendaftaran,
            'tgl_pengumuman'  => $tgl_pengumuman
        ];

        //cek validasi informasi , jika data tidak valid
        if($this->form_validation->run($data,'informasi') == FALSE){
            $validasi = [
                'error'     =>true,
                'info_error'=>$this->form_validation->getErrors()
            ];
            echo json_encode($validasi);
        }
        //data valid
        else{
            //ubah format penanggalan tanggal pendaftaran melalui helper
            $pisah_tanggal = explode('/',$tgl_pendaftaran);
            $tgl_buka      = ubah_tgl1($pisah_tanggal[0]);
            $tgl_tutup     = ubah_tgl1($pisah_tanggal[1]);
            $tgl_p         = ubah_tgl1($tgl_pengumuman);

            //data update informasi
            $data1 = [
                'tgl_buka'       =>$tgl_buka,
                'tgl_tutup'      =>$tgl_tutup,
                'tgl_pengumuman' =>$tgl_p
            ];

            //update informasi
            $this->M_informasi->update($id , $data1);
            $validasi = [
                'success'   =>true
            ];

            echo json_encode($validasi);
        }
    }

    //datatable server side
    public function ajaxInformasi(){
        if($this->request->getMethod(true) == 'POST'){
            $lists = $this->M_informasi->get_datatables();
            $data  = [];
            $no    = $this->request->getPost("start");
            
              foreach ($lists as $list) :
                $no++;
                $row  = [];
                $row  = $tgl_indonesia($list->tgl_buka);
                $row  = $tgl_indonesia($list->tgl_tutup);
                $row  = $tgl_indonesia($list->tgl_pengumuman);
                $row  = $this->_action($list->id);
                $data = $row; 
              endforeach;
            
            $output = [
                "draw"         =>$this->request->getPost('draw'),
                "recordsTotal" =>$this->M_informasi->count_all(),
                "data"         =>$data
            ];
            echo json_encode($output);
        }
    }
}
?>
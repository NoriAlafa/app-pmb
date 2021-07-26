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

    // Halaman fakultas
    public function index(){
        $data['title']  = "Alfa-Univ|Data Fakultas";
        $data['page']   = "datafakultas";
        $data['nama']   = $this->session->get('nama');
        $data['email']  = $this->session->get('email');
        return view('v_dataFakultas/index',$data);
    }

    // Add data fakultas
    public function add(){
        $nama_fakultas = ucwords($this->request->getPost('nama'));

        // data fakultas
        $data =[
            'nama_fakultas' => $nama_fakultas
        ];

        // cek validasi data fakultas, jika data tidak valid
        if($this->form_validation->run($data,'fakultas')==FALSE){
            $validasi = [
                'error' =>true,
                'nama_fakultas_error'=>$this->form_validation->getErrors('nama_fakultas')
            ];
            echo json_encode($validasi);
        }
        // Data valid
        else{
            //simpan data fakultas
            $this->M_fakultas->save($data);
            $validasi = [
                'success' =>true 
            ];
            echo json_encode($validasi);

        }
    }

    // Menampilkan data fakultas pada modal edit data fakultas
    
}
?>
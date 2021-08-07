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
            <a data-toggle='tooltip' data-placement='top' class='btn-editProdi' title='Update' value='".$idProdi."'>
                <button type='button' class='btn btn-outline-success btn-xs' data-toggle='modal' data-target='#modalEdit'>
                    <i class='fa fa-edit'></i>
                </button>
            </a>
            <a href='".base_url('dataprodi/delete'.$idProdi)."' data-toggle='tooltip' data-placement='top' class='btn-deleteProdi' title='Delete'>
                <button type='button' class='btn btn-outline-danger btn-xs'>
                    <i class='fa fa-trash'></i>
                </button>
            </a>";
        return $link;
    }

    // Halaman data prodi
    public function index($idFakultas){
        $data['title']  = "Alfa Univ|Data Prodi";
        $data['page']   = "dataprodi";
        $data['nama']   = $this->session->get('nama');
        $data['email']  = $this->session->get('email');

        // cek data fakultas berdasarkan id
        $cekFakultas            = $this->M_fakultas->where('id',$idFakultas)->first();
        $data['nama_fakultas']  = $cekFakultas['nama_fakultas'];
        $data['id_fakultas']    = $cekFakultas['id'];

        // jika data ada
        if($cekFakultas){
            return view('v_dataProdi/index',$data);
        }else{
            return view('v_dataProdi/error',$data);
        }
    }

    // Add data prodi
    public function add(){
        $fakultas_id    = $this->request->getPost('fakultas_id');
        $nama_prodi     = ucwords($this->request->getPost('nama_prodi'));

        // data prodi
        $data = [
            'fakultas_id'   =>$fakultas_id,
            'nama_prodi'    =>$nama_prodi
        ];

        // cek validasi data prodi ,jika data tidak valid
        if($this->form_validation->run($data,'prodi')==FALSE){
            $validasi = [
                'error'             =>true,
                'nama_prodi_error'  =>$this->form_validation->getErrors('nama_prodi')
            ];
            echo json_encode($validasi);
        }
        // data valid
        else{
            // simpan data prodi
            $this->M_prodi->save($data);
            $validasi = [
                'success'   =>true 
            ];
            echo json_encode($validasi);
        }
    }

    // Menampilkan data prodi pada modal edit data prodi
    public function ajaxUpdate($idProdi){
        $data = $this->M_prodi->find($idProdi);
        echo json_encode($data);
    }

    // Update data prodi
    public function update(){
        $id         = $this->request->getPost('fakultas_id');
        $nama_prodi = ucwords($this->request->getPost('nama_prodi'));
        // data fakultas
        $data = [
            'nama_prodi'    => $nama_prodi
        ];
        // cek validasi data fakultas,jika tidak valid
        if($this->form_validation->run($data,'prodi')==FALSE){
            $validasi = [
                'error'             =>true,
                'nama_prodi2_error' => $this->form_validation->getErrors('nama_prodi')
            ];
            echo json_encode($validasi);
        }else{
            // update data fakultas
            $this->M_prodi->update($id,$data);
            $validasi = [
                'success' =>true 
            ];
            echo json_encode($validasi);
        }
    }
    
    // Delete data prodi
    public function delete($id){
        $this->M_prodi->delete($id);
    }

    // Datatable server side
    public function ajaxDataProdi($idFakultas){
        if($this->request->getMethod(true)=='POST'){
            $lists = $this->M_prodi->get_datatables($idFakultas);
            foreach ($lists as $list) {
                $no++;
                $row   =[];
                $row[] =$no;
                $row[] =$list->nama->prodi;
                $row[] =$this->_action($list->id);
                $data[]=$row;
            }
            $output = [
                "draw"              => $this->request->getPost('draw'),
                "recordsTotal"      => $this->M_prodi->count_all($idFakultas),
                "recordsFiltered"   => $this->M_prodi->count_filtered($idFakultas),
                "data"              =>$data
            ];
            echo json_encode($output);
        }
    }
}
?>
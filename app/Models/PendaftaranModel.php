<?php
namespace App\Models;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class PendaftaranModel extends Model{
    protected $table = "tbl_pendaftaran";
    protected $allowedFields = [
        'user_id',
        'fakultas_id',
        'prodi_id',
        'nomor_pendaftaran',
        'nama_peserta',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'no_hp',
        'alamat_peserta',
        'nama_orangtua',
        'pekerjaan_orangtua',
        'no_hp_orangtua',
        'nama_sekolah',
        'tahun_lulus',
        'alamat_sekolah',
        'foto',
        'berkas',
        'tahap_satu',
        'tahap_dua',
        'tahap_tiga',
        'tanggal_pendaftaran',
        'status_pendaftaran',
        'status_verifikasi'
    ];
    protected $useTimeStamps    = true;
    protected $column_order     = [null,'nomor_pendaftaran','tanggal_pendaftaran','status_verifikasi',null];
    protected $column_search    = ['nomor_pendaftaran','nama_prodi','nama_peserta','tanggal_pendaftaran','status_verifikasi'];
    protected $order            = ['tbl_pendaftaran.id'=>'desc'];
    protected $request;
    protected $db;
    protected $dt;

    
    function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db       = db_connect();
        $this->request  = $request;
        $this->dt       = $this->db->table($this->table)
                            ->select('tbl_pendaftaran.id, nomor_pendaftaran, tanggal_pendaftaran, status_verifikasi')
                            ->join('tbl_prodi','tbl_prodi.id = tbl_pendaftaran.prodi_id','left')
                            ->where('status_pendaftaran' , "Selesai");
    }

    private function _get_datatables_query(){
        $i = 0;
        foreach ($this->column_search as $item){
            if($this->request->getPost('search')['value']){
                if($i===0){
                    $this->dt->groupStart();
                    $this->dt->like($item,$this->request->getPost('search')['value']);
                }
                else{
                    $this->dt->orLike($item,$this->request->getPost('search')['value']);
                }

                if(count($this->column_search) - 1 ==$i){
                    $this->dt->groupEnd();
                }

            }
        }

        if($this->request->getPost('order')){
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']],
            $this->request->getPost('order')['0']['dir']);
        }
        else if(isset($this->order)){
            $order = $this->order;
            $this->dt->orderBy(key($order),$order[key($order)]);
        }
    }

    function get_datatables(){
        $this->_get_datatables_query();
        if($this->request->getPost('length') != -1)
        $this->dt->limit($this->request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }

    function count_filtered(){
        $this->_get_datatables_query();
        return $this->dt->countAllResults();
    }

    public function count_all(){
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults;
    }
    
}
?>
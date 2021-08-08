<?php
namespace App\Models;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class ProdiModel extends Model{
    protected $table = "tbl_prodi";
    protected $allowedFields = ['fakultas_id','nama_prodi'];
    protected $column_order  = [null,'nama_prodi',null];
    protected $column_search = ['nama_prodi'];
    protected $order         = ['id'=>'desc'];
    protected $request;
    protected $db;
    protected $dt;

    
    function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db      = db_connect();
        $this->request = $request;
        $this->dt      = $this->db->table($this->table)->select('*');
    }

    private function _tbl_prodi($idFakultas){
        $this->dt->where('fakultas_id',$idFakultas);
    }
    
}
?>
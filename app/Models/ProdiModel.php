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

    private function _get_datatables_query($idFakultas){
        $this->_tbl_prodi($idFakultas);
        $i = 0;
        foreach ($this->column_search as $item) {
            if($this->request->getPost('search')['value']){
                if($i===0){
                    $this->dt->groupStart();
                    $this->dt->like($item,$this->request->getPost('search')['value']);
                }else{
                    $this->dt->orLike($item,$this->request->getPost('search')['value']);
                }

                if(count($this->column_search) - 1 == $i){
                    $this->dt->groupEnd();
                }
            }
            $i++;
        }

        if($this->request->getPost('order')){
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']],
            $this->request->getPost('order')['0']['dir']);
        }
    }
    
}
?>
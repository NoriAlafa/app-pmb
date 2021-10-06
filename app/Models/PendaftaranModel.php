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
    ];
}
?>
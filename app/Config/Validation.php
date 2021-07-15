<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	
	//validasi data fakultas
	public $fakultas = [
		'nama_fakultas'=>[
			'label' =>'Nama Fakultas',
			'rules' =>'required',
			'errors'=>[
				'required'=>'Nama fakultas tidak boleh kosong!'
			]
		]
	];

	//validasi data prodi
	public $prodi = [
		'nama_prodi'=>[
			'label' =>'Nama Prodi',
			'rules' =>'required',
			'errors'=>[
				'required'=>'Nama prodi tidak boleh kosong'
			]
		]
	];

	//validasi informasi pendaftara
	public $informasi = [
		'tgl_pendaftaran' =>[
			'label'		  =>'Tanggal Pendaftaran',
			'rules'		  =>'required',
			'errors'	  =>[
				'required'=>'Tanggal pendaftaran tidak boleh kosong'
			]	  
		],
		'tgl_pengumuman'  =>[
			'label'		  =>'Tanggal Pengumuman',
			'rules'		  =>'required',
			'erros'		  =>[
				'required'=>'Tanggal pengumuman pendaftaran tidak boleh kosong'
			]
		]
	];

	//validasi pendaftaran buat akun
	public $daftar_akun = [
		'nama'=>[
			'label'		  =>'Nama Lengkap',
			'rules'		  =>'required',
			'errors'	  =>[
				'required'=>'Nama Lengkap tidak boleh kosong'
			]
		],
		'email'=>[
			'label'		  =>'E-mail',
			'rules'		  =>'required|valid_email|is_unique[tbl_user.email]',
			'errors'	  =>[
				'required'=>'Email tidak boleh kosong!',
				'valid_email'=>'Email tidak valid!',
				'is_unique'=>'Email sudah terdaftar'
			]
		],
		'password'=>[
			'label'		  =>'Password',
			'rules'		  =>'required|min_length[8]',
			'errors'	  =>[
				'required'=>'Password tidak boleh kosong!',
				'min_length'=>'Password minimal 8 karakter'
			]
		],
		'confirm_password'=>[
			'label'	      =>'Konfirmasi Password',
			'rules'		  =>'required|min_length[8]|matches[password]'
		]
	];

	//validasi login
	public $login = [
		'email'=>[
			'label'		=>'E-mail',
			'rules'		=>'required|valid_email',
			'errors'	=>[
				'required'	 =>'Email tidak boleh kosong!',
				'valid_email'=>'Email Tidak Valid!'
			]
		],
		'password'=>[
			'label'		=>'Password',
			'rules'		=>'required|min_length[8]',
			'errors'	=>[
				'required'		=>'Password tidak boleh kosong!',
				'min_length'	=>'Password Minimal 8 Karakter'
			]
		]
	];

	//validasi pendaftaran tahap satu
	public $tahap_satu = [
		'nama_peserta' =>[
			'label'	   =>'Nama Peserta',
			'rules'	   =>'required',
			'errors'   =>[
				'required' =>'Nama peserta tidak boleh kosong!'
			]
		],
		'tempat_lahir' =>[
			'label'	   =>'Tempat Lahir',
			'rules'	   =>'required',
			'errors'   =>[
				'required'=>'Tempat lahir harus diisi!'
			]
		],
		'tanggal_lahir'=>[
			'label'	   =>'Tanggal Lahir',
			'rules'	   =>'required',
			'errors'   =>[
				'required'=>'Tanggal lahir tidak boleh kosong!'
			]
		],
		'jenis_kelamin'=>[
			'label'	   =>'Jenis Kelamin',
			'rules'    =>'required',
			'errors'   =>[
				'required' =>'Jenis kelamin harus diisi!'
			]
		],
		'agama'	=>[
			'label'	   =>'Agama',
			'rules'	   =>'required',
			'errors'   =>[
				'required'=>'Agama tidak boleh kosong!'
			]
		],
		'no_hp'=>[
			'label'	   =>'Nomor Telephone',
			'rules'	   =>'required|numeric|max_length[14]',
			'errors'   =>[
				'required'  =>'Nomor Telephone tidak boleh kosong!',
				'numeric'   =>'Nomor Telephone tidak valid',
				'min_length'=>'Masukkan Nomor Telephone dengan benar!'
			]
		],
		'alamat'=>[
			'label'	  =>'Alamat',
			'rules'   =>'required',
			'errors'  =>[
				'required' =>'Alamat tidak boleh kosong!'
			]
		],
		'nama_orangtua'=>[
			'label'   =>'Nama Orangtua',
			'rules'   =>'required',
			'errors'  =>[
				'required' =>'Nama orang tua harus diisi!'
			]
		],
		'pekerjaan_orangtua'=>[
			'label'  =>'Pekerjaan Orangtua',
			'rules'  =>'required',
			'errors' =>[
				'required' =>'Pekerjaan orang tua harus diisi!'
			]
		],
		'no_hp_orangtua'=>[
			'label'  =>'Nomer Hp orangtua',
			'rules'  =>'required|numeric|max_length[14]',
			'errors' =>[
				'required'	 =>'Nomer hp tidak boleh kosong!',
				'numeric'	 =>'Nomer hp tidak valid!',
				'min_length' =>'Masukkan nomer hp dengan benar!'
			]
		],
		'nama_sekolah'=>[
			'label'  =>'Nama Sekolah',
			'rules'  =>'required',
			'errors' =>[
				'required' =>'Nama sekolah tidak boleh kosong!'
			]
		],
		'tahun_lulus'=>[
			'label'  =>'Tahun lulus',
			'rules'  =>'required|numeric|max_length[4]',
			'errors' =>[
				'required'  =>'Tahun lulu tidak boleh kosong!',
				'numeric'   =>'Tahun lulus tidak valid',
				'min_length'=>'Tahun lulus peserta maksimal 4 angka'
			]
		],
		'alamat_sekolah'=>[
			'label'  =>'Alamat Sekolah',
			'rules'  =>'required',
			'errors' =>[
				'required' =>'Alamat sekolah tidak boleh kosong!'
			]
		],

	];
}

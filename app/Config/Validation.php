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
}

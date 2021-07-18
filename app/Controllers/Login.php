<?php
namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController{
    protected $encrypter;
    protected $form_validation;
    protected $M_user;
    protected $session;

    
    public function __construct()
    {
        $this->encrypter       = \Config\Services::encrypter();
        $this->form_validation = \Config\Services::validation();
        $this->M_user          = new UserModel();
        $this->session         = \Config\Services::session();
    }

    //halaman login
    public function index(){
        $data['title'] = 'App-PMB|Login';
        return view('v_login/index' , $data);
    }

    //pengecekan user
    public function cekUser(){
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        //validasi
        $cek_validasi = [
            'email'   =>$email,
            'password'=>$password
        ];

        //cek validasi tidak valid
        if($this->form_validation->run($cek_validasi,'login') == FALSE){
            $validasi = [
                'error'      =>true,
                'login_error'=>$this->form_validation->getErrors()
            ];
            echo json_encode($validasi);
            //cek data user berdasarkan email
            $cekUser    = $this->M_user->where('email' , $email )->first();
            $chipertext = $cekUser['password'];
        }else{
            //jika user ada
            if($cekUser){
                //cek password
                $p = $this->encrypter->decrypt(base64_decode($chipertext));
            
                //jiks benar
                if($password == $p){
                    $newdata = [
                        'id'      =>$cekUser['id'],
                        'role_id' =>$cekUser['role_id'],
                        'nama'    =>$cekUser['nama'],
                        'email'   =>$cekUser['email']
                    ];
                    $this->session->set($newdata);
                    //cek role_id apakah admin atau member
                    if($cekUser['role_id'] == 1){
                        //admin
                        $validasi = [
                            'success'=>true,
                            'link'   =>base_url('dashboard')
                        ];
                        echo json_encode($validasi);
                    }else{
                        //member
                        $validasi = [
                            'success'=>true,
                            'link'   =>base_url('pendaftaran/cekStatusPendaftaran')
                        ];
                        echo json_encode($validasi);
                    }
            }
                //password salah
                else{
                        $validasi = [
                            'success'=>true,
                            'login_error'=>[
                                'password'=>'Password salah'
                            ]
                        ];
                    }
        }
        //dan jika user tidak ada
        else{
            $validasi = [
                'error'      =>true,
                'login_error'=>[
                    'email'  =>'Email tidak terdaftar!'
                ]
            ];
            echo json_encode($validasi);
        }
      }
    }
    
}
?>
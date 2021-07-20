<?php
namespace App\Controller;
class Dashboard extends BaseController{
    protected $session;

    
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    //halaman dashboard
    public function index(){
        $data['title']="Hi Mister | Dashboard";
        $data['page']="dashboard";
        $data['nama']=$this->session->get('nama');
        $data['email']=$this->session->get('email');
        return view('v_dashboard/index',$data);
    }

    //logout
    public function logout(){
        $this->session->destroy();
        return redirect()->to('/');
    }
    
}
?>
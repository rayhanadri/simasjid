<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
		parent::__construct();		
		if (!isset($_SESSION)) {
            session_start();
		}
		$this->load->model('m_anggota');
		
	}

	public function index()
	{
		if (!is_null($this->session->userdata('status') )) {
			
            $this->home();
        } else {
			$this->load->view('v_login');
		}
	}

	public function error()
	{
		$this->load->view('v_error');
	}


	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$param = array(
            'username' => $username,
			'password' => $password,
			// 'password' => md5($password),
		);
		
		$data = $this->m_anggota->login($param)->row_array();
		if($data > 0){
            $data_session = array(
				'u_name' => $username,
				'jabatan' => $data["id_jabatan"],
				'i_takmir' => $data["id"],
                'status' => "login"
			);
			$this->session->set_userdata($data_session); 
            redirect('','refresh');	
        }else{
            echo "Username dan password salah !";
        }
	}

	private function getPrevilege(){
		return $this->session->userdata("jabatan");
	}

	public function home()
	{
		$this->load->view('header');
		$previlege['previlege'] = $this->getPrevilege();
		$this->load->view('left_sidebar',$previlege);
		$this->load->view('v_beranda');
		$this->load->view('footer');
	}

	public function logout()
	{	
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}

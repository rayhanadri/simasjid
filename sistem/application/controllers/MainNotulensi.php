<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainNotulensi extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_notulen');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('left_sidebar');
		$data['takmirs'] = $this->m_notulen->all();
		$this->load->view('v_beranda',$data);
		$this->load->view('footer');
	}

	public function buatNotulensi()
	{
		$this->load->view('header');
		$this->load->view('left_sidebar');
		$data['takmirs'] = $this->m_notulen->all();
		$this->load->view('notulensi/v_buat_notulensi',$data);
		$this->load->view('footer');
	}

	public function daftarNotulensi()
	{
		$this->load->view('header');
		$this->load->view('left_sidebar');
		$data['takmirs'] = $this->m_notulen->all();
		$this->load->view('notulensi/v_daftar_notulensi',$data);
		$this->load->view('footer');
	}
}

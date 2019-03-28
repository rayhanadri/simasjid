<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainNotulensi extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_notulen');
		$this->load->model('m_anggota');
	}

	private function insert($namaTabel, $data, $redirectHalaman){
		$result = $this->m_anggota->insertData($namaTabel,$data);
		if($result){
			redirect($redirectHalaman,'refresh');
		} else {
			echo "gagal";
		}
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
		$data['notulens'] = $this->m_notulen->all();
		$this->load->view('notulensi/v_daftar_notulensi',$data);
		$this->load->view('footer');
	}

	public function detailNotulensi($idNotulensi = null)
	{
		$this->load->view('header');
		$this->load->view('left_sidebar');
		$data['notulens'] = $this->m_notulen->tampil_detail_notulen($idNotulensi);
		$data['pembawa_notulens'] = $this->m_notulen->tampil_data_notulen($idNotulensi);
		$this->load->view('notulensi/v_detail_notulensi',$data);
		$this->load->view('footer');
	}

	public function daftarPekerjaan()
	{
		$this->load->view('header');
		$this->load->view('left_sidebar');
		$data['anggotas'] = $this->m_anggota->tampil_semua_data_by_table("anggota");
		$data['proyeks'] = $this->m_notulen->tampil_semua_data_by_table("proyek");
		$this->load->view('notulensi/v_daftar_pekerjaan',$data);
		$this->load->view('footer');
	}

	public function detailPekerjaan($detail = null)
	{
		$this->load->view('header');
		$this->load->view('left_sidebar');
		$data['detailProgress'] = $this->m_notulen->tampil_deskripsi_proyek($detail);
		$data['listProgress'] = $this->m_notulen->tampil_list_progres_by($detail);
		$this->load->view('notulensi/v_detail_pekerjaan',$data);
		$this->load->view('footer');
	}

	public function storePekerjaan()
	{
		$namaProyek = $this->input->post('namaProyek');
		$deskripsiProyek = $this->input->post('deskripsiProyek');
		$idAnggota = $this->input->post('idAnggota');
		$idNotulensi = $this->input->post('idNotulensi');
		
		$namaTabel = "proyek";
		$redirectHalaman = "pekerjaan";

		if(!isset($idNotulensi)){
			$simpan = array(
				'nama_proyek' => $namaProyek,
				'deskripsi' => $deskripsiProyek,
				'id_anggota' => $idAnggota,
			);
			
			$this->insert($namaTabel, $simpan, $redirectHalaman);
			echo "Berhasil ditambahkan";
		} else {
			$kolom = "id";
			$simpan = array(
				'id_jabatan' => $jabatanAnggota,
				'nama' => $namaAnggota,
				'username' => $usernameAnggota,
				'password' => $passwordAnggota,
			);
			$this->update($namaTabel, $kolom, $idAnggota, $simpan, $redirectHalaman);
			echo "Berhasil ditambahkan";
		}	
	}
}

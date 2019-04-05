<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainKeanggotaan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_notulen');
		$this->load->model('m_anggota');
	}

	private function getPrevilege(){
		return $this->session->userdata("jabatan");
	}

	public function buatAnggotaBaru()
	{
		$this->load->view('header');
		$previlege['previlege'] = $this->getPrevilege();
		$this->load->view('left_sidebar',$previlege);
		$data['anggotas'] = $this->m_notulen->tampil_semua_data_by_table("anggota");
		$this->load->view('v_beranda',$data);
		$this->load->view('footer');
	}

	public function daftarAnggota()
	{
		$this->load->view('header');
		$previlege['previlege'] = $this->getPrevilege();
		$this->load->view('left_sidebar',$previlege);
		$data['anggotas'] = $this->m_anggota->tampil_semua_data_by_table("anggota");
		$data['jabatans'] = $this->m_anggota->tampil_semua_data_by_table("jabatan");
		$this->load->view('keanggotaan/v_daftar_anggota',$data);
		$this->load->view('footer');
	}

	public function editAnggota($id = "")
	{
		$this->load->view('header');
		$previlege['previlege'] = $this->getPrevilege();
		$this->load->view('left_sidebar',$previlege);
		$data['anggota'] = $this->m_anggota->find($id);
		$data['jabatans'] = $this->m_anggota->tampil_semua_data_by_table("jabatan");
		$this->load->view('keanggotaan/v_edit_anggota',$data);
		$this->load->view('footer');
	}

	public function storeAnggota()
	{
		$namaAnggota = $this->input->post('namaAnggota');
		$jabatanAnggota = $this->input->post('jabatanAnggota');
		$usernameAnggota = $this->input->post('usernameAnggota');
		$passwordAnggota = $this->input->post('passwordAnggota');
		$idAnggota = $this->input->post('idAnggota');
		
		$namaTabel = "anggota";
		$redirectHalaman = "anggota";

		if(!isset($idAnggota)){
			$simpan = array(
				'id_jabatan' => $jabatanAnggota,
				'nama' => $namaAnggota,
				'username' => $usernameAnggota,
				'password' => $passwordAnggota,
			);
			
			$this->insert($namaTabel, $simpan, $redirectHalaman);
			// echo "Berhasil ditambahkan";
		} else {
			$kolom = "id";
			$simpan = array(
				'id_jabatan' => $jabatanAnggota,
				'nama' => $namaAnggota,
				'username' => $usernameAnggota,
				'password' => $passwordAnggota,
			);
			$this->update($namaTabel, $kolom, $idAnggota, $simpan, $redirectHalaman);
			// echo "Berhasil ditambahkan";
		}	
	}
	
	public function hapusAnggota($idAnggota){
		$namaTabel = "anggota";
		$redirectHalaman = "anggota";
		$kolom = "id";
		$simpan = array(
			'aktif' => '0',
		);
		$this->update($namaTabel, $kolom, $idAnggota, $simpan, $redirectHalaman);
	}

	private function update($namaTabel, $kolom, $idAnggota, $data, $redirectHalaman){
		$result = $this->m_anggota->updateData($namaTabel, $kolom, $idAnggota ,$data);
		if($result){
			redirect($redirectHalaman,'refresh');
		} else {
			redirect($redirectHalaman,'refresh');
		}
	}


	private function insert($namaTabel, $data, $redirectHalaman){
		$result = $this->m_anggota->insertData($namaTabel,$data);
		if($result){
			redirect($redirectHalaman,'refresh');
		} else {
			echo "gagal";
		}
	}

}

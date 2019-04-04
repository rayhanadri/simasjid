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

	private function insertNotulen($namaTabel, $data){
		$result = $this->m_notulen->insertData($namaTabel,$data);
		return $result;
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
		$data['takmirs'] = $this->m_anggota->tampil_semua_data_anggota();
		$data['proyeks'] = $this->m_anggota->tampil_semua_data_by_table("proyek");		
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

	public function storeNotulensi()
	{
		$idNotulen = $this->input->post('namaNotulen');
		$idAmir = $this->input->post('namaAmir');
		//$namaHadirin = $this->input->post('namaHadirin');
		$idProgress = $this->input->post('idProgress');
		$namaProgress = $this->input->post('namaProgress');
		$progres = $this->input->post('progres');
		$masukkan = $this->input->post('masukkan');
		$keputusan = $this->input->post('keputusan');

		echo 'amir :'.$idAmir;
		echo '<br>notulen :'.$idNotulen;
		
		// 1. masuk master_notulensi, ambil id master_notulensinya
		$simpan = array(
			'id_takmir' => $idAmir,
			'id_notulen' => $idNotulen,
		);
		$namaTabel = "master_notulensi";
		$idMasterNotulensi = $this->insertNotulen($namaTabel, $simpan);
		
		echo "<br>";
		for($i = 0; $i< sizeof($idProgress); $i++){
			if($idProgress[$i] == 0)
			{
				echo "progress baru<br>";
				$simpan = array(
					'id_anggota' => '0',
					'nama_proyek' => $namaProgress[$i],
					'deskripsi' => '',
				);
				$namaTabel = "proyek";
				$idProgress[$i] = $this->insertNotulen($namaTabel, $simpan);
			} else {
				echo "progress lama<br>";
			}
			
			echo $i.". ".$namaProgress[$i];
			echo "<br>";
			echo "id :".$idProgress[$i];
			echo "<br>";
			echo "Progress : ".$progres[$i];
			echo "<br>";
			echo "Keputusan : ".$keputusan[$i];
			echo "<br>";
			// 2. masuk detail progress, ambil id detail_progressnya
			$simpan = array(
				'id_proyek' => $idProgress[$i],
				'keterangan' => $progres[$i],
				'keputusan' => $keputusan[$i],
			);
			$namaTabel = "detail_progres";
			$tempIdProgress = $this->insertNotulen($namaTabel, $simpan);

			// 3. taru di detail notulensinya id master & detail notulensinya
			$simpan = array(
				'id_notulensi' => $idMasterNotulensi,
				'id_progres' => $tempIdProgress,
			);
			$namaTabel = "detail_notulensi";
			$this->insertNotulen($namaTabel, $simpan);
		}
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

	public function ajax_get_nama_pekerjaan_by($id){
		$data = $this->m_notulen->ajax_get_nama_pekerjaan_by($id);
		echo json_encode($data);
	}

	public function ajax_get_nama(){
		$data = $this->m_anggota->tampil_semua_data_by_table("anggota");
		echo json_encode($data);
	}
}

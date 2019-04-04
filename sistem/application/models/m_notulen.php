<?php 
class M_notulen extends CI_Model
{
	
	// public function create($data_products){
	// 	$this->db->insert('pesan',$data_products);
	// }

	public function insertData($tabel, $data){
		$this->db->insert($tabel, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function all(){
		$this->db->select('*, master_notulensi.id as id_notulensi, GROUP_CONCAT(proyek.nama_proyek) as pokok_bahasan');
		$this->db->from("master_notulensi");
		$this->db->join('anggota', 'master_notulensi.id_takmir = anggota.id');
		$this->db->join('detail_notulensi', 'master_notulensi.id = detail_notulensi.id_notulensi');
		$this->db->join('detail_progres', 'detail_progres.id = detail_notulensi.id_progres');
		$this->db->join('proyek', 'proyek.id = detail_progres.id_proyek');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function tampil_data_notulen($idNotulensi){
		$this->db->select('*');
		$this->db->from("master_notulensi");
		$this->db->join('anggota', 'anggota.id = master_notulensi.id_notulen');
		$this->db->where('master_notulensi.id', $idNotulensi);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function tampil_detail_notulen($idNotulen){
		$this->db->select('*, master_notulensi.id as id_notulensi, 
		GROUP_CONCAT(proyek.nama_proyek SEPARATOR "$") as pokok_bahasan, 
		GROUP_CONCAT(detail_progres.keterangan SEPARATOR "$") as gabungan_progres,
		GROUP_CONCAT(detail_progres.keputusan SEPARATOR "$") as gabungan_keputusan_progres,
		GROUP_CONCAT(proyek.status SEPARATOR "$") as status_proyek');
		$this->db->from("master_notulensi");
		$this->db->join('anggota', 'master_notulensi.id_takmir = anggota.id');
		$this->db->join('detail_notulensi', 'master_notulensi.id = detail_notulensi.id_notulensi');
		$this->db->join('detail_progres', 'detail_progres.id = detail_notulensi.id_progres');
		$this->db->join('proyek', 'proyek.id = detail_progres.id_proyek');
		$this->db->where('master_notulensi.id ', $idNotulen);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function find($id){
		$hasil = $this->db->where('id',$id)->limit(1)->get('anggota');
		if ($hasil->num_rows()>0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function tampil_deskripsi_proyek($idProyek){
		$this->db->select('*, proyek.id as id_proyek');
		$this->db->from("proyek");
		$this->db->select('anggota.id as id_anggota');	
		$this->db->select('anggota.nama as nama_anggota');	
		$this->db->join('anggota', 'proyek.id_anggota = anggota.id');
		$this->db->where('proyek.id ', $idProyek);
		$this->db->where('aktif !=', '0');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function tampil_list_progres_by($idProyek){
		$this->db->select('*, proyek.id as id_proyek');
		$this->db->from("detail_progres");
		$this->db->join('detail_notulensi', 'detail_notulensi.id_progres = detail_progres.id');
		$this->db->join('master_notulensi', 'master_notulensi.id = detail_notulensi.id_notulensi');
		$this->db->join('proyek', 'proyek.id = detail_progres.id_proyek');
		$this->db->where('detail_progres.id_proyek ', $idProyek);
		

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function tampil_semua_data_by_table($namaTabel){
		$this->db->select('*');
		$this->db->from($namaTabel);

		if($namaTabel == "proyek"){
			$this->db->select('proyek.id as id_proyek');
			$this->db->select('anggota.id as id_anggota');	
			$this->db->select('anggota.nama as nama_anggota');	
			$this->db->join('anggota', 'proyek.id_anggota = anggota.id');
			$this->db->where('aktif !=', '0');
		} 
		
		$this->db->where('status !=', '0');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	// public function delete($id){
	// 	$this->db->where('id',$id)->delete('pesan');
	// }

	public function ajax_get_nama_pekerjaan_by($id){
		$this->db->select('*');
		$this->db->from('proyek');
		$this->db->where('id =', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}
}
?>
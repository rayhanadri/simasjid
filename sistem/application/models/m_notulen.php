<?php 
class M_notulen extends CI_Model
{
	
	// public function create($data_products){
	// 	$this->db->insert('pesan',$data_products);
	// }

	public function all(){
		$hasil = $this->db->get('anggota');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
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
		$this->db->from("master_notulensi");
		$this->db->join('detail_notulensi', 'master_notulensi.id = detail_notulensi.id_notulensi');
		$this->db->join('detail_progres', 'detail_progres.id = detail_notulensi.id_notulensi');
		$this->db->join('proyek', 'proyek.id = detail_progres.id_proyek');
		$this->db->where('proyek.id ', $idProyek);
		

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
}
?>
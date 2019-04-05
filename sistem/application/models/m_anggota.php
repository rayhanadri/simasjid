<?php 
class M_anggota extends CI_Model
{
	
	// public function create($data_products){
	// 	$this->db->insert('pesan',$data_products);
	// }

	public function login($param)
	{
		$query = $this->db->get_where('anggota', $param);
		return $query;
	}

	public function tampil_semua_data_anggota(){
		$this->db->select('*, anggota.id as id_anggota');
		$this->db->from('anggota');
		$this->db->join('jabatan', 'anggota.id_jabatan = jabatan.id');
		$this->db->where('aktif !=', '0');
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
		if($namaTabel == "jabatan"){
			$this->db->where('id !=', '1');
		} else if($namaTabel == "anggota"){
			$this->db->select('anggota.id as id_anggota');	
			$this->db->join('jabatan', 'anggota.id_jabatan = jabatan.id');
			$this->db->where('anggota.id_jabatan >', '1');
			$this->db->where('aktif !=', '0');
		}
		else {
			$this->db->where('aktif !=', '0');
		}
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

	public function insertData($tabel, $data){
		$this->db->insert($tabel, $data);
		return $this->db->affected_rows() > 0 ? true : false;
	}

	public function updateData($tabel, $whereId, $whereData, $data){
		$this->db->where($whereId, $whereData)->update($tabel, $data);
		return $this->db->affected_rows() > 0 ? true : false;
	}

	// public function delete($id){
	// 	$this->db->where('id',$id)->delete('pesan');
	// }
	
}
?>
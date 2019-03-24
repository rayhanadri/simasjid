<?php 
class M_notulen extends CI_Model
{
	
	// public function create($data_products){
	// 	$this->db->insert('pesan',$data_products);
	// }

	public function all(){
		$hasil = $this->db->get('anggota_takmir');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function find($id){
		$hasil = $this->db->where('id',$id)->limit(1)->get('anggota_takmir');
		if ($hasil->num_rows()>0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

	// public function delete($id){
	// 	$this->db->where('id',$id)->delete('pesan');
	// }
}
?>
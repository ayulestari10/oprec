<?php  

class Peserta_model extends CI_Model{
	public $rows = 0;
	private $table;
	private $key;

	function __construct(){
		parent::__construct();
		$this->table 				= 'data';
		$this->key 					= 'id_data';
	}

	function cek_nim($nim){
		$this->db->where('nim', $nim);
		$data = $this->db->get($this->table);
		return $data->result();
	}

	function get_data_byConditional($data){
		$this->db->where($data);
		$query = $this->db->get($this->table);
		return $query;
	}

	function get_all(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_all_category()
	{
		$query = $this->db->query('SELECT kategori FROM ' . $this->table . ' GROUP BY kategori');
		return $query->result();
	}

	function get_dataBy_nim($nim){
		$this->db->where('nim', $nim);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	function get_nim($nim){
		$this->db->where($this->key, $nim);
		$query = $this->db->get($this->table);
		foreach($query->result() as $row){
			$nim = $row->nim;
		}
		return $nim;
	}

	function insert($data){
		return $this->db->insert($this->table, $data);
	}

	function update($nim, $data){
		$this->db->where('nim', $nim);
		return $this->db->update($this->table, $data);
	}

	function delete($id_mhs){
		return $this->db->delete($this->table, array($this->key => $id_mhs));
	}
}

?>
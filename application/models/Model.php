<?php 

/**
* 
*/
class Model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	public function Upload($data)
	{
		$this->db->insert('buku',$data);
	}

	public function insert_kategori($data1)
	{
		$this->db->insert('kategori',$data1);
	}

	public function Indeks()
	{
		$this->db->select('b.Gambar,k.n_kategori, b.Judul,Deskripsi,File');
		$this->db->from('buku b');
		$this->db->join('kategori k','k.Judul=b.Judul');
		$query=$this->db->get();
		return $query->result();
	}

	public function Upload2($data)
	{
		$this->db->set('File',$data['File']);
		$this->db->where('id',$data['id']);
		$this->db->update('buku');

		//$this->db->query("UPDATE". 'buku'. "SET" .'File='.$data["File"].'WHERE'.'Judul = '.$data["Judul"]);
	}

	public function get_id($judul)
	{
		$cond = "judul = "."'".$judul."'";
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where($cond);
		$query=$this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function login($data) {

        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
    
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    // Membaca data dari database
    public function read_user_information($username) {
        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        //$this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
   
       } else {
            return false;
        }
    }

    public function new_user($data)
    {
        $this->db->insert('user',$data);
    }

    function search($keyword)
    {
		$this->db->select('*');
		$this->db->from('buku b');
		$this->db->join('kategori k','k.Judul=b.Judul');
        $this->db->like('b.Judul',$keyword);
        $query  =   $this->db->get();
        return $query->result();
    }
}



 ?>
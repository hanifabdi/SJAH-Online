<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_daftaruser extends CI_model{
	private $t_pengguna = "pengguna";

    public $id_pengguna;
    public $nama_pengguna;
    public $user;
    public $password ;
    public $foto ;

    public function rules()
    {
        return [
            ['field' => 'nama_pengguna',
            'label' => 'nama_pengguna',
            'rules' => 'required'],

            ['field' => 'user',
            'label' => 'user',
            'rules' => 'required'],
            
            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->t_pengguna)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->t_pengguna, ["id_pengguna" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pengguna = uniqid();
        $this->nama_pengguna = $post["nama_pengguna"];
        $this->user = $post["user"];
        $this->password = $post["password"];
        $this->foto = $post["foto"];
        $this->db->insert($this->t_pengguna, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pengguna = $post["id"];
        $this->nama_pengguna = $post["nama_pengguna"];
        $this->user = $post["user"];
        $this->password = $post["password"];
        $this->foto = $post["foto"];
        $this->db->update($this->t_pengguna, $this, array('id_pengguna' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->t_pengguna, array("id_pengguna" => $id));
    }

}
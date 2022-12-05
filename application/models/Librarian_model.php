<?php
class Librarian_model extends CI_Model{

    protected $table= 'librarians';

    public function all(){
        return $this->db->query("SELECT * from $this->table")->result();
    }
    public function findById($id){
        return $this->db->query("select * from $this->table where id=?",[$id])->row();
    }
    public function insert($data){
        $statement= "INSERT INTO $this->table (name,username,email,avatar,password,created_at) VALUES(?,?,?,?,?,?)";
        return $this->db->query($statement,$data);
    }
    public function update($data,$id){
        return $this->db->update($this->table, $data, array('id' => $id));
    }
    public function delete($id){
        $statement ="DELETE FROM $this->table where id=$id";
        return $this->db->query($statement);
    }

}
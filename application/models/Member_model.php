<?php
class Member_model extends CI_Model{

    protected $table= 'members';

    public function all(){
        return $this->db->query("SELECT * from $this->table")->result();
    }
    public function findById($id){
        return $this->db->query("select * from $this->table where id=?",[$id])->row();
    }
    public function insert($data){
        $statement= "INSERT INTO $this->table (nik,full_name,phone,address,born_place,born_date,gender,country,nationality,is_active,created_at) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($statement,$data);
    }
    public function update($data,$id){
        return $this->db->update($this->table, $data, array('id' => $id));  
    }
    public function delete($id){
        $statement ="DELETE FROM $this->table where id=$id";
        return $this->db->query($statement);}

}
<?php
class Book_model extends CI_Model{

    protected $table= 'books';

    public function all(){
        return $this->db->query("SELECT * from $this->table")->result();
    }
    public function findById($id){
        return $this->db->query("select * from $this->table where id=?",[$id])->row();
    }
    public function insert($data){
        $statement= "INSERT INTO $this->table (isbn,title,synopsis,author,publisher,category,language,created_at) VALUES(?,?,?,?,?,?,?,?)";
        return $this->db->query($statement,$data);
    }
    public function update($data,$id){
        $statement = "UPDATE $this->table SET isbn=?,title=?,synopsis=?,author=?,publisher=?,category=?,language=?,created_at=? where id=?";
        $data['id']= $id;
        return $this->db->query($statement,$data);
    }
    public function delete($id){
        $statement ="DELETE FROM $this->table where id=$id";
        return $this->db->query($statement);
    }

}
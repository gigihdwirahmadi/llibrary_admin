<?php
class Borrowdetail_model extends CI_Model{

    protected $table= 'borrow_details';

    public function finddetails($id,$tgl){
        return $this->db->query("SELECT borrow_details.*, books.* from borrow_details inner join books on books.id= borrow_details.book_id where borrow_id=$id and borrow_details.created_at='$tgl'")->result();
    }
    public function findById($id){
        return $this->db->query("select * from $this->table where id=?",[$id])->row();
    }
    public function insert($data){
        return $this->db->insert($this->table, $data);
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
    public function selectbyhdr(){
        return $this->db->query("SELECT books.title, books.id as idb, borrow_details.*,books.* from borrow_details inner join books on borrow_details.book_id = books.id where borrow_id=21");
    }
}
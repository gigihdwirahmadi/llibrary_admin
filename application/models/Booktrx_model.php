<?php
class Booktrx_model extends CI_Model{

    protected $table= 'book_trxs';
    public function all(){
        return $this->db->query("SELECT *, book_trxs.id as idh,book_trxs.created_at as tgl, COUNT(borrow_details.id) as bookquantity, members.*, 5000*COUNT(borrow_details.id) as pricetotal from book_trxs INNER JOIN borrow_details on book_trxs.id= borrow_details.borrow_id inner join members on members.id= book_trxs.member_id GROUP BY book_trxs.id ")->result();
    }

    public function findById($id){
        return $this->db->query("SELECT *, COUNT(borrow_details.id) as bookquantity, members.*, 5000*COUNT(borrow_details.id) as pricetotal from book_trxs INNER JOIN borrow_details on book_trxs.id= borrow_details.borrow_id inner join members on members.id= book_trxs.member_id WHERE book_trxs.id=?;",[$id])->row();
    
    }
    public function findid($id,$tgl){
        return $this->db->query("SELECT * from $this->table WHERE book_trxs.member_id=? and created_at=?",[$id,$tgl])->row();
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

}
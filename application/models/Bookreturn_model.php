<?php
class Booktrx_return extends CI_Model{

    protected $table= 'book_trxs';

    public function all(){
        return $this->db->query("SELECT *, COUNT(return_details.id) as bookquantity, members.*, 5000*COUNT(borrow_details.id) as pricetotal from book_trxs INNER JOIN borrow_details on book_trxs.id= borrow_details.borrow_id inner join members on members.id= book_trxs.member_id GROUP BY book_trxs.id ")->result();
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

}
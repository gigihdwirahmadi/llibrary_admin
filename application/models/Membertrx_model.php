<?php
class Membertrx_model extends CI_Model{

    protected $table= 'member_trxs';

    public function all(){
        return $this->db->query("SELECT member_trxs.*,member_trxs.id as idtrx,member_trxs.status as statustrx,members.*,subscriptions.* FROM `member_trxs`inner join members on member_trxs.member_id=members.id inner join subscriptions on subscriptions.id= member_trxs.subs_id;")->result();
    }
    public function findById($id){
        return $this->db->query("select * from $this->table where id=?",[$id])->row();
    }
    public function insert($data){
        return $this->db->insert($this->table, $data);

    }
    public function update($data,$id){
        return $this->db->update($this->table, $data, array('id' => $id));
       
    }
    public function delete($id){
        $statement ="DELETE FROM $this->table where id=$id";
        return $this->db->query($statement);
    }


} 
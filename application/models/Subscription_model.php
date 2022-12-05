<?php
class Subscription_model extends CI_Model{

    protected $table= 'subscriptions';

    public function all(){
        return $this->db->query("SELECT * from $this->table")->result();
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
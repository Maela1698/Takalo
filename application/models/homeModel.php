<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeModel extends CI_Model{
    public function getOtherObject($id){
        $sql = "select * from object where idUser like %s";
        $sql = sprintf($sql, $id);
        $query = $this->db->query($sql) ;
        
        $retour = null;
        
        foreach($query->result_array() as $row){
             $retour[] = $row;
        }
        return $retour;
        
        
    }
    
    public function getMarge($price){
        $marge[] = $price + ($price*25/100);
        $marge[] = $price - ($price*25/100);
        return $marge;
    }

    public function getObjectSelect($idObject){
        $sql = 'SELECT * FROM object where id=%s';
        $sql = sprintf($sql, $idObject);
        $query = $this->db->query($sql);
        $object = $query->row_array();
        return $object;
    }

    public function getProposition($idObject) {
        // $user_id = $this->session->userdata('user_id');
        $object = $this->getObjectSelect($idObject);
        $marge = $this->getMarge($object['price']);
        
        $sql = 'SELECT * FROM proposition WHERE idUser != %s and price >=%f and price <= %f';
        $sql = sprintf($sql, $object['idUser'],$marge[1],$marge[0]);
        $query = $this->db->query($sql);
        $ObjectUser = array();
        foreach ($query->result_array() as $row) {
            $ObjectUser[] = $row;
        }
        return $ObjectUser;
    }

    public function getObjectExchange($idObject1,$idObject2) {
        $sql = 'SELECT * FROM proposition WHERE idObject = %s or idObject = %s ';
        $sql = sprintf($sql, $idObject1,$idObject2);
        $query = $this->db->query($sql);
        $ObjectUser = array();
        foreach ($query->result_array() as $row) {
            $ObjectUser[] = $row;
        }
        return $ObjectUser;
    }

    public function confirmAsk($idObject1,$idObject2){
        $sql = 'insert into ask values(null,%s,%s,0)';
        $sql = sprintf($sql, $idObject1,$idObject2);
        $this->db->query($sql);
    }

    public function addObject($idCategory,$idUser,$name,$price,$description){
        $sql = "insert into object values(null,%s,%s,'%s','%s','%s')";
        $sql = sprintf($sql, $idCategory,$idUser,$name,$price,$description);
        $this->db->query($sql);
    }

    public function getIdObject(){
        $sql = 'select id from object where id = (select max(id) from object)';
        echo $sql;
        $query = $this->db->query($sql);
        $id = $query->row_array();
        return $id;
    }

    public function insertImageObject($idObject,$path){
        $sql = "insert into imageobject values(%s,'%s')";
        $sql = sprintf($sql,$idObject,$path);
        echo $sql;
        $this->db->query($sql);
    }

    public function getAllCategory(){
        $sql = 'SELECT * FROM category';
        $query = $this->db->query($sql);
        $cat = array();
        foreach ($query->result_array() as $row) {
            $cat[] = $row;
        }
        return $cat;
    }
}
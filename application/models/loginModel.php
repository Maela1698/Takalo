<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginModel extends CI_Model{
    public function checkUser($mail, $mdp){
        $sql = "select * from user where mail like '%s' and mdp like '%s' limit 1";
        $sql = sprintf($sql, $mail, $mdp);
        $query = $this->db->query($sql) ;
        $retour = null;
        foreach($query->result_array() as $row){
            $retour[] = $row;
       }
       return $retour;
    }
    
    public function insertUser($name, $username, $mail, $mdp){
        $sql =  "insert into user values (null, '%s', '%s', '%s', '%s', 0)";
        $sql = sprintf($sql, $name, $username, $mail, $mdp);
        $this->db->query($sql);
    }
}
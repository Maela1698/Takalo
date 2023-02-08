<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model{
    public function get_info(){
        return array('auteur' => 'ChuckNorris',
                    'date'=>'24/07/05', 
                        'email'=>'email@ndd.fr');
    }
}
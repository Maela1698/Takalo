<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){    
        $this->load->view('login') ;
	}
	
	// public function Login(){
	// 	parent::__construct();
	// }
	
	public function controlLogin(){ 
	//post mail, password
        $mail = $this->input->post('mail') ;
		$password = $this->input->post('password');
		
    //load view
		$this->load->model('loginModel') ;   

    
    //checkUser (traitement)
		$retour = $this -> loginModel->checkUser($mail, $password) ;
		
        if($retour !=  null) {	
			$this->session->set_userdata('idUser', $retour[0]['id'])  ;
			$this->session->set_userdata('nameUser', $retour[0]['name'])  ;
			redirect('home/getOtherObject');	
        }
		if($this->session->has_userdata('idUser')){
			redirect('home/getOtherObject');
		}
        else{
			$data = array();
			$data['erreur'] = "Verify your email or password !"  ;
			$this->load->view('login', $data) ;
		}
	}
	
	public function logOut(){
		$this->session->unset_userdata('idUser');
		$this->session->unset_userdata('nameUser');
		$this->load->view('login');
	}
	
	public function inscription(){
		$this->load->view('inscription');
	}
	
	public function controlInscription(){
	//post name, username, mail, mdp
		$name = $this->input->post('name') ;
		$username = $this->input->post('username') ;
		$mail = $this->input->post('email') ;
		$mdp = $this->input->post('password') ;

	//load model
		$this->load->model('loginModel') ;   
		$this->loginModel->insertUser($name, $username, $mail, $mdp);
		
	//redirect
		redirect('login');
	}
	

	
	
	
}
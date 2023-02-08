<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exchange extends CI_Controller {

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
        $this->load->view('home/homeUser') ;
        
	}
	
	public function getObjectId($id){
		echo $id;
        $this->session->set_userdata('idObject1', $id) ;
		$this->load->model('homeModel');
		$data = $this->homeModel->getProposition($this->session->userdata('idObject1'));
		// echo var_dump($data);
		$table = array('data'=> $data,'idObject1',$this->session->userdata('idObject1'));
		$this->load->view('home/exchange',$table);
	}
	
	public function getTwoId($idObject1='',$idObject2='')
	{
		$this->load->model('homeModel');
		$data = $this->homeModel->getObjectExchange($idObject1,$idObject2);
		$table = array('data'=> $data,'idObject1'=>$idObject1, 'idObject2'=>$idObject2);
		$this->load->view('home/confirmation',$table);
	}

    public function confirm($idObject1='',$idObject2='')
	{
        $this->load->helper('url_helper');
		$this->load->model('homeModel');
		$data = $this->homeModel->confirmAsk($idObject1,$idObject2);
        redirect('login/controlLogin');
	}

    public function cancel()
	{
        $this->load->helper('url_helper');
        redirect('login/controlLogin');
	}
    
    // public function exchange($idObject1){
    // // $idObject1 = $this->input->post('object1');
	// 	// $_SESSION['idObject1'] = 1;
    //     echo $idObject1;
    //     $this->session->set_userdata('idObject1', $idObject1) ;
	// 	$this->load->model('homeModel');
	// 	$data = $this->homeModel->getProposition($this->session->userdata('idObject1'));
	// 	// echo var_dump($data);
	// 	$table = array('data'=> $data,'idObject1',$this->session->userdata('idObject1'));
	// 	$this->load->view('home/exchange',$table);
	
    // }
	
	

	
	
	
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Onlineuser extends Controller {
	
	function Onlineuser(){
		parent::Controller();
		
		$this->load->helper('freeradius');
	}
	
	function index(){
		//Security check please		
		$this->freakauth_light->check('user');
		$this->load->model('onlineusermodel');
		
		$data['title'] = "Online Users";
		$data['action'] = "Online Users";
		$data['onlineusers'] = $this->onlineusermodel->get_onlineusers();
		$this->load->view('onlineusers_view',$data);
		}
		
	function disconnect(){
		//Security check please		
		$this->freakauth_light->check('user');
		
		freeradius_disconnectuser($this->uri->segment(2));
		sleep(2);
		redirect('onlineuser');
		
		
	}
		
	
		
}
		
?>

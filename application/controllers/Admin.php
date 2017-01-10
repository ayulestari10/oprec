<?php  

class Admin extends CI_Controller{
	function __construct(){
		$nim = $this->session->userdata('nim');
		if(!isset($nim)){
			redirect('login');
		}
		
	}
}

?>
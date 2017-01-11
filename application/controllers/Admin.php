<?php  

class Admin extends CI_Controller{
	function __construct(){
		$nim = $this->session->userdata('nim');
		if(!isset($nim)){
			redirect('login');
		}
		$this->load->model('Peserta_model');
	}

	function index(){
		$data = array(
			'title'		=> 'Daftar Peserta | Oprec BEM 2017',
			'content'	=> 'list_peserta',
			'data'		=> $this->Peserta_model->get_data_by_conditional(array('dinas1 || dinas2' => $this->session->userdata('dinas1')))
		);
		$this->load->view('frames/templates', $data);
	}
}

?>
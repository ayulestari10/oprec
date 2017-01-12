<?php  

class Admin extends CI_Controller{
	function __construct(){
		$nim 	= $this->session->userdata('nim');
		$role 	= $this->session->userdata('role');
		
		if(!isset($nim, $role) && $role != 'admin'){
			redirect('login');
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Anda tidak terdaftar sebagai admin!</div>');
			exit;
		}
		
		$this->load->model('Peserta_model');
	}

	function index(){
		$data = array(
			'title'		=> 'Daftar Peserta | Oprec BEM 2017',
			'content'	=> 'list_peserta',
			'data'		=> $this->Peserta_model->get_data_byConditional(array('dinas1 || dinas2' => $this->session->userdata('dinas1')))
		);
		$this->load->view('frames/templates', $data);
	}

	function admin(){
		$nim = $this->uri->segment(3);
		
		$data = array(
			'title'		=> 'Detail Peserta',
			'content'	=> 'detail_peserta',
			'dt'		=> $this->Peserta_model->get_dataBy_nim($nim)
		);
		$this->load->view('frames/templates', $data);
	}
}

?>
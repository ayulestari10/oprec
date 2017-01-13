<?php  

class Super_admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$nim 	= $this->session->userdata('nim');
		$role 	= $this->session->userdata('role');
		
		if(!isset($nim, $role) && $role != 'super admin'){
			redirect('login');
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Anda tidak terdaftar sebagai super admin!</div>');
			exit;
		}
		
		$this->load->model('Peserta_model');
	}

	function index(){
		$data = array(
			'title'		=> 'Daftar Semua Peserta',
			'content'	=> 'list_peserta',
			'data'		=> $this->Peserta_model->get_all() 
		);
		$this->load->view('frames/templates', $data);
	}

	function hapus(){
		$id = $this->uri->segment(3);

		if(isset($id)){
			$this->Peserta_model->delete($id);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align: center;">Data berhasil dihapus!</div>');
			redirect('super_admin');
			exit;
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger"  style="text-align: center;">Data tidak berhasil dihapus!</div>');
			redirect('super_admin');
			exit;
		}
	}
}

?>
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

	function detail_peserta(){
		$id =  $this->uri->segment(3);
		
		$data = array(
			'title'		=> 'Detail Peserta',
			'content'	=> 'detail_peserta',
			'dt'		=> $this->Peserta_model->get_dataBy_Id($id)
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

	public function hasil()
	{
		if ($this->input->post('id_data'))
		{
			$id_data = $this->input->post('id_data');
			$this->load->model('peserta_model');
			$peserta = $this->peserta_model->get_dataBy_Id($id_data);
			if (isset($peserta))
			{
				if ($peserta->status == 'lulus')
				{
					$this->peserta_model->update($id_data, ['status' => 'tidak lulus']);
					echo 'tidak lulus';
				}
				else
				{
					$this->peserta_model->update($id_data, ['status' => 'lulus']);
					echo 'lulus';	
				}
			}
		}
	} 
}

?>
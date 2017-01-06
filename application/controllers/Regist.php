<?php  

class Regist extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Peserta_model');
	}

	function index(){
		$this->load->view('home');
	}

	function proses(){
		if($this->input->post('regist')){
			// cek nim jika sudah daftar

			$cek_data = $this->Peserta_model->cek_nim($this->input->post('nim'));

			if($cek_data->rows > 0){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Anda sudah mendaftar sebelumnya!</div>');
				redirect('regist#daftar');
				exit;
			} else {
				if($this->input->post('password1') == $this->input->post('password2')){
					$input= array(
						'nim'		=> $this->input->post('nim'),
						'password'	=> md5($this->input->post('password1'))
					);
					$this->Peserta_model->insert($input);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Anda berhasil mendaftar! Login dan lengkapi data!</div>');
					redirect('regist#daftar');
					exit;
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Password dan Konfirmasi Password Tidak Sama!</div>');
					redirect('regist#daftar');
					exit;
				}
			}
		 } else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Registrasi Gagal!</div>');
			redirect('regist#daftar');
			exit;
		}
	}
}

?>
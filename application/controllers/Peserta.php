<?php  

class Peserta extends CI_Controller{
	function __construct(){
		parent::__construct();
		$nim = $this->session->userdata('nim');
		if(!isset($nim)){
			redirect('login');
			exit;
		}
		$this->load->model('Peserta_model');
	}

	function index(){	
		$data = array(
			'title'		=> 'Daftar',
			'content'	=> 'daftar',
			'dt'		=> $this->Peserta_model->get_dataBy_nim($this->session->userdata('nim'))
		);
		$this->load->view('frames/templates', $data);
	}

	function daftar(){
		$nim = $this->session->userdata('nim');
		if($this->input->post('simpan')){
			$input = array(
				'nama'		=> $this->input->post('nama'),
				'jurusan'	=> $this->input->post('jurusan'),
				'angkatan'	=> $this->input->post('angkatan'),
				'alamat'	=> $this->input->post('alamat'),
				'ttl'		=> $this->input->post('ttl'),
				'no_hp'		=> $this->input->post('no_hp'),
				'dinas1'	=> $this->input->post('dinas1'),
				'alasan1'	=> $this->input->post('alasan1'),
				'dinas2'	=> $this->input->post('dinas2'),
				'alasan2'	=> $this->input->post('alasan2')
			);

			$this->Peserta_model->update($nim, $input);
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data berhasil disimpan!</div>');
			redirect('Peserta');
			exit;
		}
		$data = array(
			'title'		=> 'Daftar',
			'content'	=> 'daftar',
			'dt'		=> $this->Peserta_model->get_dataBy_nim($nim)
		);
		$this->load->view('frames/templates', $data);
	}

	function cetak_ID(){
		$nim = $this->session->userdata('nim');

		$data = array(
			'data'	=> $this->Peserta_model->get_dataBy_nim($nim)
		);
    	
    	$html = $this->load->view('id_card', $data, true);
    	$pdfFilePath = 'ID CARD - '. $nim . '.pdf';
    	$this->load->library('m_pdf');
    	$this->m_pdf->pdf->WriteHTML($html);
    	$this->m_pdf->pdf->Output($pdfFilePath, "D");	
	}
}

?>
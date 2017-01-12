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
		$nim 		= $this->session->userdata('nim');
		
		$nama		= $this->input->post('nama');
		$jurusan 	= $this->input->post('jurusan');
		$angkatan 	= $this->input->post('angkatan');
		$ipk 		= $this->input->post('ipk');
		$alamat 	= $this->input->post('alamat');
		$tempat 	= $this->input->post('tempat');
		$ttl 		= $this->input->post('ttl');
		$no_hp 		= $this->input->post('no_hp');
		$dinas1 	= $this->input->post('dinas1');
		$dinas2		= $this->input->post('dinas2');
		$alasan1 	= $this->input->post('alasan1');
		$alasan2 	= $this->input->post('alasan2');
		$alasan_bem = $this->input->post('alasan_bem');
		$id_line 	= $this->input->post('id_line');


		if($ipk > 4){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">IPK yang anda inputkan tidak boleh lebih dari 4! Isi kembali IPK yang sesuai!</div>');
			redirect('Peserta');
			exit;
		}

		if($this->input->post('simpan')){
			if(isset($nama, $jurusan, $angkatan, $ipk, $alamat, $tempat, $ttl, $no_hp, $dinas1, $dinas2, $alasan1, $alasan2, $alasan_bem, $id_line)){
					$input = array(
					'nama'		=> $nama,
					'jurusan'	=> $jurusan,
					'angkatan'	=> $angkatan,
					'ipk'		=> $ipk,
					'alamat'	=> $alamat,
					'tempat'	=> $tempat,
					'ttl'		=> $ttl,
					'no_hp'		=> $no_hp,
					'dinas1'	=> $dinas1,
					'alasan1'	=> $alasan1,
					'dinas2'	=> $dinas2,
					'alasan2'	=> $alasan2,
					'id_line'	=> $id_line,
					'alasan_bem'=> $alasan_bem,
				);

				$this->Peserta_model->update($nim, $input);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data berhasil disimpan! Cetak ID CARD!</div>');
				redirect('Peserta');
				exit;
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data tidak berhasil disimpan. Lengkap data Anda.!</div>');
				redirect('Peserta');
				exit;
			}
		}
		$data = array(
			'title'		=> 'Daftar',
			'content'	=> 'daftar',
			'dt'		=> $this->Peserta_model->get_dataBy_nim($nim)
		);
		$this->load->view('frames/templates', $data);
	}

	function id_card(){
		
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
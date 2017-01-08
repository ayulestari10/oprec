<style type="text/css">
	div{color: black;}
	#cover{
		width: 360px;
		height: 500px;
		margin-left: 10%;
		border: 2px solid black;
		background: url('<?= base_url("assets/img/header.png") ?>');
		background-size: contain;
	}	
	/*.box{
		width: 340px;
		height: 480px;
		border-radius: 10%;
		margin: 0 auto;
		margin-top: 10px;
		background: white; 
	}*/
	.header{
		margin-top: 5px;  
		width: 355px;
		height: 90px;
	}
	span{
		font-size: 18px;
		font-family: verdana;
	}
	.body{text-align: center;}
	.satu img{
		width: 355px;
		height: 90px;
	}
	#foto{
		height: 152px;
		width: 144px;
		border: 1px solid black;
		margin: 0 auto;
		text-align: center;
		padding: 100px;
		margin-top: 10px; margin-bottom: 15px;
	}
</style>

<div id="cover">
	<div class="header">
		<div class="satu">
			<img src="<?= base_url("assets/img/logo3.png") ?>">
		</div>
	</div>
	<div class="body">
		<div style="margin-bottom: -40px;">
			<span style="font-size: 130px;"><strong>
				<?php if($data->id_data > 0 && $data->id_data <= 9): ?>
					<?= '00'.$data->id_data ?>
				<?php elseif($data->id_data > 9 && $data->id_data <= 99): ?>
					<?= '0'.$data->id_data ?>
				<?php else: ?>
					<?= $data->id_data ?>
				<?php endif; ?>
			</strong></span>
		</div><br>
		<div id="foto">
			3x4
		</div>
		<span><strong><?= $data->nama ?></strong></span><br>
		<span><?= $data->jurusan?></span><br>
		<span><?= $data->angkatan ?></span><br>
		<p style="font-size: 18px; font-family: verdana;">Dinas 1 : <?= $data->dinas1 ?><br>
		Dinas 2 : <?= $data->dinas2 ?></p>
	</div>
</div>

<div style="margin-top: 60px;">
	<p style="font-size: 16px;">
		 Ketika Wawancara Open Recruitment BEM KM Fasilkom 2017. Peserta wajib membawa persyaratan berikut.<br>
	    <ul>
	    	<li>Membawa uang akomodasi sebesar Rp. 20.000 untuk fasilitas makan siang dan snack pada saat workshop.</li>
	    	<li>Membawa foto diri close up ukuran 3r (1lembar).</li>
	    	<li>Menggunakan Kartu peserta yang telah di download dari web pendaftaran.</li>
	    </ul>
	</p>
</div>
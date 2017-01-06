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
</style>

<div id="cover">
	<div class="header">
		<div class="satu">
			<img src="<?= base_url("assets/img/logo3.png") ?>">
		</div>
	</div>
	<div class="body">
		<div style="margin-top: -10px; margin-bottom: -40px;">
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
		<span><strong><?= $data->nama ?></strong></span><br>
		<span><?= $data->jurusan?></span><br>
		<span><?= $data->angkatan ?></span><br>
		<span>Dinas 1 : <?= $data->dinas1 ?></span><br>
		<span>Dinas 2 : <?= $data->dinas2 ?></span><br>
	</div>
</div>

<div style="margin-top: -100px;">
	<p style="font-size: 16px;">
		 Ketika Wawancara Open Recruitment BEM KM Fasilkom 2017. Peserta wajib membawa persyaratan berikut.<br>
	    <ul>
	    	<li>Uang akomodasi sebesar 20k untuk fasilitas makan siang, snack pagi dan sore.</li>
	    	<li>Foto Close Up ukuran 4R.</li>
	    	<li>Menggunakan ID CARD.</li>
	    </ul>
	</p>
</div>
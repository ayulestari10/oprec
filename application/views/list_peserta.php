<div class="container">
	<div class="row">
		<div class="col-md-11">
			<h2 style="text-align: center;">List Peserta</h2>
			<div style="margin-bottom: 5%; margin-top: 3%;">
				<?php  
					$msg = $this->session->userdata('msg'); 
					if(isset($msg)){
						echo $msg;
					}
				?>
			</div>
			<table class="table table-striped">
				<thead>
					<th>No</th>
					<th>Foto</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Aksi</th>
				</thead>
				<tbody>
			<?php
				$i = 1; 
				foreach($data as $row): ?>
					<tr>
						<td><?= $i++ ?></td>
						<td></td>
						<td><?= $row->nim ?></td>
						<td><?= $row->nama ?></td>
						<td>
							<a href="<?= base_url('admin/detail_peserta/'.$row->id_data) ?>" class="btn btn-info"><i class="fa fa-info"> Detail</i></a>
							<?php  
								$role = $this->session->userdata('role');
								if($role == 'super_admin'):
							?>
								<a href="<?= base_url('super_admin/hapus/'.$row->id_data) ?>" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
							<?php endif; ?>
						</td>
					</tr>
			<?php endforeach; ?>
				</tbody>
				</table>
		</div>
	</div>
</div>
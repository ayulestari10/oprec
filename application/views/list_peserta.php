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
					<th>Dinas 1</th>
					<th>Dinas 2</th>
					<th>Aksi</th>
				</thead>
				<tbody>
			<?php
				$i = 1; 
				foreach($data as $row): ?>
					<?php if ($row->role != 'admin'): ?>
					<tr>
						<td><?= $i++ ?></td>
						<td><img src="https://akademik.unsri.ac.id/images/foto_mhs/<?= $row->angkatan ?>/<?= $row->nim ?>.jpg" width="100" height="150" alt="foto"></td>
						<td><?= $row->nim ?></td>
						<td><?= $row->nama ?></td>
						<td><?= $row->dinas1 ?></td>
						<td><?= $row->dinas2 ?></td>
						<td>
							<?php  
								$role = $this->session->userdata('role');
								if($role == 'admin'): 
							?>
								<a href="<?= base_url('admin/detail_peserta/'.$row->id_data) ?>" class="btn btn-info"><i class="fa fa-info"> Detail</i></a>
							<?php elseif($role == 'super admin'): ?>
								<a href="<?= base_url('super_admin/detail_peserta/'.$row->id_data) ?>" class="btn btn-info"><i class="fa fa-info"> Detail</i></a>
							<?php if ($row->status == 'lulus'): ?>
								<button onclick="changeStatus(<?= $row->id_data ?>, this)" class="btn btn-success"><i class="fa fa-check"></i> Lulus</button>
							<?php else: ?>
								<button onclick="changeStatus(<?= $row->id_data ?>, this)" class="btn btn-danger"><i class="fa fa-close"></i> Tidak Lulus</button>
							<?php endif; ?>
							<?php elseif($role == 's_admin'): ?>
								<a href="<?= base_url('super_admin/detail_peserta/'.$row->id_data) ?>" class="btn btn-info"><i class="fa fa-info"> Detail</i></a>
							<?php endif; ?>
						</td>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
				</tbody>
				</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	function changeStatus(id_data, btn) {
		$.ajax({
			url: '<?= base_url('super_admin/hasil') ?>',
			type: 'POST',
			data: {
				id_data: id_data
			},
			success: function(response) {
				if (response == 'lulus') {
					$(btn).removeClass('btn-danger');
					$(btn).addClass('btn-success');
					$(btn + " i").removeClass('fa-close');
					$(btn + " i").addClass('fa-check');
				} else if (response == 'tidak lulus') {
					$(btn).removeClass('btn-success');
					$(btn).addClass('btn-danger');
					$(btn + " i").removeClass('fa-check');
					$(btn + " i").addClass('fa-close');
				}
			},
			error: function (e) {
				console.log(e.responseText);
			}
		});
	}
</script>
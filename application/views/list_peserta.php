<div class="container">
	<div class="row">
		<div class="col-md-11">
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
						<td><a href="<?= base_url('Peserta/detail/'.$row->id_data) ?>"><i class="fa fa-info"> Detail</i></a></td>
					</tr>
			<?php endforeach; ?>
				</tbody>
				</table>
		</div>
	</div>
</div>
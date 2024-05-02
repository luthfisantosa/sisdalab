<!--page-wrapper-->
<div class="page-wrapper">
	<!--page-content-wrapper-->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="card">
				<div class="card-header"><?= $card_title; ?></div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="table_pad" class="table display" style="width:100%">
							<thead>
								<tr>
									<th>CV/PT</th>
									<th>Nomor Rekening Laporan Kegiatan</th>
									<!-- <th>Nomor Rekening PAD</th> -->
									<!-- <th>Pekerjaan</th> -->
									<!-- <th>Penyedia Jasa</th> -->
									<!-- <th>Nama Kegiatan</th> -->
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php $pre = null ?>
								<?php foreach($datatables as $dt): ?>
								<tr>
									<td><?= $dt->cv; ?></td>
									<!-- <td><?= $dt->kode_rekening; ?></td> -->
									<!-- <td><?= $dt->rekening; ?></td> -->
									<!-- <td><?= $dt->jenis_pekerjaan; ?></td> -->
									<!-- <td><?= $dt->cv; ?></td> -->
									<td><?= $dt->nama_kegiatan; ?></td>

									<?php
										if($dt->kode_rekening == $dt->rekening){
											if($dt->kode_rekening == "" && $dt->rekening == ""){
												echo "<td><span class='badge badge-danger'>BELUM DIBAYAR</span></td>";
											}else{	
												echo "<td><span class='badge badge-success'>SUDAH DIBAYAR</span></td>";
											}
										}else{
											echo "<td><span class='badge badge-danger'>BELUM DIBAYAR</span></td>";
										}
									?>
									
								</tr>
								<?php $pre = $dt->no_reg; ?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function () {
		//Default data table
		$('#table_pad').DataTable();

		$('.currency').inputmask({
	        alias: 'currency',
	        rightAlign: false,
	        radixPoint: '.',
	        autoGroup: true,
	        groupSeparator: ',',
	        digits: 2,
	        digitsOptional: false,
	        prefix: '$ ',
	        placeholder: '0',
	        removeMaskOnSubmit: true
	    });
	});
</script>
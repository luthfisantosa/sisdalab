<!--page-wrapper-->
<div class="page-wrapper">
	<!--page-content-wrapper-->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="card">
				<div class="card-header"><?= $card_title; ?></div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="table_kegiatan" class="table table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>No PAD</th>
									<th>Tanggal Dibuat</th>
									<th>No Laporan</th>
									<th>Kode Rekening</th>
									<th>Nama Kegiatan</th>
									<th>CV</th>
									<th>Jenis Pekerjaan</th>
									<th>Nama Pemborong</th>
									<th>Wilayah</th>
									<th>ABT</th>
									<th>PIC Input</th>
									<th>Tanggal input</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($datatables as $dt): ?>
								<tr>
									<td> <?= $dt->no_reg; ?> </td>
									<td> <?= $dt->tanggal_dibuat; ?> </td>
									<td> <?= $dt->no_laporan; ?> </td>
									<td> <?= $dt->kode_rekening; ?> </td>
									<td> <?= $dt->nama_kegiatan; ?> </td>
									<td> <?= $dt->cv; ?> </td>
									<td> <?= $dt->jenis_pekerjaan; ?> </td>
									<td> <?= $dt->nama_pemborong; ?> </td>
									<td> <?= $dt->wilayah; ?> </td>
									<td> <?= $dt->abt; ?> </td>
									<td> <?= $dt->date_created; ?> </td>
									<td> <?= $dt->created_by; ?> </td>
								</tr>
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
		$('#table_kegiatan').DataTable();

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
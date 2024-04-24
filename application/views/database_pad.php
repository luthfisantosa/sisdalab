<!--page-wrapper-->
<div class="page-wrapper">
	<!--page-content-wrapper-->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="card">
				<div class="card-header"><?= $card_title; ?></div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="table_pad" class="table table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>No PAD</th>
									<th>Tanggal</th>
									<th>Rekening</th>
									<th>Kegiatan</th>
									<th>Penyedia Jasa</th>
									<th>Jenis Pengujian</th>
									<th>Jumlah</th>
									<th>Satuan</th>
									<th width="200%">Harga Satuan</th>
									<th>Jumlah (Rp)</th>
									<th>Total dari Jumlah</th>
								</tr>
							</thead>
							<tbody>
								<?php $pre = null ?>
								<?php foreach($datatables as $dt): ?>
								<tr>
									<?php 
										if($pre == null){
											echo "<td>".$dt->no_pad."</td>";
											echo "<td>".$dt->tanggal."</td>";
											echo "<td>".$dt->rekening."</td>";
											echo "<td>".$dt->kegiatan."</td>";
											echo "<td>".$dt->penyedia_jasa."</td>";
											echo "<td>".$dt->jenis_pengujian."</td>";
											echo "<td>".$dt->jumlah."</td>";
											echo "<td>".$dt->satuan."</td>";
											echo "<td>Rp.<span class='float-right currency'>".$dt->harga."</span></td>";
											echo "<td>Rp.<span class='float-right currency'>".$dt->jumlah_rp."</span></td>";
											echo "<td class='text-danger'><b>Rp.<span class='float-right currency'>".$dt->total."</span></b></td>";
										}else{
											if($pre !== $dt->no_pad){
												echo "<td style='font-weight:bold;'>".$dt->no_pad."</td>";
												echo "<td style='font-weight:bold;'>".$dt->tanggal."</td>";
												echo "<td style='font-weight:bold;'>".$dt->rekening."</td>";
												echo "<td style='font-weight:bold;'>".$dt->kegiatan."</td>";
												echo "<td style='font-weight:bold;'>".$dt->penyedia_jasa."</td>";
												echo "<td style='font-weight:bold;'>".$dt->jenis_pengujian."</td>";
												echo "<td style='font-weight:bold;'>".$dt->jumlah."</td>";
												echo "<td style='font-weight:bold;'>".$dt->satuan."</td>";
												echo "<td>Rp.<span class='float-right currency'>".$dt->harga."</span></td>";
												echo "<td>Rp.<span class='float-right currency'>".$dt->jumlah_rp."</span></td>";
												echo "<td>Rp.<span class='float-right currency'><b>".$dt->total."</span></b></td>";
											}else{
												echo "<td style='color:transparent;'>".$dt->no_pad."</td>";
												echo "<td style='color:transparent;'>".$dt->tanggal."</td>";
												echo "<td style='color:transparent;'>".$dt->rekening."</td>";
												echo "<td style='color:transparent;'>".$dt->kegiatan."</td>";
												echo "<td style='color:transparent;'>".$dt->penyedia_jasa."</td>";
												echo "<td>".$dt->jenis_pengujian."</td>";
												echo "<td>".$dt->jumlah."</td>";
												echo "<td>".$dt->satuan."</td>";
												echo "<td>Rp.<span class='float-right currency'>".$dt->harga."</span></td>";
												echo "<td>Rp.<span class='float-right currency'>".$dt->jumlah_rp."</span></td>";
												echo "<td style='color:transparent;'>".$dt->total."</td>";
											}
										}
									?>
								</tr>
								<?php $pre = $dt->no_pad; ?>
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
		$('#table_pad').DataTable({
		});

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
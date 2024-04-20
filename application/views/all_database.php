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
									<th width="200%">Harga</th>
									<th>Jumlah (Rp)</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $pre = null ?>
								<?php foreach($datatables as $dt): ?>
								<tr>
									<?php 
										if($pre == null){
											echo "<th>".$dt->no_pad."</td>";
											echo "<th>".$dt->tanggal."</td>";
											echo "<th>".$dt->rekening."</td>";
											echo "<th>".$dt->kegiatan."</td>";
											echo "<th>".$dt->penyedia_jasa."</td>";
											echo "<th>".$dt->jenis_pengujian."</td>";
											echo "<th>".$dt->jumlah."</td>";
											echo "<th>".$dt->satuan."</td>";
											echo "<th>Rp.<span class='float-right currency'>".$dt->harga."</span></td>";
											echo "<th>Rp.<span class='float-right currency'>".$dt->jumlah_rp."</span></td>";
											echo "<th>Rp.<span class='float-right currency'><b>".$dt->total."</span></b></td>";
										}else{
											if($pre !== $dt->no_pad){
												echo "<th style='font-weight:bold;'>".$dt->no_pad."</td>";
												echo "<th style='font-weight:bold;'>".$dt->tanggal."</td>";
												echo "<th style='font-weight:bold;'>".$dt->rekening."</td>";
												echo "<th style='font-weight:bold;'>".$dt->kegiatan."</td>";
												echo "<th style='font-weight:bold;'>".$dt->penyedia_jasa."</td>";
												echo "<th style='font-weight:bold;'>".$dt->jenis_pengujian."</td>";
												echo "<th style='font-weight:bold;'>".$dt->jumlah."</td>";
												echo "<th style='font-weight:bold;'>".$dt->satuan."</td>";
												echo "<th>Rp.<span class='float-right currency'>".$dt->harga."</span></td>";
												echo "<th>Rp.<span class='float-right currency'>".$dt->jumlah_rp."</span></td>";
												echo "<th>Rp.<span class='float-right currency'><b>".$dt->total."</span></b></td>";
											}else{
												echo "<th style='color:transparent;'>".$dt->no_pad."</td>";
												echo "<th style='color:transparent;'>".$dt->tanggal."</td>";
												echo "<th style='color:transparent;'>".$dt->rekening."</td>";
												echo "<th style='color:transparent;'>".$dt->kegiatan."</td>";
												echo "<th style='color:transparent;'>".$dt->penyedia_jasa."</td>";
												echo "<th>".$dt->jenis_pengujian."</td>";
												echo "<th>".$dt->jumlah."</td>";
												echo "<th>".$dt->satuan."</td>";
												echo "<th>Rp.<span class='float-right currency'>".$dt->harga."</span></td>";
												echo "<th>Rp.<span class='float-right currency'>".$dt->jumlah_rp."</span></td>";
												echo "<th style='color:transparent;'>".$dt->total."</td>";
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
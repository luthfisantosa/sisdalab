<!--page-wrapper-->
<div class="page-wrapper">
	<!--page-content-wrapper-->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="card">
				<div class="card-header"><?= $card_title; ?></div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="table_pad" class="table" cellspacing="0" style="width:100%">
							<thead>
								<tr>
									<th>No PAD</th>
									<th>Tanggal</th>
									<th>Kode Rekening</th>
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
								<?php $pre = null; $indicator = 1; ?>
								<?php foreach($datatables as $dt): ?>
								<?php
									$indicator = $dt->no_pad % 2;
									if($indicator != null){
										$bg_color = "#f2f2f2";
									}else{
										$bg_color = "#ffffff";
									}
								?>
								<tr style="background-color: <?= $bg_color; ?>;">
									<?php 
										if($pre == null){
											echo "<td>".$dt->no_pad."</td>";
											echo "<td>".$dt->tanggal."</td>";
											echo "<td>".$dt->kode_rekening."</td>";
											echo "<td>".$dt->rekening."</td>";
											echo "<td>".$dt->kegiatan."</td>";
											echo "<td>".$dt->penyedia_jasa."</td>";
											echo "<td>".$dt->jenis_pengujian."</td>";
											echo "<td>".$dt->jumlah."</td>";
											echo "<td>".$dt->satuan."</td>";
											echo "<td>Rp.<span class='float-right currency'>".$dt->harga."</span></td>";
											echo "<td>Rp.<span class='float-right currency'>".$dt->jumlah_rp."</span></td>";
											echo "<td class='text-danger'><b>Rp. <span class='float-right currency'>".$dt->total."</span></b></td>";
										}else{
											if($pre !== $dt->no_pad){
												echo "<td style='font-weight:;'>".$dt->no_pad."</td>";
												echo "<td style='font-weight:;'>".$dt->tanggal."</td>";
												echo "<td style='font-weight:;'>".$dt->kode_rekening."</td>";
												echo "<td style='font-weight:;'>".$dt->rekening."</td>";
												echo "<td style='font-weight:;'>".$dt->kegiatan."</td>";
												echo "<td style='font-weight:;'>".$dt->penyedia_jasa."</td>";
												echo "<td style='font-weight:;'>".$dt->jenis_pengujian."</td>";
												echo "<td style='font-weight:;'>".$dt->jumlah."</td>";
												echo "<td style='font-weight:;'>".$dt->satuan."</td>";
												echo "<td>Rp.<span class='float-right currency'>".$dt->harga."</span></td>";
												echo "<td>Rp.<span class='float-right currency'>".$dt->jumlah_rp."</span></td>";
												echo "<td class='text-danger'><b>Rp. <span class='float-right currency'>".$dt->total."</span></b></td>";
											}else{
												echo "<td style='color:transparent;'>".$dt->no_pad."</td>";
												echo "<td style='color:transparent;'>".$dt->tanggal."</td>";
												echo "<td style='color:transparent;'>".$dt->kode_rekening."</td>";
												echo "<td style='color:transparent;'>".$dt->rekening."</td>";
												echo "<td style='color:transparent;'>".$dt->kegiatan."</td>";
												echo "<td style='color:transparent;'>".$dt->penyedia_jasa."</td>";
												echo "<td>".$dt->jenis_pengujian."</td>";
												echo "<td>".$dt->jumlah."</td>";
												echo "<td>".$dt->satuan."</td>";
												echo "<td>Rp.<span class='float-right currency'>".$dt->harga."</span></td>";
												echo "<td>Rp.<span class='float-right currency'>".$dt->jumlah_rp."</span></td>";
												echo "<td class='text-danger' style='color:transparent;'></td>";
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
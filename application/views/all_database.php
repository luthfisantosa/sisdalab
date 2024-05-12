<!--page-wrapper-->
<div class="page-wrapper">
	<!--page-content-wrapper-->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="card">
				<div class="card-header"><?= $card_title; ?></div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="table_pad" class="table table-borderless" style="width:100%" cellpadding="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal Setor</th>
									<th>CV/PT</th>
									<th>Nomor Rekening Laporan Kegiatan</th>
									<th>Uraian Pekerjaan</th>
									<th>Harga</th>
									<th>Jumlah</th>
									<th>SubTotal</th>
									<th>Total</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no = 0;
									$pre = null;
									$pre_rek = null;
									$current_rek = null;
								?>
								<?php foreach($datatables as $dt): ?>
								<?php 
									$current_rek = $dt->rekening.$dt->cv;
									if($current_rek == $pre_rek){
										$text_color = "text-light";
										$bg_color = "";
									}else{
										$text_color = "text-dark";
										$bg_color = "bg-warning";
										$no++;
									}
								?>
								<tr>
									<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $no; ?></td>
									<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->tanggal; ?></td>
									<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->cv; ?></td>
									<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->rekening; ?></td>
									<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->jenis_pekerjaan; ?></td>
									<td class="<?= $bg_color; ?> "><?= $dt->harga; ?></td>
									<td class="<?= $bg_color; ?> "><?= $dt->jumlah; ?></td>
									<td class="<?= $bg_color; ?> "><?= $dt->jumlah_rp; ?></td>
									<td class="<?= $bg_color; ?> "><?= $dt->total; ?></td>

									<?php
										if($dt->kode_rekening == $dt->rekening){
											if($dt->kode_rekening == "" && $dt->rekening == ""){
												echo "<td class='. $bg_color . $text_color .'><span class='badge badge-danger'>BELUM DIBAYAR</span></td>";
											}else{	
												echo "<td class='. $bg_color . $text_color . '><span class='badge badge-success'>SUDAH DIBAYAR</span></td>";
											}
										}else{
											echo "<td class='. $bg_color . $text_color . '><span class='badge badge-danger'>BELUM DIBAYAR</span></td>";
										}
									?>
									
								</tr>
								<?php 
									$pre = $dt->no_reg;
									$pre_rek = $dt->rekening.$dt->cv;
								?>
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
			order: [[ 3, 'desc' ]]                
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
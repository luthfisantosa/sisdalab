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
									<th>No PAD</th>
									<th>Tanggal Setor</th>
									<th>Nama Kegiatan</th>
									<th>Nama Lokasi</th>
									<th>CV/PT</th>
									<th>Pemborong</th>
									<th>Nomor Rekening Laporan Kegiatan</th>
									<th>Jenis Pengujian</th>
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
								<?php foreach ($datatables as $dt) : ?>
									<?php
									$current_rek = $dt->rekening . $dt->cv;
									if ($current_rek == $pre_rek) {
										$text_color = "text-transparent";
										$bg_color = "";
									} else {
										$text_color = "text-dark";
										$bg_color = "bg-warning";
										$no++;
									}
									?>
									<tr>
										<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $no; ?></td>
										<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->no_pad; ?></td>
										<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->tanggal; ?></td>
										<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->nama_kegiatan; ?></td>
										<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->nama_lokasi; ?></td>
										<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->cv; ?></td>
										<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->pemborong; ?></td>
										<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->rekening; ?></td>
										<td class="<?= $bg_color; ?> <?= $text_color; ?>"><?= $dt->jenis_pengujian; ?></td>
										<td class="<?= $bg_color; ?> "><?= $dt->uraian_pengujian; ?></td>
										<td class="<?= $bg_color; ?> currency">Rp. <?= $dt->harga; ?></td>
										<td class="<?= $bg_color; ?> "><?= $dt->jumlah; ?></td>
										<td class="<?= $bg_color; ?> currency">Rp. <?= $dt->jumlah_rp; ?></td>
										<td class="<?= $bg_color; ?> currency">Rp.<?= $dt->total; ?></td>

										<?php
										if ($dt->kode_rekening == $dt->rekening) {
											if ($dt->kode_rekening == "" && $dt->rekening == "") {
												echo "<td class='. $bg_color . $text_color .'><span class='badge badge-danger'>BELUM DIBAYAR</span></td>";
											} else {
												echo "<td class='. $bg_color . $text_color . '><span class='badge badge-success'>SUDAH DIBAYAR</span></td>";
											}
										} else {
											echo "<td class='. $bg_color . $text_color . '><span class='badge badge-danger'>BELUM DIBAYAR</span></td>";
										}
										?>

									</tr>
									<?php
									$pre = $dt->no_reg;
									$pre_rek = $dt->rekening . $dt->cv;
									?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<!-- <div class="card">
				<div class="card-header"><?= $card_title; ?></div>
			</div>
			<div class="card-body">
				<div class="card">
					<div class="card-header"><?= $card_title; ?></div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="display table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>No PAD</th>
										<th>Tanggal Setor</th>
										<th>Nama Kegiatan</th>
										<th>Nama Lokasi</th>
										<th>CV/PT</th>
										<th>Pemborong</th>
										<th>Nomor Rekening Laporan Kegiatan</th>
										<th>Jenis Pengujian</th>
										<th>Uraian Pengujian</th>
										<th>Harga</th>
										<th>Jumlah</th>
										<th>Subtotal</th>
										<th>Status</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
		//Default data table
		$('#table_pad').DataTable({
			dom: 'Bfrtip',
			buttons: [{
				extend: 'pdfHtml5',
				orientation: 'landscape',
				pageSize: 'LEGAL'
			},'excel']
		});

		$('.currency').inputmask({
			alias: 'currency',
			rightAlign: false,
			radixPoint: '.',
			autoGroup: true,
			groupSeparator: ',',
			digits: 2,
			digitsOptional: false,
			prefix: 'Rp ',
			placeholder: '0',
			removeMaskOnSubmit: true
		});

		//2nd version
		var currencyFormatter = new Intl.NumberFormat('id-ID', {
			style: 'currency',
			currency: 'IDR'
		});

		var table = $('#example').DataTable({
			"ajax": {
				"url": "<?= base_url('All_database/fetchData'); ?>",
				"type": "GET",
				"dataSrc": "data"
			},
			dom: 'Bfrtip',
			buttons: [{
					extend: 'pdfHtml5',
					text: 'Export to PDF',
					orientation: 'landscape', // Set the orientation to landscape
					pageSize: 'A4',
					customize: function(doc) {
						// Set the margins
						doc.pageMargins = [0, 0, 0, 0]; // [left, top, right, bottom]

					}
				},
				{
					extend: 'print',
					text: 'Cetak',
					orientation: 'landscape', // Set the orientation to landscape
					pageSize: 'A4',
					"drawCallback": function(settings) {
						var api = this.api();
						var rows = api.rows({
							page: 'all'
						}).nodes();
						var last = null;
						var groupTotal = 0;

						var allData = api.column(0, {
							page: 'all'
						}).data();

						var priceData = api.column(13, {
							page: 'all'
						}).data();

						allData.each(function(type, i) {
							var price = parseFloat(priceData[i]) || 0;
							if (last !== type) {
								if (last !== null) {
									$(rows).eq(i - 1).after(
										'<tr class="group bg-warning"><td colspan="12">Total no PAD ' + last + '</td><td><h6>' + currencyFormatter.format(groupTotal) + '</h6></td></tr>'
									);
								}
								last = type;
								groupTotal = 0;
							}
							groupTotal += price;
						});

						if (last !== null) {
							$(rows).eq(rows.length - 1).after(
								'<tr class="group bg-warning"><td colspan="12">Total no PAD ' + last + '</td><td><h6>' + currencyFormatter.format(groupTotal) + '</h6></td></tr>'
							);
						}

						var overallTotal = priceData.reduce(function(a, b) {
							return (parseFloat(a) || 0) + (parseFloat(b) || 0);
						}, 0);

						$(api.column(12).footer()).html(currencyFormatter.format(overallTotal));
					}
				}
			],
			"columns": [{
					"data": "laporan_kegiatan.no_reg"
				},
				{
					"data": "pad.id_pad"
				},
				{
					"data": "laporan_kegiatan.kode_rekening"
				},
				{
					"data": "pad.tanggal"
				},
				{
					"data": "laporan_kegiatan.nama_kegiatan"
				},
				{
					"data": "laporan_kegiatan.cv"
				},
				{
					"data": "pad.pemborong"
				},
				{
					"data": "laporan_kegiatan.kode_rekening"
				},
				{
					"data": "pad.jenis_pengujian"
				},
				{
					"data": "pad.uraian_pengujian"
				},
				{
					"data": "harga",
					"render": function(data, type, row) {
						return currencyFormatter.format(data);
					}
				},
				{
					"data": "pad.jumlah"
				},
				{
					"data": "pad.jumlah_rp",
					"render": function(data, type, row) {
						return currencyFormatter.format(data);
					}
				},
				{
					"data": "pad.pemborong"
				}
			],
			"drawCallback": function(settings) {
				var api = this.api();
				var rows = api.rows({
					page: 'all'
				}).nodes();
				var last = null;
				var groupTotal = 0;

				var allData = api.column(0, {
					page: 'all'
				}).data();

				var priceData = api.column(13, {
					page: 'all'
				}).data();

				allData.each(function(type, i) {
					var price = parseFloat(priceData[i]) || 0;
					if (last !== type) {
						if (last !== null) {
							$(rows).eq(i - 1).after(
								'<tr class="group bg-warning"><td colspan="13">Total no PAD ' + last + '</td><td><h6>' + currencyFormatter.format(groupTotal) + '</h6></td></tr>'
							);
						}
						last = type;
						groupTotal = 0;
					}
					groupTotal += price;
				});

				if (last !== null) {
					$(rows).eq(rows.length - 1).after(
						'<tr class="group bg-warning"><td colspan="13">Total no PAD ' + last + '</td><td><h6>' + currencyFormatter.format(groupTotal) + '</h6></td></tr>'
					);
				}

				var overallTotal = priceData.reduce(function(a, b) {
					return (parseFloat(a) || 0) + (parseFloat(b) || 0);
				}, 0);

				$(api.column(13).footer()).html(currencyFormatter.format(overallTotal));
			}
		});
	});
</script>
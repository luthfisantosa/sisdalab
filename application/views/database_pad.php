<!--page-wrapper-->
<div class="page-wrapper">
	<!--page-content-wrapper-->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="card">
				<div class="card-header"><?= $card_title; ?></div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="display table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>No PAD</th>
									<th>Tanggal</th>
									<th>Kode Rekening</th>
									<th>Kegiatan</th>
									<th>Lokasi</th>
									<th>Penyedia Jasa</th>
									<th>Pemborong</th>
									<th>Jenis Pengujian</th>
									<th>Uraian Pengujian</th>
									<th>Jumlah</th>
									<th>Satuan</th>
									<th width="200%">Harga Satuan</th>
									<th>Jumlah (Rp)</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
		var currencyFormatter = new Intl.NumberFormat('id-ID', {
			style: 'currency',
			currency: 'IDR'
		});

		var table = $('#example').DataTable({
			"ajax": {
				"url": "<?= base_url('Database_pad/fetchData'); ?>",
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

						var priceData = api.column(12, {
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
					"data": "no_pad"
				},
				{
					"data": "tanggal"
				},
				{
					"data": "kode_rekening"
				},
				{
					"data": "kegiatan"
				},
				{
					"data": "lokasi"
				},
				{
					"data": "penyedia_jasa"
				},
				{
					"data": "pemborong"
				},
				{
					"data": "jenis_pengujian"
				},
				{
					"data": "uraian_pengujian"
				},
				{
					"data": "jumlah"
				},
				{
					"data": "satuan"
				},
				{
					"data": "harga",
					"render": function(data, type, row) {
						return currencyFormatter.format(data);
					}
				},
				{
					"data": "jumlah_rp",
					"render": function(data, type, row) {
						return currencyFormatter.format(data);
					}
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

				var priceData = api.column(12, {
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
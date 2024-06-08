<!--page-wrapper-->
<div class="page-wrapper">
	<!--page-content-wrapper-->
	<div class="page-content-wrapper">
		<div class="page-content">
			<?php if ($this->session->flashdata('notif') != '') : ?>
				<script>
					Swal.fire({
						title: "<?= $this->session->flashdata('notif_title') ?>",
						text: "<?= $this->session->flashdata('notif') ?>",
						icon: "<?= $this->session->flashdata('notif_icon') ?>"
					});
				</script>
			<?php endif; ?>
			<div class="card">
				<div class="card-header">
					<?= $card_title; ?>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="table_kegiatan" class="table table-bordered table-striped display" style="width:100%">
							<thead>
								<tr>
									<th>No Reg</th>
									<th>Tanggal Dibuat</th>
									<th>No Laporan</th>
									<th>Kode Rekening</th>
									<th>Nama Kegiatan</th>
									<th>Nama Lokasi</th>
									<th>CV</th>
									<th>Jenis Pekerjaan</th>
									<th>Tipe</th>
									<th>Nama Pemborong</th>
									<th>Wilayah</th>
									<th>ABT</th>
									<th>Tanggal input</th>
									<th>Penginput</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($datatables as $dt) : ?>
									<tr>
										<td>
											<?= $dt->no_reg; ?>
										</td>
										<td>
											<?= $dt->tanggal_dibuat; ?>
										</td>
										<td>
											<?= $dt->no_laporan; ?>
										</td>
										<td>
											<?= $dt->kode_rekening; ?>
										</td>
										<td>
											<?= $dt->nama_kegiatan; ?>
										</td>
										<td>
											<?= $dt->nama_lokasi; ?>
										</td>
										<td>
											<?= $dt->cv; ?>
										</td>
										<td>
											<?= $dt->jenis_pekerjaan; ?>
										</td>
										<td>
											<?= $dt->tipe_pekerjaan; ?>
										</td>
										<td>
											<?= $dt->nama_pemborong; ?>
										</td>
										<td>
											<?= $dt->wilayah; ?>
										</td>
										<td>
											<?= $dt->abt; ?>
										</td>
										<td>
											<?= $dt->date_created; ?>
										</td>
										<td>
											<?= $dt->created_by; ?>
										</td>
										<td>
											<button class="delete-btn btn btn-sm btn-danger" data-id="<?= $dt->id_kegiatan; ?>">Hapus</button>
										</td>
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
	$(document).ready(function() {
		//Default data table
		var table = $('#table_kegiatan').DataTable({
			dom: 'Bfrtip', // Add buttons to the DOM
			buttons: [
				'excel',
				'pdf',
				'print' // Add print button
			]
		});

		// Attach click event handler to delete buttons
		$('#table_kegiatan tbody').on('click', 'button.delete-btn', function() {
			var id = $(this).data('id');
			var row = $(this).closest('tr');

			Swal.fire({
				title: "Apakah anda yakin?",
				text: "Anda akan menghapus data!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Ya!"
			}).then((result) => {
				if (result.isConfirmed) {
					// Send AJAX request to delete row
					$.ajax({
					    url: '<?php echo base_url("Database_kegiatan/delete_row"); ?>',
					    type: 'POST',
					    data: { id: id },
					    success: function(response) {
					        if (response === 'success') {
								Swal.fire({
									title: "Terhapus!",
									text: "Data sudah terhapus",
									icon: "success"
								});
					            table.row(row).remove().draw(false);
					        } else {
					            Swal.fire({
									title: "Gagal!",
									text: "Data gagal terhapus",
									icon: "error"
								});
					        }
					    }
					});
				}
			});
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
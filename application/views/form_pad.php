<!--page-wrapper-->
<div class="page-wrapper">
	<!--page-content-wrapper-->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="card">
				<div class="card-header"><?= $card_title; ?></div>
				<div class="card-body">
					<form id="userForm">
						<div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mt-1">
                                    <label>No</label><small class="text-danger">*</small>
                                    <input type="text" name="no" id="_no" class="form-control form-control-sm" placeholder="Nomor" value="" required />
                                </div>
                                <div class="form-group mt-1">
                                    <label>CV/PT</label><small class="text-danger">*</small>
                                    <input type="text" name="cv" id="_cv" class="form-control form-control-sm" placeholder="cv" value="" required />
                                </div>
                                <div class="form-group mt-1">
                                    <label>No SPK</label><small class="text-danger">*</small>
                                    <input type="text" name="no_spk" id="_no_spk" class="form-control form-control-sm" placeholder="no_spk" value="" required />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Tanggal SPK</label><small class="text-danger">*</small>
                                    <input type="date" name="tanggal_spk" id="_tanggal_spk" class="form-control form-control-sm" placeholder="tanggal spk" value="" format="dd/mm/yyyy" required />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Lokasi</label><small class="text-danger">*</small>
                                    <input type="text" name="lokasi" id="_lokasi" class="form-control form-control-sm" placeholder="Lokasi pengujian" value=""required />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Jenis Pengujian</label><small class="text-danger">*</small>
                                    <input type="text" name="jenis_pengujian" id="_lokasi" class="form-control form-control-sm" placeholder="Jenis Pengujian" value=""required />
                                </div>
                                <div class="form-group mt-1">
                                	<div id="uraianContainer">
										<div class="uraian-input">
											<label>Uraian</label><small class="text-danger">*</small><br>
											<input type="text" class="uraian form-control" name="uraian[]" placeholder="Uraian" required>
											<button type="button" class="removeUraian form-control form-control-sm btn btn-sm btn-danger">hapus uraian</button>
										</div>
									</div>
                                </div>
								<button type="button" id="addUraian" class="btn btn-sm btn-success">Tambah Uraian</button>
								<br><br>
								<div class="form-group mt-1">
                                    <label>Total</label><small class="text-danger">*</small>
                                    <input type="number" name="total" id="_total" class="form-control form-control-sm" placeholder="Total" value="" required/>
                                </div>

								<div class="form-group mt-1">
                                    <input type="submit" id="_submit" class="btn btn-sm btn-primary float-right" value="Simpan" />
                                </div>
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function () {
		document.getElementById("addUraian").addEventListener("click", function() {
			const uraianContainer = document.getElementById("uraianContainer");
			const newUraianInput = document.createElement("div");
			newUraianInput.classList.add("uraian-input");
			newUraianInput.innerHTML = `
			<input type="text" class="uraian form-control" name="uraian[]" placeholder="uraian" required><br>
			<button type="button" class="removeUraian form-control form-control-sm btn btn-sm btn-danger">x</button>
			`;
			uraianContainer.appendChild(newUraianInput);

	      // Add event listener to remove hobby button
			newUraianInput.querySelector(".removeUraian").addEventListener("click", function() {
				newUraianInput.remove();
			});
		});

	    // Add event listener to remove hobby button for existing hobbies
		document.querySelectorAll(".removeUraian").forEach(function(button) {
			button.addEventListener("click", function() {
				button.parentElement.remove();
			});
		});

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
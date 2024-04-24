<!--page-wrapper-->
<div class="page-wrapper">
	<!--page-content-wrapper-->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="card">
				<div class="card-header"><?= $card_title; ?></div>
				<div class="card-body">
					<form id="userForm" name="userForm" method="POST">
						<div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mt-1">
                                    <label>No</label><small class="text-danger">*</small>
                                    <input type="text" name="no" id="_no" class="form-control form-control-sm" placeholder="Nomor" value=""  />
                                </div>
                                <div class="form-group mt-1">
                                    <label>CV/PT</label><small class="text-danger">*</small>
                                    <input type="text" name="cv" id="_cv" class="form-control form-control-sm" placeholder="cv" value=""  />
                                </div>
                                <div class="form-group mt-1">
                                    <label>No SPK</label><small class="text-danger">*</small>
                                    <input type="text" name="no_spk" id="_no_spk" class="form-control form-control-sm" placeholder="no_spk" value=""  />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Tanggal SPK</label><small class="text-danger">*</small>
                                    <input type="date" name="tanggal_spk" id="_tanggal_spk" class="form-control form-control-sm" placeholder="tanggal spk" value="" format="dd/mm/yyyy"  />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Lokasi</label><small class="text-danger">*</small>
                                    <input type="text" name="lokasi" id="_lokasi" class="form-control form-control-sm" placeholder="Lokasi pengujian" value="" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Jenis Pengujian</label><small class="text-danger">*</small>
                                    <input type="text" name="jenis_pengujian" id="_lokasi" class="form-control form-control-sm" placeholder="Jenis Pengujian" value="" />
                                </div>
                                <div class="form-group border border-5 mt-1 p-4" >
                                	<div id="uraianContainer">
										<div class="uraian-input">
											<label class="badge-info form-control">Tambah Uraian PAD | Uraian 1 <small class="text-danger">*</small></label><br>
											<input type="text" class="uraian form-control" name="uraian[]" placeholder="Deskripsi Uraian" ><br>
											<input type="number" class="jumlah form-control" name="jumlah[]" placeholder="Jumlah" min="0" ><br>
											<input type="text" class="item form-control" name="item[]" placeholder="Item" ><br>
											<input type="number" class="harga_satuan form-control" name="harga_satuan[]" placeholder="Harga Satuan" min="0" ><br>
											<button type="button" class="removeUraian btn btn-sm btn-danger float-right"><span class="bx bx-trash"></span> hapus uraian</button>
										</div>
									</div>
									<button type="button" id="addUraian" class="form-control form-control-sm btn btn-sm btn-success mt-2"><span class="bx bx-plus"></span> Tambah Uraian</button>
                                </div>
								<br><br>
								<div class="form-group mt-1">
                                    <label>Total</label><small class="text-danger">*</small>
                                    <input type="number" name="total" id="_total" class="form-control form-control-sm" placeholder="Total" value="" readonly />
                                </div>
								<div class="form-group mt-1">
                                    <button type="submit" id="_submit" class="btn btn-sm btn-primary float-right">SIMPAN</button>
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
		var i = 1;
		document.getElementById("addUraian").addEventListener("click", function() {
			const uraianContainer = document.getElementById("uraianContainer");
			const newUraianInput = document.createElement("div");
			i++;
			newUraianInput.classList.add("uraian-input");
			newUraianInput.innerHTML = `
			<div class="mt-5">
			<label class="badge-info form-control">Uraian `+ i +` <small class="text-danger">*</small></label><br>
			<input type="text" class="uraian form-control" name="uraian[]" placeholder="deskripsi uraian" required><br>
			<input type="number" class="jumlah form-control" name="jumlah[]" placeholder="Jumlah" min="0" required><br>
			<input type="text" class="item form-control" name="item[]" placeholder="Item" required><br>
			<input type="number" class="harga_satuan form-control" name="harga_satuan[]" placeholder="Harga Satuan" min="0" required><br>
			<button type="button" class="removeUraian btn btn-sm btn-danger float-right">hapus uraian</button>
			</div>
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

		$("#userForm").on("submit", function(event) {
			var no = $("#_no").val();
			var cv = $("#_cv").val();
			var no_spk = $("#_no_spk").val();
			var tanggal_spk = $("#_tanggal_spk").val();
			var lokasi = $("#_lokasi").val();
			var uraian = $(".uraian").val();

		    event.preventDefault(); // Prevent form submission

		    // Collect form data as an array of objects
		    const dataArray = $(this).serializeArray();

		    // Log the array data (you can use it as you like)
		    console.log(no + cv + no_spk + tanggal_spk + lokasi + uraian);

		    // Collect form data as FormData object
		      const formData = new FormData(this);

		      // Collect data from dynamically added inputs and append to FormData
		      $(".uraian-input").each(function() {
		        const description = $(this).find(".uraian").val();
		        const quantity = $(this).find(".jumlah").val();
		        const price = $(this).find(".item").val();
		        const total = $(this).find(".harga_satuan").val();

		        formData.append("description[]", description);
		        formData.append("quantity[]", quantity);
		        formData.append("price[]", price);
		        formData.append("total[]", total);
		      });

		      // Log the FormData object (you can use it as you like)
		      for (const pair of formData.entries()) {
		        console.log(pair[0] + ': ' + pair[1]);
		      }
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
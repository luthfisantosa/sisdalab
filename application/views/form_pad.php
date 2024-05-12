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
                                    <input type="text" name="no" id="_no" class="form-control form-control-sm" placeholder="Nomor" value="<?= $last_num; ?>" readonly />
                                </div>
                                <div class="form-group mt-1">
                                    <label>CV/PT</label><small class="text-danger">*</small>
                                    <input type="text" name="cv" id="_cv" class="form-control form-control-sm" placeholder="cv" value="cv abadi"  />
                                </div>
                                <div class="form-group mt-1">
                                    <label>No Rekening</label><small class="text-danger">*</small>
                                    <input type="text" name="no_rekening" id="_no_rekening" class="form-control form-control-sm" placeholder="no_rekening" value="123.1234.1294029"  />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Tanggal SPK</label><small class="text-danger">*</small>
                                    <input type="date" name="tanggal_spk" id="_tanggal_spk" class="form-control form-control-sm" placeholder="tanggal spk" value="" format="dd/mm/yyyy"  value="10/10/2024" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Lokasi</label><small class="text-danger">*</small>
                                    <input type="text" name="lokasi" id="_lokasi" class="form-control form-control-sm" placeholder="Lokasi pengujian" value="Cikampek" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Jenis Pengujian</label><small class="text-danger">*</small>
                                    <input type="text" name="jenis_pengujian" id="_jenis_pengujian" class="form-control form-control-sm" placeholder="Jenis Pengujian" value="test jalan" />
                                </div>
                                <div class="form-group border border-5 mt-1 p-4" >
                                	<div id="uraianContainer">
										<div class="uraian-input">
											<label class="badge-info form-control">Tambah Uraian PAD | Uraian 1 <small class="text-danger">*</small></label><br>
											<input type="text" class="uraian form-control" name="uraian[]" placeholder="Deskripsi Uraian" value="uraian"><br>
											<input type="number" class="jumlah form-control" name="jumlah[]" placeholder="Jumlah" min="0" value="2"><br>
											<input type="text" class="item form-control" name="item[]" placeholder="Item" value="item 1"><br>
											<input type="number" class="harga_satuan form-control" name="harga_satuan[]" placeholder="Harga Satuan" min="0" value="1000"><br>
											<input type="number" class="subtotal form-control" name="subtotal[]" placeholder="Sub Total" min="0" readonly><br>
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
                                    <input type="submit" id="_submit" class="btn btn-sm btn-primary float-right" value="SIMPAN">
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
		
		$("#userForm").on("submit", function(event) {
			event.preventDefault(); // Prevent form submission

			var no = $("#_no").val();
			var cv = $("#_cv").val();
			var no_rekening = $("#_no_rekening").val();
			var tanggal_spk = $("#_tanggal_spk").val();
			var lokasi = $("#_lokasi").val();
			var jenis_pengujian = $("._jenis_pengujian").val();
			var total = 0;
			var bag = [];

		    // Collect form data as FormData object
		    const formData = new FormData(this);

		      // Collect data from dynamically added inputs and append to FormData
		    $(".uraian-input").each(function() {
		    	const uraian = $(this).find(".uraian").val();
		    	const jumlah = $(this).find(".jumlah").val();
		    	const item = $(this).find(".item").val();
		    	const harga_satuan = $(this).find(".harga_satuan").val();
		    	subtotal = $(this).find(".harga_satuan").val() * 2;

		    	if (uraian && jumlah && item && harga_satuan && subtotal && total) {
		    		formData.append("uraian[]", uraian);
			    	formData.append("jumlah[]", jumlah);
			    	formData.append("item[]", item);
			    	formData.append("harga_satuan[]", harga_satuan);
			    	formData.append("subtotal[]", subtotal);
			    	total = total + subtotal;
			    	formData.append("total[]", total);	
		    	}
		    });

		    var y=0;

		    // Log the FormData object (you can use it as you like)
		    for (const pair of formData.entries()) {
		    	console.log(pair[0] + ': ' + pair[1]);
		    	bag.push(pair[1]);
		    	y++;
		    }

		    y = y-7;
		    const insert_loop = y/5;

		    console.log(bag[7]*bag[9]);
		});

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
			<input type="number" class="subtotal form-control" name="subtotal[]" placeholder="Sub Total" min="0" readonly><br>
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
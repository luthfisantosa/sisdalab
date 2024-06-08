<!--page-wrapper-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-header">
                    <?= $card_title; ?>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Database_kegiatan/form_submit'); ?>" method="POST">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group mt-1">
                                    <label>Tanggal</label><small class="text-danger">*</small>
                                    <input type="text" name="tanggal_dibuat" id="_tanggal" class="form-control form-control-sm" placeholder="tanggal" value="" required />
                                </div>
                                <div class="form-group mt-1">
                                    <label>No Registrasi</label><small class="text-danger">*</small>
                                    <input type="text" name="no_registrasi" id="_no_registrasi" class="form-control form-control-sm" placeholder="Nomor Registrasi" value="<?= $last_num; ?>" readonly />
                                </div>
                                <div class="form-group mt-1">
                                    <label>No Laporan</label><small class="text-danger">*</small>
                                    <input type="text" name="no_laporan" id="_no_laporan" class="form-control form-control-sm" placeholder="Nomor Laporan" value="" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Wilayah</label><small class="text-danger">*</small>
                                    <select name="wilayah" id="_wilayah" class="form-control form-control-sm">
                                        <option value="" selected>-- Select --</option>
                                        <option value="karawang">Karawang</option>
                                        <option value="karawang">Cikampek</option>
                                        <option value="telaga sari">Telaga sari</option>
                                        <option value="rengasdengklok">Rengasdengklok</option>
                                    </select>
                                </div>
                                <div class="form-group mt-1">
                                    <label>ABT/Non ABT</label><small class="text-danger">*</small>
                                    <select name="abt" id="_abt" class="form-control form-control-sm">
                                        <option value="abt">ABT</option>
                                        <option value="non-abt" selected>Non ABT</option>
                                    </select>
                                </div>
                                <div class="form-group mt-1">
                                    <label>Tipe</label><small class="text-danger">*</small>
                                    <select name="tipe_pekerjaan" id="_tipe" class="form-control form-control-sm">
                                        <option value="swasta">Swasta</option>
                                        <option value="dinas" selected>Dinas</option>
                                    </select>
                                </div>
                                <div class="form-group mt-1">
                                    <label>Kode Rekening</label><small class="text-danger">*</small>
                                    <input type="text" name="kode_rekening" id="_kode_rekening" class="form-control form-control-sm" placeholder="Kode Rekening" value="" required />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Nama Kegiatan</label><small class="text-danger">*</small>
                                    <input type="text" name="nama_kegiatan" id="_kegiatan" class="form-control form-control-sm" placeholder="Kegiatan" value="" required />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Nama Lokasi</label><small class="text-danger">*</small>
                                    <input type="text" name="nama_lokasi" id="_lokasi" class="form-control form-control-sm" placeholder="Lokasi" value="" required />
                                </div>
                                <div class="form-group mt-1">
                                    <label>CV/PT</label><small class="text-danger">*</small>
                                    <input type="text" name="cv" id="_cv" class="form-control form-control-sm" placeholder="Penyedia Jasa" value="" required />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Pemborong</label><small class="text-danger">*</small>
                                    <input type="text" name="nama_pemborong" id="_pemborong" class="form-control form-control-sm" placeholder="Pemborong" value="" required />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Jenis Pekerjaan</label><small class="text-danger">*</small>
                                    <input type="text" name="jenis_pekerjaan" id="_jenis_pekerjaan" class="form-control form-control-sm" placeholder="Jenis Pekerjaan" value="" required />
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
    $(document).ready(function() {
        // Get current date
        var currentDate = new Date();

        // Format date as "d/m/yyyy"
        var day = currentDate.getDate();
        var month = currentDate.getMonth() + 1; // Month is zero-based
        var year = currentDate.getFullYear();

        // Add leading zeros if necessary
        if (day < 10) {
            day = '0' + day;
        }
        if (month < 10) {
            month = '0' + month;
        }
        // Construct formatted date string
        var formattedDate = day + '/' + month + '/' + year;
        // Set the value of the input field to the current date
        document.getElementById('_tanggal').value = formattedDate;

        $('#_tipe').on('change', function() {
            var tipe = $('#_tipe').val();
            var no_registrasi = $('#_no_registrasi').val();
            if (tipe == 'dinas') {
                $('#_kode_rekening').val('');
            } else if (tipe == 'swasta') {
                $('#_kode_rekening').val('sw.' + no_registrasi);
            }
        });

        $('#_submit').on('click', function(event) {
            var wilayah = $('#_wilayah').val();

            if (wilayah == "") {
                Swal.fire({
                    title: "Maaf!",
                    text: "Form Wilayah harap untuk diisi!",
                    icon: "error"
                });
                event.preventDefault();
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
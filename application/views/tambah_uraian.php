<!--page-wrapper-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-header">Form PAD / <?= $card_title; ?></div>
                <div class="card-body">
                    <form action="<?= base_url('Database_pad/tambahUraian'); ?>" id="userForm" name="userForm" method="POST">
                        <div id="_form1">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group mt-1">
                                        <label>No PAD</label><small class="text-danger">*</small>
                                        <input type="text" name="no_pad" id="_no_pad" class="form-control form-control-sm" placeholder="Nomor" value="<?= $no_pad; ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group mt-1">
                                        <label>CV/PT</label><small class="text-danger">*</small>
                                        <input type="text" name="cv" id="_cv" class="form-control form-control-sm" placeholder="Contoh: CV Abadi" value="<?= $penyedia_jasa; ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mt-1">
                                        <label>Kode Rekening</label><small class="text-danger">*</small>
                                        <input type="text" name="kode_rekening_rekening" id="_kode_rekening" class="form-control form-control-sm" placeholder="kode_rekening" value="<?= $kode_rekening; ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mt-1">
                                        <label>Tanggal SPK</label><small class="text-danger">*</small>
                                        <input type="date" name="tanggal_spk" id="_tanggal_spk" class="form-control form-control-sm" placeholder="tanggal spk" format="dd/mm/yyyy" value="<?= $tanggal; ?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group mt-1">
                                        <label>Lokasi</label><small class="text-danger">*</small>
                                        <input type="text" name="lokasi" id="_lokasi" class="form-control form-control-sm" placeholder="Lokasi pengujian" value="<?= $lokasi; ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group mt-1">
                                        <label>Jenis Pengujian</label><small class="text-danger">*</small>
                                        <input type="text" name="jenis_pengujian" id="_jenis_pengujian" class="form-control form-control-sm" placeholder="Jenis Pengujian" value="<?= $jenis_pengujian; ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group mt-1">
                                        <label>No Rekening</label><small class="text-danger">*</small>
                                        <input type="text" name="no_rekening" id="_no_rekening" class="form-control form-control-sm" placeholder="Jenis Pengujian" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group mt-1">
                                        <label>Nama Pemborong</label><small class="text-danger">*</small>
                                        <input type="text" name="nama_pemborong" id="_nama_pemborong" class="form-control form-control-sm" value="<?= $nama_pemborong; ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group mt-1">
                                        <label>Kegiatan</label><small class="text-danger">*</small>
                                        <input type="text" name="kegiatan" id="_kegiatan" class="form-control form-control-sm" value="<?= $kegiatan; ?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group mt-1">
                                        <label id="_label_uraian" class="badge badge-primary">Uraian</label>
                                        <input type="hidden" name="index_uraian" id="_index_uraian" class="form-control form-control-sm" value="<?= $uraian ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group mt-1">
                                        <label>Uraian Pengujian *</label>
                                        <input type="text" name="uraian_pengujian" id="_uraian_pengujian" class="form-control form-control-sm" placeholder="Contoh: Pemeriksaan Test CBR" />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mt-1">
                                        <label>Jumlah Titik *</label>
                                        <input type="number" name="jumlah" id="_jumlah" class="form-control form-control-sm" min="0" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mt-1">
                                        <label>Harga *</label>
                                        <input type="number" name="harga" id="_harga" class="form-control form-control-sm" min="0" />
                                        <small id="_harga_label" class="text-info">Rp.-</small>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group mt-1">
                                        <label>Satuan *</label>
                                        <select name="satuan" id="_satuan" class="form-control form-control-sm">
                                            <option value="">Pilih Satuan</option>
                                            <option value="Titik">Titik</option>
                                            <option value="Kali">Kali</option>
                                            <option value="Buah">Buah</option>
                                            <option value="sample">Sample</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group mt-1">
                                        <label>Jumlah Harga (Rp)</label><br>
                                        <label id="_label_jumlah_rupiah" class="badge-success"></label>
                                        <input type="hidden" name="jumlah_rp" id="_jumlah_rp" class="form-control form-control-sm" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group mt-1">
                                        <label>Total Harga (Rp)</label><br>
                                        <label id="_label_total_rupiah" class="badge-success"></label>
                                        <input type="hidden" name="total_harga" id="_total_harga" class="form-control form-control-sm" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group mt-1">
                                        <label>Grand Total (Rp)</label><br>
                                        <!-- <h4 id="_label_grand_total" class="badge-success"></h4> -->
                                        <input type="number" name="grand_total" id="_grand_total" class="form-control form-control-sm" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button id="_simpan" class="btn btn-sm btn-primary float-right">Simpan Data</button>
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
    var no_pad = $("#_no_pad").val();
    var jumlah_rp;

    function get_summary(no_pad) {
        $.ajax({
            url: '<?= base_url("Database_pad/get_summary"); ?>',
            type: 'GET',
            data: {
                no_pad: no_pad
            },
            success: function(response) {
                if (response == '') {
                    $('#_grand_total').val(jumlah_rp);
                    $('#_label_grand_total').html('Rp. ' + jumlah_rp);
                    console.log('0');
                } else {
                    $('#_label_grand_total').html(
                        'Rp. ' + parseFloat(response) + parseFloat(jumlah_rp)
                    );
                    $('#_grand_total').val(
                        parseFloat(response) + parseFloat(jumlah_rp)
                    );
                    console.log(response);
                }
            }
        });
    }

    get_summary(no_pad);

    var tanggal_spk = $("#_tanggal_spk").val();
    var kode_rek = $("#_kode_rekening").val();
    var kode_rek_split = kode_rek.split("/");
    $("#_no_rekening").val(kode_rek_split[2]);

    $('#_harga').on('keyup', function() {
        const output = parseInt($('#_harga').val()).toLocaleString();
        const harga = parseFloat($('#_harga').val());
        const jumlah = parseFloat($('#_jumlah').val());

        if (output == '' || output == null) {
            $('#_harga_label').html('');
        }

        jumlah_rp = harga * jumlah;
        const output_jumlah = parseInt(jumlah_rp).toLocaleString();
        const total_rp = <?= $uraian ?> * jumlah_rp;
        const output_total_rp = parseInt(total_rp).toLocaleString();

        $('#_harga_label').html('Rp' + output);
        $('#_label_jumlah_rupiah').html('Rp' + output_jumlah + ' X ' + <?= $uraian ?>);
        $('#_label_total_rupiah').html('Rp' + output_total_rp);

        $('#_jumlah_rp').val(jumlah_rp);
        $('#_total_harga').val(total_rp);
        // updating grand total
        get_summary(no_pad);


    });

    $('#_jumlah').on('keyup', function() {
        const output = parseInt($('#_harga').val()).toLocaleString();
        const harga = parseFloat($('#_harga').val());
        const jumlah = parseFloat($('#_jumlah').val());

        if (output == '' || output == null) {
            $('#_harga_label').html('');
        }

        jumlah_rp = harga * jumlah;
        const output_jumlah = parseInt(jumlah_rp).toLocaleString();
        const total_rp = <?= $uraian ?> * jumlah_rp;
        const output_total_rp = parseInt(total_rp).toLocaleString();

        $('#_harga_label').html('Rp' + output);
        $('#_label_jumlah_rupiah').html('Rp' + output_jumlah + ' X ' + <?= $uraian ?>);
        $('#_label_total_rupiah').html('Rp' + output_total_rp);
        $('#_jumlah_rp').val(jumlah_rp);
        $('#_total_harga').val(total_rp);
        // updating grand total
        get_summary(no_pad);

    });

    $('#_simpan').on('click', function() {
        event.preventDefault();
        const cv = $("#_cv").val();
        const kode_rekening = kode_rek;
        const no_rekening = $("#_no_rekening").val();
        const nama_pemborong = $("#_nama_pemborong").val();
        const tanggal_spk = $("#_tanggal_spk").val();
        const lokasi = $("#_lokasi").val();
        const jenis_pengujian = $("#_jenis_pengujian").val();
        const uraian_pengujian = $("#_uraian_pengujian").val();
        const kegiatan = $("#_kegiatan").val();
        const jumlah = $("#_jumlah").val();
        const harga = $("#_harga").val();
        const satuan = $("#_satuan").val();
        jumlah_rp = $("#_jumlah_rp").val();
        const total = $("#_total_harga").val();
        const grand_total = $("#_grand_total").val();
        const index_uraian = $("#_index_uraian").val();

        console.log(no_pad + cv + no_rekening + kode_rekening + nama_pemborong + tanggal_spk + lokasi + jenis_pengujian + uraian_pengujian + jumlah + harga + kegiatan + grand_total);

        Swal.fire({
            title: "Apakah anda ingin menambah uraian?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Tidak",
            denyButtonText: "Tambah uraian"
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                // Jika tidak menambah uraian
                // Jika menambah uraian
                $.ajax({
                    type: 'POST',
                    data: {
                        no_pad: no_pad,
                        cv: cv,
                        no_rekening: no_rekening,
                        kode_rekening: kode_rekening,
                        nama_pemborong: nama_pemborong,
                        kegiatan: kegiatan,
                        tanggal_spk: tanggal_spk,
                        lokasi: lokasi,
                        jenis_pengujian: jenis_pengujian,
                        uraian_pengujian: uraian_pengujian,
                        jumlah: jumlah,
                        satuan: satuan,
                        harga: harga,
                        jumlah_rp: jumlah_rp,
                        total: grand_total,
                        action: "no_more",
                        index_uraian: index_uraian
                    },
                    url: '<?= base_url("Database_pad/tambahUraian") ?>',
                    success: function(data) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Data sudah tersimpan",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // updating grand total
                        get_summary(no_pad);


                    }
                });
            } else if (result.isDenied) {
                // Jika menambah uraian
                $.ajax({
                    type: 'POST',
                    data: {
                        no_pad: no_pad,
                        cv: cv,
                        no_rekening: no_rekening,
                        kode_rekening: kode_rekening,
                        nama_pemborong: nama_pemborong,
                        kegiatan: kegiatan,
                        tanggal_spk: tanggal_spk,
                        lokasi: lokasi,
                        jenis_pengujian: jenis_pengujian,
                        uraian_pengujian: uraian_pengujian,
                        jumlah: jumlah,
                        satuan: satuan,
                        harga: harga,
                        jumlah_rp: jumlah_rp,
                        total: grand_total,
                        action: "add_more",
                        index_uraian: index_uraian
                    },
                    url: '<?= base_url("Database_pad/tambahUraian") ?>',
                    success: function(data) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Data sudah tersimpan",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // updating grand total
                        get_summary(no_pad);


                    }
                });
            }
        });
    });
</script>
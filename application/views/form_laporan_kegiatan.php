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
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group mt-1">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" id="_tanggal" class="form-control form-control-sm"
                                        placeholder="tanggal" value="" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>No Registrasi</label>
                                    <input type="text" name="no_registrasi" id="_no_registrasi" class="form-control form-control-sm" placeholder="Nomor registrasi" value="" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>No Laporan</label>
                                    <input type="text" name="no_laporan" id="_no_laporan" class="form-control form-control-sm" placeholder="Nomor laporan" value="" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Wilayah</label>
                                    <select name="wilayah" id="_wilayah" class="form-control form-control-sm">
                                        <option value="" selected>-- Select --</option>
                                        <option value="cikampek">Cikampek</option>
                                    </select>
                                </div>
                                <div class="form-group mt-1">
                                    <label>ABT/Non ABT</label>
                                    <select name="abt" id="_abt" class="form-control form-control-sm">
                                        <option value="abt">ABT</option>
                                        <option value="non-abt">Non ABT</option>
                                    </select>
                                </div>
                                <div class="form-group mt-1">
                                    <label>Kode Rekening</label>
                                    <input type="text" name="kode_rekening" id="_kode_rekening" class="form-control form-control-sm" placeholder="Kode Rekening" value="" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Kegiatan</label>
                                    <input type="text" name="kegiatan" id="_kegiatan" class="form-control form-control-sm" placeholder="kegiatan" value="" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi" id="_lokasi" class="form-control form-control-sm" placeholder="lokasi" value="" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>CV/PT</label>
                                    <input type="text" name="cv" id="_cv" class="form-control form-control-sm" placeholder="cv" value="" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Pemborong</label>
                                    <input type="text" name="pemborong" id="_pemborong" class="form-control form-control-sm" placeholder="pemborong" value="" />
                                </div>
                                <div class="form-group mt-1">
                                    <label>Jenis Pekerjaan</label>
                                    <input type="text" name="jenis_pekerjaan" id="_jenis_pekerjaan" class="form-control form-control-sm" placeholder="jenis pekerjaan" value=""/>
                                </div>
                                <div class="form-group mt-1">
                                    <label>Tipe</label>
                                    <select name="tipe" id="_tipe" class="form-control form-control-sm">
                                        <option value="swasta">Swasta</option>
                                        <option value="dinas">Dinas</option>
                                    </select>
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

        // Get the current date in the format yyyy-mm-dd
        const currentDate = new Date().toISOString().split('T')[0];
        // Set the value of the input field to the current date
        document.getElementById('_tanggal').value = currentDate;

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
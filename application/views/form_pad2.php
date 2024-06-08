<!--page-wrapper-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-header"><?= $card_title; ?></div>
                <div class="card-body">
                    <form action="<?= base_url('Database_pad/tambahUraian'); ?>" id="userForm" name="userForm" method="POST">
                        <div id="_form1">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group mt-1">
                                        <label>No PAD</label><small class="text-danger">*</small>
                                        <input type="text" name="no_pad" id="_no" class="form-control form-control-sm" placeholder="Nomor" value="<?= $last_num; ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group mt-1">
                                        <label>CV/PT</label><small class="text-danger">*</small>
                                        <input type="text" name="cv" id="_cv" class="form-control form-control-sm" placeholder="Penyedia Jasa" value="" required />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mt-1">
                                        <label>No Rekening</label><small class="text-danger">*</small>
                                        <input type="text" name="kode_rekening" id="_kode_rekening" class="form-control form-control-sm" placeholder="Kode Rekening" value="" required />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mt-1">
                                        <label>Tanggal SPK</label><small class="text-danger">*</small>
                                        <input type="date" name="tanggal_spk" id="_tanggal_spk" class="form-control form-control-sm" placeholder="tanggal spk" value="" format="dd/mm/yyyy" value="" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group mt-1">
                                        <label>Nama Pemborong</label><small class="text-danger">*</small>
                                        <input type="text" name="nama_pemborong" id="_nama_pemborong" class="form-control form-control-sm" placeholder="Contoh: Budi" value="" required />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mt-1">
                                        <label>Lokasi</label><small class="text-danger">*</small>
                                        <input type="text" name="lokasi" id="_lokasi" class="form-control form-control-sm" placeholder="Lokasi Pengujian" value="" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-1">
                                        <label>Jenis Pengujian</label><small class="text-danger">*</small>
                                        <input type="text" name="jenis_pengujian" id="_jenis_pengujian" class="form-control form-control-sm" placeholder="Contoh: Pekerjaan Beton Non Ampar" value="" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group mt-1">
                                        <label>Kegiatan</label><small class="text-danger">*</small>
                                        <input type="text" name="kegiatan" id="_kegiatan" class="form-control form-control-sm" placeholder="Contoh: Peningkatan Jalan" value="" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-sm btn-primary float-right" value="Tambah Uraian">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
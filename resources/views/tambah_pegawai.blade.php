<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Tambah Pegawai &mdash; Evlap Tracking</title>
  </head>
  @extends('layouts.master')
  @section('page-title')
  <h1>Tambah Pegawai </h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="/datapegawai">Data Pegawai</a></div>
    <div class="breadcrumb-item">Tambah Pegawai</div>
</div>
  @endsection

  @section('content')
  <section class="section">
    <div class="section-body">
      <form method="POST" action="{{route('pegawai.store')}}">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                @csrf
                <div class="form-group row mb-4">
                  <label for ="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" id="name" name="name" tabindex="1" required autofocus>
                  </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="nip" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIP</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" maxlength="18" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" id="nip" name="nip" tabindex="2"required>
                      <span class="error-message" style="display: none;">Minimal 18 karakter</span>
                    </div>
                  </div>
                <div class="form-group row mb-4">
                  <label for="role" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric" id="role" name="role" required>
                        <option value="penanggung_jawab">Penanggung Jawab</option>
                        <option value="wakil_penanggung_jawab">Wakil Penanggung Jawab</option>
                        <option value="ketua_tim">Ketua Tim</option>
                        <option value="anggota_tim">Anggota Tim</option>
                        <option value="anggota_tim_pendukung">Anggota Tim Pendukung</option>
                        <option value="pengendali_teknis">Pengendali Teknis</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7 text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
   <!-- General JS Scripts -->

  @endsection




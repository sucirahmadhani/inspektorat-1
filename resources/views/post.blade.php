@extends('user.layout')

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pengajuan LHP &mdash; Evlap Tracking</title>
</head>

@section('page-title')
<h1>Pengajuan Laporan Hasil Pengawasan </h1>
@endsection

@section('content')
<section class="section">
  <div class="section-body">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <form method="POST" action="/simpanlhp" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul LHP</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="judul_lhp" class="form-control">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Pengajuan</label>
                <div class="col-sm-12 col-md-7">
                <input type="date" name="tanggal_pengajuan" class="col-form-label col-md-12 col-md-7" >
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Organisasi Perangkat Daerah</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control select2" name="opd">
                    @foreach($opds as $opd)
                        <option value="{{ $opd->kode }}">{{ $opd->nama }}</option>
                    @endforeach
                </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ketua Tim</label>
                <div class="col-sm-12 col-md-7">
                    <select name="ketua_tim" class="form-control selectric">
                        @foreach($ketuaTimList as $ketuaTim)
                            <option value="{{ $ketuaTim->id }}">{{ $ketuaTim->name }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Anggota Tim</label>
                <div class="col-sm-12 col-md-7">
                    <select class="form-control select2" name="anggota_tim[]" multiple="">
                        @foreach($anggotaTimList as $anggota)
                            <option value="{{ $anggota->id }}">{{ $anggota->name }}</option>
                        @endforeach
                    </select>
                </div>
             </div>
             <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penanggung Jawab</label>
                <div class="col-sm-12 col-md-7">
                    <select name="penanggung_jawab" class="form-control selectric">
                        @foreach($penanggungJawabList as $penanggungJawab)
                            <option value="{{ $penanggungJawab->id }}">{{ $penanggungJawab->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wakil Penanggung Jawab</label>
                <div class="col-sm-12 col-md-7">
                    <select name="wakil_penanggung_jawab" class="form-control selectric">
                        @foreach($wakilPJList as $wakilPJ)
                            <option value="{{ $wakilPJ->id }}">{{ $wakilPJ->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pengendali Teknis</label>
                <div class="col-sm-12 col-md-7">
                    <select name="pengendali_teknis" class="form-control selectric">
                        @foreach($pengendaliList as $pengendali)
                            <option value="{{ $pengendali->id }}">{{ $pengendali->name }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Anggota Tim Pendukung</label>
                <div class="col-sm-12 col-md-7">
                    <select name="anggota_tim_pendukung" class="form-control selectric">
                        @foreach($anggotaPendukungList as $anggotaPendukung)
                            <option value="{{ $anggotaPendukung->id }}">{{ $anggotaPendukung->name }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Pengawasan</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="jenis_pengawasan">
                    <option>Audit</option>
                    <option>Review</option>
                    <option>Monitoring</option>
                    <option>Evaluasi</option>
                    <option>Monitoring dan Evaluasi</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                <div class="col-sm-12 col-md-7">
                  <div class="form-group">
                     <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                  </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7 text-right">
                  <button type="submit" class="btn btn-primary">Unggah</button>
                </div>
              </div>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</section>



<script>
$(document).ready(function() {
    $('.form-control').select2();
});
</script>

@endsection





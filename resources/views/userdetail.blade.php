<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Detail Hasil Pengajuan LHP &mdash; Evlap Tracking</title>
</head>
@extends('user.layout')
@section('page-title')

<h1>Hasil Laporan Hasil Pengawasan </h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#" >Laporan Hasil Pengawasan</a></div>
    <div class="breadcrumb-item active"><a href= "/hasillhp">Hasil Pengajuan LHP</a></div>
    <div class="breadcrumb-item">Detail Pengajuan Laporan Hasil Pengawasan</div>

</div>
@endsection

@section('content')
<section class="section">
    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h4>Detail Pengajuan LHP</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal</label>
                        <div class="col-sm-12 col-md-7">
                            {{ $lhp->tanggal_pengajuan}}
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">OPD</label>
                        <div class="col-sm-12 col-md-7">
                            {{ $lhp->opd->nama }}
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ketua Tim</label>
                        <div class="col-sm-12 col-md-7">
                            {{ $lhp->ketua_tim }}
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Pengawasan</label>
                        <div class="col-sm-12 col-md-7">
                            {{ $lhp->jenis_pengawasan }}
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                        <div class="col-sm-12 col-md-7">
                            @if($lhp->file)
                                <div class="col">
                                    @php
                                    $originalName = pathinfo($lhp->file, PATHINFO_FILENAME);
                                    @endphp
                                    <a href="{{ Storage::url('public/lhp_files/' . $lhp->file) }}" target="_blank" class="btn btn-icon icon-left btn-light"><b><i class="fas fa-file"></i>&nbsp;&nbsp;<span>{{ $originalName }}</span></b></a>
                                </div>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Komentar</label>
                        <div class="col-sm-12 col-md-4">
                            @foreach ($komentars as $komentar)
                                <p>{!! $komentar->content !!}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit LHP &mdash; Evlap Tracking</title>
</head>
@extends('layouts.master')
@section('page-title')

<h1>Edit Laporan Hasil Pengawasan </h1>
@endsection
@section('content')
<div class="section-body">

    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Pelacakan Laporan Hasil Pemeriksaan</h4>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive table-invoice">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Judul LHP</th>
                    <th>Tanggal</th>
                    <th>OPD</th>
                    <th>Ketua Tim</th>
                    <th>Jenis Pengawasan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lhp as $lhp)
                  <tr>
                    <td>{{ $lhp->judul_lhp }}</td>
                    <td>{{ $lhp->tanggal_pengajuan }}</td>
                    <td><div class="badge badge-success">{{ $lhp->opd->nama }}</div></td>
                    <td>{{ $lhp->ketua_tim }}</td>
                    <td><div class="badge badge-warning">{{ $lhp->jenis_pengawasan }}</div></td>
                    <td><div class="badge badge-danger">{{ $lhp->status->status }}</div></td>
                    <td>
                        <div>
                            <a href="/admdetaillhp/{{ $lhp->id_lhp }}" class="btn btn-primary">Detail</a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="../assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="../node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
<script src="../node_modules/chart.js/dist/Chart.min.js"></script>
<script src="../node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="../node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Template JS File -->
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="../assets/js/page/index-0.js"></script>
@endsection

@push('page-scripts')

@endpush

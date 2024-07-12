<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Data Pegawai &mdash; Evlap Tracking</title>
  </head>
  @extends('layouts.master')
  @section('page-title')

  <h1>Data Pegawai </h1>
  @endsection
  @section('content')
  <div class="section-body">

      <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div>
                <a href="/tambah_pegawai" class="btn btn-success">+ Tambah Pegawai</a>
                </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive table-invoice">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>

                  </tr>
                @foreach ($pegawais as $pegawai)
                  <tr>
                    <td> {{$loop->iteration}}</td>
                    <td>{{$pegawai->name}}</td>
                    <td>{{$pegawai->nip}}</td>
                    <td><div class="badge badge-{{
                        $pegawai->role === 'ketua_tim' ? 'info' :
                        ($pegawai->role === 'anggota_tim' ? 'light' :
                        ($pegawai->role === 'penanggung_jawab' ? 'danger' :
                        ($pegawai->role === 'wakil_penanggung_jawab' ? 'success' :
                        ($pegawai->role === 'pengendali_teknis' ? 'secondary' :
                        'primary'))))
                    }}">
                        {{$pegawai->role}}
                    </div> </td>
                    <td><div>
                      <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-icon icon-left btn-primary">
                        <i class="far fa-edit"></i>Edit
                    </a>

                      <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-icon icon-left btn-danger">
                            <i class="far fa-trash-alt"></i>Hapus
                        </button>
                    </form>
                    </div>
                  </td>
                </tr>
                @endforeach
                  </tbody></table>
              </div>
            </div>
          </div>
        </div>
    </div>

  @endsection


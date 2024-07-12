<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Data User &mdash; Evlap Tracking</title>
  </head>
  @extends('layouts.master')
  @section('page-title')

  <h1>Data User </h1>
  @endsection
  @section('content')
  <div class="section-body">

      <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div>
                <a href="/tambah_user" class="btn btn-success">+ Tambah User</a>
                </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive-xl table-invoice">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Password</th>
                    <th>Aksi</th>

                  </tr>
                @foreach ($users as $user)
                  <tr>
                    <td> {{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->nip}}</td>
                    <td>
                        {{ str_repeat('*', strlen($user->password)) }}
                    </td>
                    <td>
                        <div>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-icon icon-left btn-primary">
                                <i class="far fa-edit"></i>Edit
                            </a>

                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
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


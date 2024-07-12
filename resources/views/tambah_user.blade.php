<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Tambah User &mdash; Evlap Tracking</title>
  </head>
  @extends('layouts.master')
  @section('page-title')
  <h1>Tambah User </h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="/data_user">Data User</a></div>
    <div class="breadcrumb-item">Tambah User</div>
</div>
  @endsection

  @section('content')
  <section class="section">
    <div class="section-body">
      <form method="POST" action="{{route('user.store')}}">
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
                    <label for="password" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                    <div class="col-sm-12 col-md-7">
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>

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


  
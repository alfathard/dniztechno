@extends('admin.adminlte')

@section('content-header')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}{{$user}}!</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
      {{-- <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Tentang Kami</h5>
              </div>
              <div class="card-body">
                <h5 class="card-title">Manage Tentang Kami</h5>

                <p class="card-text">
                    Klik Create untuk membuat input baru untuk halaman Tentang Kami.<br>
                    Klik List untuk melihat record yang sudah pernah dibuat untuk halaman Tentang Kami.
                </p>

                <a href="#" class="card-link">Create</a>
                <a href="#" class="card-link">List</a>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Paket</h5>
              </div>
              <div class="card-body">
                <h5 class="card-title">Manage Paket</h5>

                <p class="card-text">
                  Klik Create untuk membuat input baru untuk halaman Paket.<br>
                  Klik List untuk melihat record yang sudah pernah dibuat untuk halaman Paket.
                </p>
                <a href="#" class="card-link">Create</a>
                <a href="#" class="card-link">List</a>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Artikel</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid --> --}}
    </div>
    <!-- /.content -->

@endsection
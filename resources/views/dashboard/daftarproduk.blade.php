@extends('dashboard.template')
@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Daftar Produk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if (session()->has('successs'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Produk</h3>
            <div class="card-tools">
              <a href="/dashboard/tambahproduk" class="btn btn-tool btn-sm">
                <i class="fas fa-plus"></i>
              </a>
              <a href="listproduk.html" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
              </a>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
              <thead>
                <tr>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
              </thead>
              @foreach ($products as $m)
              <tbody>
                <tr>
                  <td>
                    <img src="{{ url('/data_file/'.$m->gambar) }}" alt="Product 1" class="img-size-32 mr-2">
                    {{ $m->judul }}
                  </td>
                  <td>Rp.{{ $m->harga }}</td>
                  <td><a href="/dashboard/updateproduk/{{ $m->product_id }}" class="btn btn-warning">Edit</a> | <a href="/dashboard/hapusproduk/{{ $m->product_id }}" class="btn btn-danger">Hapus</a></td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

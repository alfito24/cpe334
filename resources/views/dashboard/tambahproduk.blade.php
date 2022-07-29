@extends('dashboard.template')
@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Produk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <form action="/dashboard/tambahproduk" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Produk</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <input name="idmitra" type="hidden" value="">
                            <input name="idoleh" type="hidden" value="1">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="formFileMultiple" class="form-label">Gambar Produk</label> <br>
                                    <img src="" alt="" class="img-preview" style="width: 400px;height:400px">
                                    <input class="form-control" name="file" type="file" id="image" onchange="previewImage()">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Nama Produk</label>
                                    <input type="text" name="nama_produk" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Deskripsi Produk</label>
                                    <input type="text" name="deskripsi_produk" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Stock Produk</label>
                                    <input type="number" name="stock_produk" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Harga Produk</label>
                                    <input type="number" name="harga_produk" placeholder="Rp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Dikirim Dari</label>
                                    <input type="text" name="shipping_point" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Bahan</label>
                                    <select id="inputStatus" name="bahan_produk" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option value="Plastic">Plastic</option>
                                        <option value="Paper">Paper</option>
                                        <option value="Metals">Metals</option>
                                        <option value="Glass">Glass</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 mb-3">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Tambahkan" class="btn btn-success float-right">
                    </div>
                </div>
                <!-- /.row -->
                <!-- Main row -->
        </form>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <script>
        function previewImage()
        {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    <!-- /.content -->
@endsection

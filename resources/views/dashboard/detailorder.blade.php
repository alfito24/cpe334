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
                    <h1 class="m-0 text-dark">Detail Order</h1>
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
        <form action="/dashboard/updateproduk" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Pickup</h3>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Jenis Sampah</label>
                                            <input type="text" name="nama_produk" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Jumlah</label>
                                            <input type="text" name="nama_produk" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Harga Produk</label>
                                    <input type="number" name="harga_produk" placeholder="Rp" class="form-control" value="{{ $products->harga }}">
                                </div>
                                    {{-- @php
                                        $alamat = preg_split('/ /', $o->street);
                                    @endphp --}}
                                <div class="form-group">
                                    <label for="inputName">Alamat</label>
                                    <input type="text" name="alamat" placeholder="" class="form-control" value="{{ $o->street }} {{ $o->number }} {{ $o->city }}">
                                   {{-- @foreach ($alamat as $a )
                                   <iframe width="520" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=%20
                                   {{$a}}+()&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> <a href='https://www.embedmap.net/'>embedding google maps into website</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=8e0997aceed434fd3ad9ca083fb80e4dc10d418e'></script>
                                   @endforeach --}}
                                </div>
                                {{-- <div class="form-group">
                                    <label for="inputStatus">Status</label>
                                    <select id="inputStatus" name="status" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option {{ $o->status === 'Sudah Diambil' ? 'selected' : '' }} value="Sudah Diambil">Sudah Diambil</option>
                                        <option {{ $o->status === 'Proses Diambil' ? 'selected' : '' }} value="Proses Diambil">Proses Diambil</option>
                                        <option {{ $o->status === 'Belum Diambil' ? 'selected' : '' }} value="Belum Diambil">Belum Diambil</option>
                                    </select>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 mb-3">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Ubah Data" class="btn btn-success float-right">
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

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
        {{-- <form action="/dashboard/updatepickup/{{ $orders[0]->id }}" method="POST" enctype="multipart/form-data">
            @csrf --}}
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
                                            <input type="text" name="nama_produk" class="form-control" value="" disabled placeholder="Newspaper">
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="" disabled placeholder="Cardboard">
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="" disabled placeholder="Plastic Bag">
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="" disabled placeholder="Plastic Cup">
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="" disabled placeholder="Steel">
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="" disabled placeholder="Glass">
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="" disabled placeholder="Aluminium">
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="" disabled placeholder="Copper">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Jumlah</label>
                                            <input type="text" name="nama_produk" class="form-control" value="{{ $orders[0]->newspaper }}" disabled>
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="{{ $orders[0]->cardboard }}" disabled>
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="{{ $orders[0]->plastic_bag }}" disabled>
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="{{ $orders[0]->plastic_cup }}" disabled>
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="{{ $orders[0]->steel }}" disabled>
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="{{ $orders[0]->glass }}" disabled>
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="{{ $orders[0]->aluminium }}" disabled>
                                            <input type="text" name="nama_produk" class="form-control mt-2" value="{{ $orders[0]->copper }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                    @php
                                        $alamat = preg_split('/ /', $orders[0]->pickup->street);
                                    @endphp
                                <div class="form-group">
                                    <label for="inputName">Alamat</label>
                                    <input disabled type="text" name="nama_produk" class="form-control mb-4" value="{{ $orders[0]->pickup->street }} Nomor {{ $orders[0]->pickup->number }}, {{ $orders[0]->pickup->city }}">
                                   <div class="mapouter mt-3"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=
                                    @foreach ($alamat as $a )
                                    {{ $a }}%20
                                    @endforeach
                                    &t=k&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
                                </div>
                                <form action="/cancelpickup/{{ $pickup->pickup_id }}" method="POST">
                                    @csrf
                                <div class="form-group">
                                    <label for="inputStatus">Status</label>
                                    <select id="inputStatus" name="status" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option {{ $orders[0]->status === 'Sudah Diambil' ? 'selected' : '' }} value="Sudah Diambil">Sudah Diambil</option>
                                        <option {{ $orders[0]->status === 'Proses Diambil' ? 'selected' : '' }} value="Proses Diambil">Proses Diambil</option>
                                        <option {{ $orders[0]->status === 'Belum Diambil' ? 'selected' : '' }} value="Belum Diambil">Belum Diambil</option>
                                    </select>
                                </div>
                                <input value="Update" type="submit" class="btn btn-success">

                                </input>
                                </form>
                               {{-- <div class="row">
                                <form action="/cancelpickup/{{ $pickup->pickup_id }}" method="POST">
                                    @csrf
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-danger">
                                        Batalkan Pickup
                                        </button>
                                     </div>
                                </form>
                                <form action="/donepickup/{{ $pickup->pickup_id }}" method="POST">
                                    @csrf
                                    <div class="col-3">
                                       <button type="submit" class="btn btn-success">
                                       Sudah Diambil
                                       </button>
                                    </div>
                                </form>
                               </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.row -->
                <!-- Main row -->

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

@extends('dashboard.template')
@section('container')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2" hidden>
                <div class="col-sm-6">
                    <h1 class="db-title m-0 text-dark" style="font-size: 25px; font-weight:600;">Online Visitor</h1>
                </div>
            </div>
            <div class="row" hidden>
                <div class="card" style="width: 100vw;">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">820</span>
                                <span>Visitors Over Time</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="myChart" width="1000" height="200"></canvas>
                            <script>
                                const labels = [
                                    'Jan',
                                    'Feb',
                                    'Mar',
                                    'Apr',
                                    'May',
                                    'Jun',
                                    'Jul',
                                    'Aug',
                                    'Sep',
                                    'Oct',
                                    'Nov',
                                    'Des',
                                ];
                                const data = {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Visitor 2022',
                                        backgroundColor: 'rgb(255, 99, 132)',
                                        borderColor: 'rgb(255, 99, 132)',
                                        data: [0, 10, 5, 2, 20, 30, 45, 50, 20, 55, 40, 25, ],
                                    }]
                                };

                                const config = {
                                    type: 'line',
                                    data: data,
                                    options: {}
                                };
                                const myChart = new Chart(
                                    document.getElementById('myChart'),
                                    config
                                );
                            </script>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mb-2" hidden>
                <div class="col-sm-6">
                    <h1 class="db-title m-0 text-dark " style="font-size: 25px;font-weight:600;">Feedback</h1>
                </div>
            </div>
            <div class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
            <div class="row mb-2" hidden>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jonathan</h5>
                            <div class="card-body bg-transparent">
                                <br>
                                <div class="row rating" style="font-weight: 1000; font-size:large;">
                                    <div class="col-sm-6">
                                        Overall
                                    </div>
                                    <div class="col-sm-6">
                                        4/5
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Kerapihan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Kebersihan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Pelayanan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jonathan</h5>
                            <br>
                            <div class="card-body bg-transparent">
                                <div class="row rating" style="font-weight: 1000; font-size:large;">
                                    <div class="col-sm-6">
                                        Overall
                                    </div>
                                    <div class="col-sm-6">
                                        4/5
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Kerapihan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Kebersihan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Pelayanan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jonathan</h5>
                            <br>
                            <div class="card-body bg-transparent">
                                <div class="row rating" style="font-weight: 1000; font-size:large;">
                                    <div class="col-sm-6">
                                        Overall
                                    </div>
                                    <div class="col-sm-6">
                                        4/5
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Kerapihan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Kebersihan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Pelayanan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jonathan</h5>
                            <br>
                            <div class="card-body bg-transparent">
                                <div class="row rating" style="font-weight: 1000; font-size:large;">
                                    <div class="col-sm-6">
                                        Overall
                                    </div>
                                    <div class="col-sm-6">
                                        4/5
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Kerapihan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Kebersihan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Pelayanan
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="db-title m-0 text-dark " style="font-size: 25px;font-weight:600;"></h1>
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @foreach ( $products as $m)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img class="img-fluid" alt="100%x280"
                            src="{{ url('/data_file/'.$m->gambar) }}" style="height: 250px;width:250px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $m->judul }}</h5>
                            <br>
                            <h6 class="card-title"> Rp.{{ $m->harga }}</h6>

                            <a href="/varianoleh/21" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img class="img-fluid" alt="100%x280"
                            src=https://cdn.discordapp.com/attachments/906163180328325130/916964212767621130/CokelatTempe.jpg>
                        <div class="card-body">
                            <h5 class="card-title">Cokelat Tempe</h5>
                            <br>
                            <h6 class="card-title">50 pcs</h6>
                            <br>
                            <div class="card-footer bg-transparent">
                                Rp. 20.000
                            </div>
                            <a href="/varianoleh/22" class="stretched-link"></a>
                        </div>
                        <div class="card-footer bg-transparent">
                            <p class="card-text bi bi-heart-fill">
                                10 Orang Menyukai ini</p>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- /.row -->
            <!-- Main row -->

        </div>
        <!-- /.row (main row) -->
    @endsection

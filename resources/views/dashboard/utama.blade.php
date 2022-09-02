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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="db-title m-0 text-dark " style="font-size: 25px;font-weight:600;"></h1>
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Pick Up</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                      <tr>
                        <th>Nama Customer</th>
                        <th>Pickup Date</th>
                        <th>Pickup Time</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    @foreach ($pickupOrder as $o)
                    <tbody>
                      <tr>
                        <td>{{ $o->user->name }}</td>
                        @php
                            $tanggalPickup = strtotime($o->pickup->pickup_date);
                            $jamPickup = strtotime($o->pickup->pickup_time);
                        @endphp
                        <td>{{ date('d M Y', $tanggalPickup) }}</td>
                        <td>{{ date('H:i', $jamPickup) }}</td>
                        <td>
                            @php
                                $jenisbadge = '';
                                if($o->pickup->status == 'Belum Diambil'){
                                    $jenisbadge = 'badge-danger';
                                }else {
                                    $jenisbadge = 'badge-success';
                                }
                            @endphp
                            <div class="badge {{ $jenisbadge }}">
                                {{ $o->pickup->status }}
                            </div>
                        </td>
                        <td><a href="/dashboard/detailorder/{{ $o->transaction_id }}" class="btn btn-dark">Detail</a></td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
            <!-- /.row -->
            <!-- Main row -->

        </div>
        <!-- /.row (main row) -->
    @endsection

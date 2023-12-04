@extends('admin.template_admin')
@section('container')
<body>
    <div class="container mt-5">
        <!-- Dashboard Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="mb-3">Admin Dashboard</h2>
            </div>
        </div>
        
        <!-- Dashboard Stats -->
        <div class="row">
            <!-- Total Jobs Card -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Jobs</h5>
                        <p class="card-text"><i class="bi bi-briefcase"></i> {{ $jobs }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Applicants Card -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Companies</h5>
                        <p class="card-text"><i class="bi bi-people"></i> {{ $companies }}</p>
                    </div>
                </div>
            </div>

            <!-- Selected Candidates Card -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Applicants</h5>
                        <p class="card-text"><i class="bi bi-person-check"></i> {{ $applicants }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and its dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection

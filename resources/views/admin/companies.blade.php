@extends('admin.template_admin')
@section('container')
    <div class="card">
        <div class="card-header border-0 mt-5">
            <h3 class="card-title">Requested Companies</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Company Description</th>
                        <th>Company Size</th>
                        <th>Company Website</th>
                        <th>Business Area</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($requested_companies as $compn)
                    <tbody>
                        <tr>
                            <td>{{ $compn->company }}</td>
                            <td>{{ $compn->company_description }}</td>
                            <td>{{ $compn->company_size }}</td>
                            <td>{{ $compn->company_website }}</td>
                            <td>{{ $compn->business_area }}</td>
                            <td><button onclick="location.href='/company/{{ $compn->user_id }}/accept'"
                                    class="btn btn-success">Accept</button> | <button
                                    onclick="location.href='/company/{{ $compn->user_id }}/reject'"
                                    class="btn btn-danger">Reject</button></td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            @if($requested_companies->count() == 0)
            <div>
                No Pending Companies Yet
            </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-header border-0 mt-5">
            <h3 class="card-title">Registered Companies</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Company Description</th>
                        <th>Company Size</th>
                        <th>Company Website</th>
                        <th>Business Area</th>
                    </tr>
                </thead>
                @foreach ($registered_companies as $compn)
                    <tbody>
                        <tr>
                            <td>{{ $compn->company }}</td>
                            <td>{{ $compn->company_description }}</td>
                            <td>{{ $compn->company_size }}</td>
                            <td>{{ $compn->company_website }}</td>
                            <td>{{ $compn->business_area }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            @if($registered_companies->count() == 0)
            <div>
                No Accepted Companies Yet
            </div>
            @endif
        </div>
    </div>
@endsection

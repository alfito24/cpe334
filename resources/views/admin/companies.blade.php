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
        @foreach ($requested_companies as $c)
        <tbody>
          <tr>
            <td>{{ $c->company }}</td>
            <td>{{ $c->company_description }}</td>
            <td>{{ $c->company_size }}</td>
            <td>{{ $c->company_website }}</td>
            <td>{{ $c->business_area }}</td>
            <td><button onclick="location.href='/company/{{ $c->user_id }}/accept'" class="btn btn-success">Accept</button> | <button onclick="location.href='/company/{{ $c->user_id }}/reject'" class="btn btn-danger">Reject</button></td>
          </tr>
        </tbody>
        @endforeach
      </table>
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
        @foreach ($registered_companies as $c)
        <tbody>
          <tr>
            <td>{{ $c->company }}</td>
            <td>{{ $c->company_description }}</td>
            <td>{{ $c->company_size }}</td>
            <td>{{ $c->company_website }}</td>
            <td>{{ $c->business_area }}</td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
  </div>
@endsection

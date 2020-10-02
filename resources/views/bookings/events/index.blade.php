@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Book Events</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <a href="{{ route('bookings.create') }}" class="btn btn-primary btn-sm float-right">Add New</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Created_at</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @forelse($bookevents as $event)
                              <tr>
                                  <td>{{ $event->event_name ?? '' }}</td>
                                  <td>{{ $event->created_at->diffForHumans() ?? ''}}</td>
                                  <td>
                                      <a href="{{ route('bookings.edit', $event->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                      <a class="btn btn-danger btn-sm">Delete</a>
                                  </td>
                              </tr>
                              @empty
                              <tr>
                                  <td class="text-center" colspan="7">
                                      No data available in table
                                  </td>
                              </tr>
                              @endforelse
                          </tbody>
                      </table>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

@endsection

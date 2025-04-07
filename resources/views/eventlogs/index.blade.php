@extends('admin.adminlte')

@section('content-header')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-12">
            {{-- <div class="card"> --}}
              <!-- /.card-header -->
              <div class="container">
                <table id="example1" class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Event Logs</th>
                      <th>Object ID</th>
                      <th>Created at</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($eventlogs) > 0)
                      @foreach($eventlogs as $eventlog)
                      <tr>
                        <td>{{$eventlog->id}}</td>
                        <td>{{$eventlog->name}}</td>
                        <td>{{$eventlog->description}}</td>
                        <td>{{$eventlog->subject_id}}</td>
                        <td>{{$eventlog->created_at}}</td>
                      </tr>
                      @endforeach
                    @else
                    <tr></tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            {{-- </div> --}}
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
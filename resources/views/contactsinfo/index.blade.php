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
          <!-- left column -->
          <div class="col-12">
            <a class="btn btn-info" href="contactinfo/create" role="button">Create New</a>
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      
        <div class="row">
          <div class="col-12">
            {{-- <div class="card"> --}}
              <!-- /.card-header -->
              <div class="container">
                <table id="example1" class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Type</th>
                      <th>Text</th>
                      <th>Created by</th>
                      <th>Created at</th>
                      <th>Updated by</th>
                      <th>Updated at</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($contactsinfo) > 0)
                      @foreach($contactsinfo as $contactinfo)
                      <tr>
                        <td>{{$contactinfo->idContactInfo}}</td>
                        <td>{{$contactinfo->typeContactInfo}}</td>
                        <td>{{$contactinfo->textContactInfo}}</td>
                        <td>{{$contactinfo->created_by}}</td>
                        <td>{{$contactinfo->created_at}}</td>
                        <td>{{$contactinfo->updated_by}}</td>
                        <td>{{$contactinfo->updated_at}}</td>
                        <td><a class="btn btn-outline-info btn-sm btn-link" href="contactinfo/{{$contactinfo->idContactInfo}}" role="button">
                            <i class="fas fa-search" aria-hidden="true"></i></a>
                        </td>
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
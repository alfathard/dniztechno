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
          {{-- <div class="col-12">
            <a class="btn btn-info" href="contactinfo/create" role="button">Create New</a>
          </div> --}}
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Text</th>
                      <th>Created by</th>
                      <th>Created at</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($contactslist) > 0)
                      @foreach($contactslist as $contactlist)
                      <tr>
                        <td>{{$contactlist->idContact}}</td>
                        <td>{{$contactlist->nameContact}}</td>
                        <td>{{$contactlist->emailContact}}</td>
                        <td>{{$contactlist->textContact}}</td>
                        <td>{{$contactlist->created_by}}</td>
                        <td>{{$contactlist->created_at}}</td>
                        <td><a class="btn btn-outline-info btn-sm btn-link" href="contactlist/{{$contactlist->idContact}}" role="button">
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
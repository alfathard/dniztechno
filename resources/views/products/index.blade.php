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
            <a class="btn btn-info" href="product/create" role="button">Create New</a>
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
                      <th>Name</th>
                      <th>Description</th>
                      <th>Created by</th>
                      <th>Created at</th>
                      <th>Updated by</th>
                      <th>Updated at</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($products) > 0)
                      @foreach($products as $product)
                      <tr>
                        <td>{{$product->idProduct}}</td>
                        <td>{{$product->nameProduct}}</td>
                        <td>{{$product->descProduct}}</td>
                        <td>{{$product->created_by}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->updated_by}}</td>
                        <td>{{$product->updated_at}}</td>
                        <td><a class="btn btn-outline-info btn-sm btn-link" href="product/{{$product->idProduct}}" role="button">
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
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
            <a class="btn btn-info" href="article/create" role="button">Create New</a>
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
                      <th>Title</th>
                      <th>Text</th>
                      <th>Created by</th>
                      <th>Created at</th>
                      <th>Updated by</th>
                      <th>Updated at</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($articles) > 0)
                      @foreach($articles as $article)
                      <tr>
                        <td>{{$article->idArticle}}</td>
                        <td>{{$article->titleArticle}}</td>
                        <td>{{$article->textArticle}}</td>
                        <td>{{$article->created_by}}</td>
                        <td>{{$article->created_at}}</td>
                        <td>{{$article->updated_by}}</td>
                        <td>{{$article->updated_at}}</td>
                        <td><a class="btn btn-outline-info btn-sm btn-link" href="article/{{$article->idArticle}}" role="button">
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
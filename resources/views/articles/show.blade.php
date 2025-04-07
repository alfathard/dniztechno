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
            <div class="btn-group" role="group" aria-label="btngroup">
              <a href = "/admin/article" class="btn btn-default">Go Back</a>
            </div>
            <!-- form start -->
              <!-- jquery validation -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Edit</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                
                <div class="card-body">
                    {!! Form::open(['action' => ['App\Http\Controllers\ArticlesController@store', $article->idArticle], 'method' => 'POST']) !!}
                      @csrf
                      <div class="form-group row">
                            {{Form::label('titleArticle','Title',['class' => 'col-sm-1 col-form-label'])}} 
                            <div class="col-sm-11">
                                {{Form::text('titleArticle', $article->titleArticle, ['class' => 'form-control form-control-lg', 'placeholder' => 'Title', 'disabled' => 'disabled'])}}
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            {{Form::label('textArticle','Text',['class' => 'col-sm-1 col-form-label'])}}
                            <div class="col-sm-11">
                                {{Form::textarea('textArticle', $article->textArticle, ['class' => 'form-control textArticle', 'placeholder' => 'Text', 'disabled' => 'disabled'])}}
                            </div>
                        </div>    

                        <div class="form-group row">
                        <a href="/admin/article/{{$article->idArticle}}/edit" class="btn btn-primary">Edit</a> 
                        {!! Form::close() !!}
                        
                        {!! Form::open(['action' => ['App\Http\Controllers\ArticlesController@destroy', $article->idArticle], 'method' => 'POST', 'class' => 'pull-right']) !!}
                              {{Form::hidden('_method','DELETE')}}
                              @csrf
                              {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                        </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
        <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
        <script>
          tinymce.init({
              readonly: 1,
              selector:'textarea.textArticle',
              width: 900,
              height: 300
          });
        </script>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
@endsection
@extends('admin.adminlte')

@section('content-header')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>About Us</h1>
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
              <a href = "/admin/about" class="btn btn-default">Go Back</a>
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
                    {!! Form::open(['action' => ['App\Http\Controllers\AboutsController@store', $about->idAbout], 'method' => 'POST']) !!}
                    @csrf
                        <div class="form-group row">
                            {{Form::label('titleAbout','Title',['class' => 'col-sm-1 col-form-label'])}} 
                            <div class="col-sm-11">
                                {{Form::text('titleAbout', $about->titleAbout, ['class' => 'form-control form-control-lg', 'placeholder' => 'Title', 'disabled' => 'disabled'])}}
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            {{Form::label('textAbout','Text',['class' => 'col-sm-1 col-form-label'])}}
                            <div class="col-sm-11">
                                {{Form::textarea('textAbout', $about->textAbout, ['class' => 'form-control form-control-sm', 'placeholder' => 'Text', 'disabled' => 'disabled'])}}
                            </div>
                        </div>  

                        <div class="form-group row">
                        <a href="/admin/about/{{$about->idAbout}}/edit" class="btn btn-primary">Edit</a> 
                        {!! Form::close() !!}
                        
                        {!! Form::open(['action' => ['App\Http\Controllers\AboutsController@destroy', $about->idAbout], 'method' => 'POST', 'class' => 'pull-right']) !!}
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
@endsection
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
        <div class="row mb-2">
          <!-- left column -->
          <div class="col-12">
            <div class="btn-group" role="group" aria-label="btngroup">
              <a href = "/admin/vision" class="btn btn-default">Go Back</a>
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
                    {!! Form::open(['action' => ['App\Http\Controllers\VisionsController@update',$vision->idVision], 'method' => 'POST']) !!}
                      @csrf
                        <div class="form-group row">
                            {{Form::label('titleVision','Title',['class' => 'col-sm-1 col-form-label'])}}
                            <div class="col-sm-11">
                              {{Form::text('titleVision', $vision->titleVision, ['class' => 'form-control form-control-lg', 'placeholder' => 'Title'])}}
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            {{Form::label('textVision','Text',['class' => 'col-sm-1 col-form-label'])}}
                            <div class="col-sm-11">
                                {{Form::textarea('textVision', $vision->textVision, ['class' => 'form-control form-control-sm', 'placeholder' => 'Text'])}}
                            </div>
                        </div>  
                  {{Form::hidden('_method','PUT')}}
                  {{Form::submit('Update', ['class' => 'btn btn-primary'])}}   
                  {{-- <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-default">Cancel</button> --}}
                  {!! Form::close() !!}
                  {{-- <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">Show to webpage</label>
                    </div>
                  </div> --}}
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
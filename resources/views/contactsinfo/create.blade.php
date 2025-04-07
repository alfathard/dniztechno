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
              <a href = "/admin/contactinfo" class="btn btn-default">Go Back</a>
            </div>
              <!-- form start -->
              <!-- jquery validation -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create New</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                
                <div class="card-body">
                    {!! Form::open(['action' => 'App\Http\Controllers\ContactsInfoController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
                    @csrf
                        <div class="form-group row">
                            {{Form::label('typeContactInfo','Type',['class' => 'col-sm-1 col-form-label'])}}
                            <div class="col-sm-11">
                              {{Form::text('typeContactInfo', '', ['class' => 'form-control form-control-lg', 'placeholder' => 'Type of contact info'])}}
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            {{Form::label('textContactInfo','Text',['class' => 'col-sm-1 col-form-label'])}}
                            <div class="col-sm-11">
                                {{Form::text('textContactInfo', '', ['class' => 'form-control form-control-sm', 'placeholder' => 'Text'])}}
                            </div>
                        </div>  

                        <div class="form-group row">
                          {{Form::label('imgFilepath','Upload Image',['class' => 'col-sm-1 col-form-label'])}}
                          <div class="col-sm-11">
                              <img id="preview-image-before-upload" src="/public/images/product_image_not_found.gif" alt="preview image" style="max-height: 250px;">
                              {{Form::file('imgFilepath',['id' => 'image'])}}
                          </div>
                        </div> 
                  {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}  
                  {{Form::reset('Cancel', ['class' => 'btn btn-default'])}} 
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function (e) {
            $('#image').change(function(){  
              let reader = new FileReader();
              reader.onload = (e) => { 
          
                $('#preview-image-before-upload').attr('src', e.target.result); 
              }
              reader.readAsDataURL(this.files[0]); 
            });
          });
          </script>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
@endsection
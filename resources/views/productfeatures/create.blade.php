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
              <a href = "/admin/productfeature" class="btn btn-default">Go Back</a>
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
                    {!! Form::open(['action' => 'App\Http\Controllers\ProductsFeatureController@store', 'method' => 'POST']) !!}
                        @csrf
                        <div class="form-group row">
                            {{Form::label('textProductFeature','Text',['class' => 'col-sm-2 col-form-label'])}}
                            <div class="col-sm-10">
                              {{Form::text('textProductFeature', '', ['class' => 'form-control form-control-lg', 'placeholder' => 'Text'])}}
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            {{Form::label('nameProduct','Product Related',['class' => 'col-sm-2 col-form-label'])}}
                            <div class="col-sm-10">
                                {{-- {{Form::select('nameProduct', '', ['class' => 'form-select form-select-sm', 'placeholder' => 'Name Product'])}} --}}
                                <select class="form-control" id="idProduct" name="idProduct">
                                  @if(count($products) > 0)
                                    @foreach($products as $product)
                                      <option value="{{$product->idProduct}}">{{$product->nameProduct}}</option>
                                    @endforeach
                                  @else
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                    <option value="5">Five</option>
                                  @endif
                                </select>
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
@endsection
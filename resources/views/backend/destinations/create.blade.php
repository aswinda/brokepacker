@extends('backend.base.template')
@section('content')

<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Places</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" role="form" method="POST" action="{{ url('admin/destinations/store') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="box-body">
                    <!-- input provinsi baru-->
                    
                    <div class="form-group">
                      <label>Places</label>
                      <input name="place" type="text" class="form-control" placeholder="Place">
                    </div>
                     <div class="form-group">
                      <label>Location</label>
                      <input name="location" type="text" class="form-control" placeholder="Location">
                    </div>
                    <div class="form-group">
                      <label>District</label>
                      <select name="districts" class="form-control">
                      @foreach($districts as $key => $district)  
                          <!-- ngambil nama district -->
                          <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                      @endforeach                     
                      </select>
                      
                    </div>
                   
                    
                     <div class="form-group">
                      <label>Description</label>
                      <input name="description" type="textarea" class="form-control" placeholder="Please Enter Description">
                    </div>

                    <div class="form-group">
                      <div class="btn btn-default btn-file">
                        <i class="fa fa-paperclip"></i> Image
                        <input name="file" type="file"/>
                      </div> 
                      <p class="help-block">Max. 32MB</p>
                    </div>
                    
                    
                     
                    
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->


            </div><!--/.col (left) -->

          </div>   <!-- /.row -->
        </section><!-- /.content -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ URL::to('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ URL::to('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::to('dist/js/app.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::to('dist/js/demo.js') }}" type="text/javascript"></script>

@endsection
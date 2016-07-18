@extends('backend.base.template')
@section('content')

<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Routes</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" role="form" method="POST" action="{{ url('admin/inns/update/'.$inns->id) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="box-body">
                    
                    
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" type="text" class="form-control" placeholder="{{ $inns->name }}" value="{{ $inns->name }}">
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input name="address" type="text" class="form-control" placeholder="{{ $inns->address }}" value="{{ $inns->address }}">
                    </div>
                   
                    <div class="form-group">
                      <label>District</label>
                      <select name="district" class="form-control">
                      <!-- ambil informasi provinsi -->
                      @foreach($districts as $key => $district)  
                          <!-- ngambil nama provinsi -->
                          <option <?php if ($district->id == $inns->id) echo "selected" ?> 
                          value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                      @endforeach                     
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Price</label>
                      <input name="price" type="text" class="form-control" placeholder="{{ $inns->price }}" value="{{ $inns->price }}">
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
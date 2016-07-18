@extends('backend.base.template')
@section('content')

<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Districts</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" role="form" method="POST" action="{{ url('admin/agents_routes/store') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="box-body">
                    <!-- input provinsi baru-->

                    <div class="form-group">
                      <label>Asal</label>
                      <select name="asal" class="form-control">
                      @foreach($districts as $key => $asal)  
                          <!-- ngambil nama provinsi -->
                          <option value="<?php echo $asal->id; ?>"><?php echo $asal->name; ?></option>
                      @endforeach                     
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Tujuan</label>
                      <select name="tujuan" class="form-control">
                      @foreach($districts as $key => $tujuan)  
                          <!-- ngambil nama provinsi -->
                          <option value="<?php echo $tujuan->id; ?>"><?php echo $tujuan->name; ?></option>
                      @endforeach                     
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Agents</label>
                      <select name="agents" class="form-control">
                      @foreach($agents as $key => $agent)  
                          <!-- ngambil nama provinsi -->
                          <option value="<?php echo $agent->id; ?>"><?php echo $agent->name; ?></option>
                      @endforeach                     
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input name="price" type="text" class="form-control" placeholder="Price">
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
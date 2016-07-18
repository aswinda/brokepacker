@extends('backend.base.template')
@section('content')

<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Agents</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" role="form" method="POST" action="{{ url('admin/agents/update/'.$agents->id) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="box-body">
                    
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" type="text" class="form-control" placeholder="{{ $agents->name }}" value="{{ $agents->name }}">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input name="description" type="textarea" class="form-control" placeholder="{{ $agents->description }}" value="{{ $agents->description }}">
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
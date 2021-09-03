<x-app-layout>
<style type="text/css">
	.error{
		color: red;
	}
</style>
<div class="wrapper">
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Edit Customer..!</h3>
                  </div>

                  <div class="card-body">
                    <form role="form" method="POST" action="{{url('updateClient')}}" enctype="multipart/form-data">
                      @csrf
                      @foreach($data as $value)
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="{{$value->first_name}}" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="{{$value->last_name}}" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" value="{{$value->locations}}" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="id" value="{{$value->id}}">
                      @endforeach
                      <div class="card-footer">
                        <a class="btn btn-danger" href="{{url('dashboard')}}">Go Back</a>
                        <input class="btn btn-info" type="submit" value="Update">
                      </div>
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
</html>

</x-app-layout>

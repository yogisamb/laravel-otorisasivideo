@extends('layouts.dashboard')

@section('body')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Video</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="/simpanvideo" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $relasi->id }}">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="durasi" name="durasi">
              <option value="1 Hours">1 Jam</option>
              <option value="2 Hours">2 Jam</option>
            </select>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
@endsection
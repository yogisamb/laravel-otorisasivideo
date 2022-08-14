@extends('layouts.dashboard')

@section('body')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="/buatvideo" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="name" class="form-control" name="name" id="name" placeholder="Title Video">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Video</label>
            <input type="file" class="form-control" name="video" id="video" placeholder="Video">
            <small id="emailHelp" class="form-text text-muted">Saat ini maximal size hanya 2.5MB</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Thumbnail Foto</label>
            <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Thumbnail Foto">
            <small id="emailHelp" class="form-text text-muted">Saat ini maximal size hanya 2.5MB</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi"></textarea>
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
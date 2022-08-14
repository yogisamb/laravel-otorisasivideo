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
      <form action="/rubahvideo" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $video->id }}">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="name" class="form-control" name="name" id="name" value="{{ $video->video_title }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Video</label>
            <div class="row">
              <div class="col-4">
                <video controls style="width: 100%;">
                  <source src="/assets/{{ $video->video_label}}" type="video/mp4" />
                </video>
              </div>
              <div class="col-8">
                <input type="file" class="form-control" name="video" id="video" placeholder="Video">
                <small id="emailHelp" class="form-text text-muted">Saat ini maximal size hanya 2.5MB</small>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Thumbnail Foto</label>
            <div class="row">
              <div class="col-4">
                <img src="/assets/{{ $video->video_thumb}}" alt="Thumbnail" style="width: 100px;">
              </div>
              <div class="col-8">
                <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Thumbnail Foto">
                <small id="emailHelp" class="form-text text-muted">Saat ini maximal size hanya 2.5MB</small>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi">{{ $video->video_deskripsi }}</textarea>
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
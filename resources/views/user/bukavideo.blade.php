@extends('layouts.user')

@section('body')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Video</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <div class="card-body">
        <div class="row">
          <div class="col-8">
            <img src="/assets/{{ $video->video_thumb}}" alt="Thumbnail" style="width: 100%;">
          </div>
          <div class="col-4">
            <h4>{{ $video->video_title}}</h4>
            <h6>Deskripsi : {{ $video->video_deskripsi}}</h6>
            <form action="/requestvideo" method="post">
              @csrf
              <input type="hidden" name="video_id" id="video_id" value="{{ $video->id }}">
              <button type="submit" class="btn btn-info" style="width: 100%;">Request Video</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <!-- Main row -->

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
@endsection
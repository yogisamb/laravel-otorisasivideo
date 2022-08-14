@extends('layouts.user')

@section('body')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <h3 style="text-align: center;">Daftar Semua Video</h3>
    <div class="row">
      @foreach($video as $video)
      <div class="col-3">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title" style="text-align: center;">Video</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <img src="/assets/{{ $video->video_thumb}}" alt="Thumbnail" style="width: 100%;">
          <div class="card-footer">
            <h6>Nama Video : {{ $video->video_title }} </h6>
            <h6>Deskripsi Video : {{ $video->video_deskripsi }} </h6>
            <form action="/bukavideo" method="post">
              @csrf
              <input type="hidden" name="video_id" id="video_id" value="{{ $video->id }}">
              <button type="submit" class="btn btn-info" style="width: 100%;">Buka Video</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
@endsection
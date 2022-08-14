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
            <video controls style="width: 100%;">
              <source src="/assets/{{ $video->video_label}}" type="video/mp4" />
            </video>
          </div>
          <div class="col-4">
            <h4>{{ $video->video_title}}</h4>
            <h6>Deskripsi : {{ $video->video_deskripsi}}</h6>
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
@extends('layouts.dashboard')

@section('body')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Video</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <a href="/createvideo" class="btn btn-info" style="margin-bottom: 10px;">Tambah Video</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Video</th>
              <th>Thumbnail</th>
              <th>Title</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($video as $video)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>
                <video controls style="width: 100px;">
                  <source src="/assets/{{ $video->video_label}}" type="video/mp4" />
                </video>
              </td>
              <td>
                <img src="/assets/{{ $video->video_thumb}}" alt="Thumbnail" style="width: 100px;">
              </td>
              <td>
                <h2>{{ $video->video_title }}</h2>
                <br>
                <p>Deskripsi : {{ $video->video_deskripsi }} </p>
              </td>
              <td>
                <form action="/editvideo" method="post" style="margin-top: 10px;">
                  <!-- @method('delete') -->
                  @csrf
                  <input type="hidden" name="id" value="{{ $video->id }}">
                  <button type="submit" class="btn btn-success">Edit</button>
                </form>
                <form action="/hapusvideo" method="post" style="margin-top: 10px">
                  <!-- @method('delete') -->
                  @csrf
                  <input type="hidden" name="id" value="{{ $video->id }}">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Kamu yakin?')">Hapus</button>
                </form>
                <form action="/activateuser" method="post" style="margin-top: 10px;">
                  <!-- @method('delete') -->
                  @csrf
                  <input type="hidden" name="id" value="{{ $video->id }}">
                  <button type="submit" class="btn btn-info">Activated User</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
@endsection
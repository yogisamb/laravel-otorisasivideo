@extends('layouts.dashboard')

@section('body')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data relasi</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Email</th>
              <th>Durasi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($relasi as $relasi)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $relasi->user->name}}</td>
              <td>{{ $relasi->user->email}}</td>
              <td>{{ $relasi->durasi }}</td>
              <td>
                @if(!$relasi->durasi)
                <form action="/active" method="post">
                  <!-- @method('delete') -->
                  @csrf
                  <input type="hidden" name="id" value="{{ $relasi->id }}">
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Kamu yakin mau aprove?')">Aprove</button>
                </form>
                @endif
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
@extends('layouts.dashboard')

@section('body')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data User</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <a href="/create" class="btn btn-info" style="margin-bottom: 10px;">Tambah User</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Email</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($user as $user)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $user->name}}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->user_role->user_role_title }}</td>
              <td>
                <form action="/editakun" method="post">
                  <!-- @method('delete') -->
                  @csrf
                  <input type="hidden" name="id" value="{{ $user->id }}">
                  <button type="submit" class="btn btn-success">Edit</button>
                </form>
                <form action="/hapusakun" method="post" style="margin-top: 10px">
                  <!-- @method('delete') -->
                  @csrf
                  <input type="hidden" name="id" value="{{ $user->id }}">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Kamu yakin?')">Hapus</button>
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
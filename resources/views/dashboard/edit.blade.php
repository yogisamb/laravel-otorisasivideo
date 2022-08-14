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
      <form action="/edituser" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="name" class="form-control" name="name" id="name" value="{{ $user->name }}">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="user_role_id" name="user_role_id">
              <option value="{{ $user->user_role_id }}">{{ $user->user_role->user_role_title }}</option>
              @foreach($urole as $urole)
              <option value="{{ $urole->id }}">{{ $urole->user_role_title }}</option>
              @endforeach
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
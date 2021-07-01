@extends('layout.login')

@section('content')
<h1>Đăng Nhập</h1>
<form action="{{ route('postLogin') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
      <input type="submit" value="Đăng Nhập">
    </div>
</form>
@endsection
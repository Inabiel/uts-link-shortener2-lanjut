@extends('layout.main')
@section('content')
<div class="container mt-5 pt-5">
    <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            Masuk ke akun
          </p>
        </header>
        <div class="card-content">
            <form action="" method="post">
                @csrf
            <div class="field">
              <div class="field">
                <label class="label">Email</label>
                <div class="control">
                  <input class="input" name="email" type="email" placeholder="Masukkan Email Disini...">
                </div>
              </div>
@isset($data)
<h1>{{$data}}</h1>
@endisset

              <div class="field">
                <label class="label">Password</label>
                <div class="control">
                  <input class="input" name="password" type="Password" placeholder="Masukkan password Disini...">
                </div>
              </div>
              <input type="submit" class="button is-primary is-medium" value="Masuk">
            </form>
        </div>
      </div>
</div>
@endsection

@extends('layout.main')
@section('content')
    <div class="container mt-5 pt-5">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Daftar Sekarang
                </p>
            </header>
            <div class="card-content">
                <form action="" method="post">
                    @csrf
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" name="nama" type="text" placeholder="Masukkan Nama Disini...">
                            @error('nama')
                                <div class="error has-text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" name="email" type="email" placeholder="Masukkan Email Disini...">
                            @error('email')
                                <div class="error has-text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input" name="password" type="Password" placeholder="Masukkan Password Disini...">
                            @error('password')
                                <div class="error has-text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <input type="submit"class="button is-primary is-medium" value="Daftar Sekarang!">
                </form>
            </div>
        </div>
        <div class="is-centered has-text-centered pt-5 pb-5">
            <h2 class="is-size-4 text-center">Atau...</h2>
            <button class="button is-info is-medium ml-5"><a href="/auth/login" class="has-text-white">Masuk ke akun yang
                    sudah ada</a></button>
        </div>
    </div>
@endsection

@extends('layout.main')
@section('content')
    <section>
        <div class="container">
            <div class="columns is-centered is-vcentered">
                <div class="column has-text-centered mt-5 pt-5">
                    <div class="card">
                        <header class="card-header">
                            <h1 class="is-size-4 card-header-title is-centered">Welcome {{ $data[0]['nama'] }}!</h1>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                @if (count($links) > 0)
                                    <p>Kamu mempunyai {{ count($links) }} links</p>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Original Link</th>
                                                <th>Shortened Link</th>
                                                <th>Amount of click</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        @foreach ($links as $i )
                                        <tbody>
                                            <th>{{$i->originalLink}}</th>
                                            <th><a href="/{{$i->hash}}">pendek.in/{{$i->hash}}</a></th>
                                            <th>{{$i->clicked}}</th>
                                            <th>
                                                <a href="/editbarang/{{$i->id}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                                <a href="/hapusbarang/{{$i->nama}}"><button type="button" class="btn btn-danger">Hapus</button></a>
                                            </th>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    <div class="column is-one-fifth">
                                        {{ $links->links() }}
                                    </div>
                                    <form action="/generate" method="POST">
                                        @csrf
                                        <h1 class="is-size-3">Buat lagi</h1>
                                        <div class="columns is-vcentered pt-3">
                                            <div class="column is-three-quarters-desktop is-full-mobile px-5">
                                                <input class="input is-info is-medium" type="text" name="link"
                                                    placeholder="Masukkan Link...">
                                            </div>
                                            <div class="column">
                                                <input type="submit" class="button is-info is-medium is-fullwidth-mobile"
                                                    value="Pendekin Sekarang">
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <h2 class="is-size-4 has-text-weight-medium">Kayaknya kamu belum punya link deh...</h2>
                                    <h2 class="is-size-5 has-text-weight-medium">Yuk bikin sekarang!</h2>
                                    <form action="/generate" method="POST">
                                        @csrf
                                        <div class="columns is-vcentered pt-3">
                                            <div class="column is-three-quarters-desktop is-full-mobile px-5">
                                                <input class="input is-info is-medium" type="text" name="link"
                                                    placeholder="Masukkan Link...">
                                            </div>
                                            <div class="column">
                                                <input type="submit" class="button is-info is-medium is-fullwidth-mobile"
                                                    value="Pendekin Sekarang">
                                            </div>
                                        </div>
                                        <div class="column">
                                            <p class="has-text-white has-text-centered pb-3 has-text-weight-bold">Note:
                                                Untuk user tidak
                                                terdaftar, data tidak akan disimpan. jadi catat sendiri link mu :)</p>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

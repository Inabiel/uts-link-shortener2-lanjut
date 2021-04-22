@extends('layout.main')
@section('content')
    <div class="wrapper">
        <div class="hero-body">
            <div class="container">
                <section class="first-element">
                    <div class="columns is-vcentered top-margin is-centered">
                        <div class="column is-two-fifths">
                            <h1 class="bigger top-margin">Pendek.in</h1>
                            <h2 class="is-size-4">Karena yang panjang tidak tentu bagus.</h2>
                            <p class="body has-text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Tempore nisi ut
                                deleniti exercitationem dolor aperiam atque omnis, error officia inventore.</p>
                            <button class="button button-white is-medium mt-4"><span class="has-text-weight-bold">Daftar
                                    sekarang</span></button>
                        </div>
                        <div class="column is-narrow">
                            <img src='{{ asset('/img/front-image.jpg') }}' class="" width="450px" height="450px"
                                alt="image">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>
    <section class="has-background-link-dark">
        <div class="container">
            <form action="/generate" method="POST">
                @csrf
                <div class="columns is-vcentered pt-3">
                    <div class="column is-three-quarters-desktop is-full-mobile px-5">
                        <input class="input is-info is-medium" type="text" name="link" placeholder="Masukkan Link...">
                    </div>
                    <div class="column">
                        <input type="submit" class="button is-info is-medium is-fullwidth-mobile" value="Pendekin Sekarang">
                    </div>
                </div>
                <div class="column">
                    <p class="has-text-white has-text-centered is-size-5 pb-3 has-text-weight-bold">Link: <a
                            href="{{ $hashedLink }}" class="has-text-white">pendek.in/{{ $hashedLink }}</a></p>
                </div>
            </form>
        </div>
    </section>
@endsection

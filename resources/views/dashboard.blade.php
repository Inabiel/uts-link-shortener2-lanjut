@extends('layout.main')
@section('content')
    <section>
        <div class="container">
            <div class="columns is-centered is-vcentered">
                <div class="column has-text-centered mt-5 pt-5">
                    <div class="card">
                        <header class="card-header">
                            <h1 class="is-size-4 card-header-title is-centered">Welcome {{ $data[0]['nama'] }}!</h1>
                            @if (count($links) > 0)
                            <button class="button is-link card-header-icon mt-2" id="showModal">Buat Link Baru</button>
                            @endif
                        </header>
                        <div class="card-content">
                            <div class="content">
                                @if (count($links) > 0)
                                    <p>Kamu mempunyai {{ count($links) }} links</p>
                                    @foreach ($links->sortBy('originalLink') as $i)
                                        <div class="card mb-5">
                                            <header class="card-header">
                                                <p class="card-header-title">
                                                    pendek.in/{{ $i->hash }}
                                                </p>
                                                <button class="card-header-icon" aria-label="more options">
                                                    <span class="icon">
                                                        <i class="fas fa-angle-down" aria-hidden="true"></i>
                                                    </span>
                                                </button>
                                            </header>
                                            <div class="card-content">
                                                <div class="content">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec
                                                    iaculis mauris.
                                                    <a href="#">@bulmaio</a>. <a href="#">#css</a> <a
                                                        href="#">#responsive</a>
                                                    <br>
                                                    <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                                                </div>
                                            </div>
                                            <footer class="card-footer">
                                                <a href="#" class="card-footer-item">Save</a>
                                                <a href="#" class="card-footer-item">Edit</a>
                                                <a href="#" class="card-footer-item">Delete</a>
                                            </footer>
                                        </div>
                                    @endforeach
                                    <div class="column is-one-fifth">
                                        {{ $links->links() }}
                                    </div>
                                @else
                                    <h2 class="is-size-4 has-text-weight-medium">Kayaknya kamu belum punya link deh...</h2>
                                    <h2 class="is-size-5 has-text-weight-medium">Yuk bikin sekarang!</h2>
                                    <button class="button is-link" id="showModal">Link</button>
                                @endif
                                <div class="modal">
                                    <div class="modal-background"></div>
                                    <div class="modal-card">
                                        <header class="modal-card-head">
                                            <p class="modal-card-title">Create new Link</p>
                                            <button class="delete" aria-label="close"></button>
                                        </header>
                                        <section class="modal-card-body">
                                            <form action="" id="dashboardForm" method="post">
                                            <div class="field">
                                                <label class="label">Original Link</label>
                                                <div class="control">
                                                  <input class="input" type="text" placeholder="e.g Alex Smith">
                                                </div>
                                              </div>

                                              <div class="field">
                                                <label class="label">Link yang dinginkan</label>
                                                <div class="control">
                                                    <div class="columns">
                                                        <div class="column is-one-fifth"> <span class="is-size-5 has-text-weight-semibold">Pendek.in/</span></div>
                                                        <div class="column"><input class="input" type="email" placeholder="e.g. alexsmith@gmail.com"></div>
                                                    </div>
                                                </div>
                                              </div>
                                            </form>
                                        </section>
                                        <footer class="modal-card-foot">
                                            <input type="submit" class="button is-success" value="Save changes" form="dashboardForm">
                                            <button class="button close">Cancel</button>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $("#showModal").click(function() {
            $(".modal").addClass("is-active");
        });

        $(".delete").click(function() {
            $(".modal").removeClass("is-active");
        });
        $(".close").click(function() {
            $(".modal").removeClass("is-active");
        });

    </script>
@endsection

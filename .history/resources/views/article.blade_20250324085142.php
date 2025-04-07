<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to DnizTechno Website</title>
        <link rel="stylesheet" href="{{ asset ('assets/plugins/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{ asset ('/css/style.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset ('assets/plugins/fontawesome-free/css/all.min.css')}}">
    </head>

    <body id="home">
        <div class="ss-heading-warp" id="header-article">
            <div class="jumbotron ss-heading">
                <nav class="navbar navbar-expand fixed-top" id="mainNav">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/about">Tentang kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/product/show/{{$idps}}">Paket</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="/featuring">Telah Menggunakan</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link active" href="/article">Artikel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">Kontak</a>
                                </li>
                            </ul>
                        </div>
                </nav>

                <header class="row article">
                    <div class="article-data">
                        <div class="title">
                            <h1 style="font-size: 60px; font-style: bold;">Article</h1>
                        </div>
                    </div>
                </header>
            </div>
        </div>

        <section id="article" class="article-list">
            <div class = "container">
                {{-- @foreach(array_chunk($articles, 3) as $chunk) --}}
                    <div class="row">
                    {{-- @php echo '<div class="row">'; @endphp --}}

                        @foreach ($articles as $article)
                            @php $textarticle = Str::limit($article->textArticle, 200, '....') @endphp
                            @php echo '<div class="col-lg-4 col-md-4 tm-info-box">'; @endphp
                                <img id='preview-image-before-upload' src='{{ url('public/images/'.$article->imgFilepath) }}' alt='preview image' class='img-center' style="border-radius: 5px 5px 0 0; object-fit: cover;">
                                @php echo "<h5 class='article-title mb-4'>$article->titleArticle</h5>"; @endphp
                                {{-- {!! $article->textArticle !!}} --}}
                                @php echo "<span class='article-p'>$textarticle</span>"; @endphp
                                @php echo "<p class='article-date mb-4'>$article->created_at</p>"; @endphp
                                <div class="d-grid">
                                    <a href='{{ url('/article/detail/'.$article->idArticle) }}' class="btn btn-outline-light">Read More <i class="fa fa-arrow-circle-right fa-sm"></i></a>
                                </div>
                            @php echo '</div>'; @endphp
                        @endforeach
                   {{-- @php echo '</div>'; @endphp --}}
                    </div>
                   {{-- @endforeach --}}
            </div>
            {{-- <div class="row">
                <nav>
                    <ul class="pagination d-flex justify-content-center flex-wrap pagination-rounded-flat pagination-success">
                        @if (count($articles) > 0)
                            {{ $articles->links() }}
                        @else
                        <li class="page-item active"><a class="page-link" href="#" data-abc="true">1</a></li>
                        <li class="page-item"><a class="page-link" href="#" data-abc="true">2</a></li>
                        <li class="page-item"><a class="page-link" href="#" data-abc="true">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" data-abc="true">4</a></li>
                        @endif
                    </ul>
                </nav>
            </div> --}}
            <script type="text/javascript">
                $(document).ready(function (e) {
                  $('#image').change(function(){
                    let reader = new FileReader();
                    reader.onload = (e) => {

                      $('#preview-image-before-upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                  });
                });
                </script>
        </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset ('assets/plugins/bootstrap/js/scripts.js')}}"></script>
    </body>

    <!-- Footer -->
    <div class="ss-footer-warp">
        <div class="ss-footer" id="footer">
            <footer class="row ss-footer-data" id='contact'>
                <div class="col-md-3 ss-footer-logo-warp">
                    <div class="ss-footer-logo"></div>
                </div>
                <div class="col-md-6 ss-footer-title">
                    <div class=container>
                        <table>
                            <tbody>
                                @if(count($contactsinfo) > 0)
                                    @foreach($contactsinfo as $contactinfo)
                                    <tr>
                                        <td><img id="ss-footer-img" src="{{ url('public/images/'.$contactinfo->imgFilepath) }}" alt="preview image" style="max-height: 14px; margin-right: 15px;"></td>
                                        <td><span fw-bold ss-footer-title style="font-style: italic;font-size:14px;">{{$contactinfo->textContactInfo}}</span></td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 ss-footer-link-warp">
                    <div class="row row-cols-2">
                        <div class="col">
                            <a class="nav-link nav-footer-link" href="/">Beranda</a>
                            <a class="nav-link nav-footer-link" href="/about">Tentang Kami</a>
                            <a class="nav-link nav-footer-link" href="/product/show/{{$idps}}">Paket</a>
                        </div>
                        <div class="col">
                            <a class="nav-link nav-footer-link" href="/article">Artikel</a>
                            <a class="nav-link nav-footer-link" href="/contact">Kontak</a>
                        </div>
                    </div>
                </div>
                <div id="Bottom" class="Bottom">
                    <div id="Bottom_BG" class="Bottom_BG">
                        <svg class="Path_2_dl" viewBox="-867 1803.399 1919.9 535"></svg>
                        <svg class="Path_3_dn" viewBox="-867 1803.489 1919.9 550.91"></svg>
                        <svg class="Path_1_dj" viewBox="-867 1803.435 1921.055 515.964"></svg>
                        <svg class="Path_2_dl" viewBox="-867 1803.399 1919.9 535"></svg>
                        <svg class="Path_3_dn" viewBox="-867 1803.489 1919.9 550.91"></svg>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</html>

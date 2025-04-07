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
        <div class="ss-heading-warp" id="header-article-detail">
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

                <header id="top" class="article">
                    {{-- <div class="container"> --}}
                        {{-- <div class="article-data">
                            <a href='/article' class ='container tm-info-box-b'>Back to Articles</a>
                            <div class="title">
                                <h1 style="font-size: 56px; font-style: bold;">{{$article->titleArticle}}</h1>
                            </div>
                            <p style="font-size: 16px; font-style: italic; color: #88BBF2; text-align: center; ">{{$dt}}</p>
                            <img id='preview-image-before-upload' src='{{ url('public/images/'.$article->imgFilepath) }}' alt='preview image' class='img-detail'>
                        </div> --}}
                    {{-- </div> --}}
                </header>
            </div>
        </div>

        <section id="article" class="article-list">
            <div class="container">
                <div class="article-data">
                    <a href='/article' class ='container tm-info-box-b'>Back to Articles</a>
                    <div class="title">
                        <h1 style="font-size: 56px; font-style: bold;">{{$article->titleArticle}}</h1>
                    </div>
                    <p style="font-size: 16px; font-style: italic; color: #88BBF2; text-align: center; ">{{$dt}}</p>
                    <img id='preview-image-before-upload' src='{{ url('public/images/'.$article->imgFilepath) }}' alt='preview image' class='img-detail'>
                </div>
                <div class="textarea" style="max-width: 800px; margin: auto;"><p class="p mb-4">{!! $article->textArticle !!}</p></div>
            </div>
            <!-- Back to Top link -->
            <div class="back-to-top-wrapper">
                <a href="#top" class="back-to-top-link" aria-label="Scroll to Top">back to top</a>
            </div>

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
                <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
                <script>
                    tinyMCE.init({
                    selector:'textarea',
                    // valid_elements : "a[href|target=_blank],strong/b,div[align],br,samp,underline,code,blockquote"
                    setup: function (editor) {
                        editor.on('init', function (e) {
                            editor.getContent();
                        });
                    }
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

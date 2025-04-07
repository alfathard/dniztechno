<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to DnizTechno Website</title>
        <link rel="stylesheet" href="{{ asset ('assets/plugins/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{ asset ('/css/style.css')}}">
    </head>


    <body id="home">
        <div class="ss-heading-warp">
            <div class="jumbotron ss-heading">
                <nav class="navbar navbar-expand fixed-top" id="mainNav">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/">Beranda</a>
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
                                    <a class="nav-link" href="/article">Artikel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">Kontak</a>
                                </li>
                            </ul>
                        </div>
                </nav>
                <!-- Header-->
                <header class="row ss-heading-data">
                    <div class="col-md-6 ss-heading-logo-warp">
                        <div class="ss-heading-logo"></div>
                    </div>
                    <div class="col-md-6 ss-heading-title">
                        <h1 class="display-4" style="font-style: italic;">Your Technology</h1>
                        <h1 class="display-2 fw-bold ss-heading-title-focus">SOLUTION</h1>
                    </div>
                </header>
            </div>
        </div>
        <section id="about">
            <div class="ss-about-us">
                @if(count($abouts) > 0)
                    @foreach($abouts as $about)
                        <div class="title">
                            <h1>{{$about->titleAbout}}</h1>
                        </div>
                        <div class="content">
                            <p>{{$about->textAbout}}</p>
                            <a name="" id="" class="btn btn-more" href="/about" role="button">See More</a>
                        </div>
                    @endforeach
                @else
                    <div class="title">
                        <h1>Tentang Kami</h1>
                    </div>
                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, sunt illo nihil sint, corporis error facilis, veritatis optio iure architecto hic! Commodi atque, rerum magnam architecto quia hic cumque nihil.
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique ab voluptatibus architecto! Suscipit, nam. Amet culpa, expedita quasi, distinctio illo possimus quis ad delectus rerum aut sed ab ipsum placeat?
                        </p>
                        <a name="" id="" class="btn btn-more" href="/about" role="button">See More</a>
                    </div>
                @endif
            </div>
        </section>
        <section class="benefits" id="benefits">
            <div class="row benefits-img"></div>
        </section>
        <section id=product>
            <div class="ss-paket">
                @if(count($productheaders) > 0)
                    @foreach($productheaders as $productheader)
                        <div class="ss-top">
                            <h2>{{$productheader->titleProductHeader}}</h2>
                            <p>{{$productheader->textProductHeader}}</p>
                        </div>
                    @endforeach
                @else
                    <div class="ss-top">
                        <h2>Pilihan Paket</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel est nulla possimus, rem, ab eveniet asperiores laborum aliquam laudantium perspiciatis explicabo nesciunt molestiae consectetur, reprehenderit et corrupti magnam ea exercitationem.</p>
                    </div>
                @endif
                <div class="ss-body">
                    <div class="row justify-content-center">
                        @if(count($products) > 0)
                            @foreach($products as $product)
                                <div class ="ss-paket-card-zoom">
                                    <div class=" ss-paket-card mx-2">
                                        <div class="ss-image" style="background-image: url('{{ url('public/images/'.$product->imgFilepath) }}')"></div>
                                        <div class="card-body">
                                            <h4 class="card-title">{{$product->nameProduct}}</h4>
                                            <p class="card-text">{{$product->descProduct}}</p>
                                            <a name="" id="" class="btn btn-sm btn-more mt-4" href="/product/show/{{$product->idProduct}}" role="button">See More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class ="ss-paket-card-zoom">
                                <div class=" ss-paket-card mx-2">
                                    <div class="ss-image" style="background-image: url('/assets/images/paket/SlimProfile_2x@2x.png')"></div>
                                    <div class="card-body">
                                        <h4 class="card-title">SlimProfile</h4>
                                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                        <a name="" id="" class="btn btn-sm btn-more mt-4" href="#" role="button">See More</a>
                                    </div>
                                </div>
                            </div>
                            <div class ="ss-paket-card-zoom">
                                <div class=" ss-paket-card mx-2 ">
                                    <div class="ss-image" style="background-image: url('/assets/images/paket/SlimProfile_2x@2x.png')"></div>
                                    <div class="card-body">
                                        <h4 class="card-title">SlimProfile</h4>
                                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                        <a name="" id="" class="btn btn-sm btn-more mt-4" href="#" role="button">See More</a>
                                    </div>
                                </div>
                            </div>
                            <div class ="ss-paket-card-zoom">
                                <div class=" ss-paket-card mx-2">
                                    <div class="ss-image" style="background-image: url('/assets/images/paket/SlimProfile_2x@2x.png')"></div>
                                    <div class="card-body">
                                        <h4 class="card-title">SlimProfile</h4>
                                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                        <a name="" id="" class="btn btn-sm btn-more mt-4" href="#" role="button">See More</a>
                                    </div>
                                </div>
                            </div>
                            <div class ="ss-paket-card-zoom">
                                <div class=" ss-paket-card mx-2">
                                    <div class="ss-image" style="background-image: url('/assets/images/paket/SlimProfile_2x@2x.png')"></div>
                                    <div class="card-body">
                                        <h4 class="card-title">SlimProfile</h4>
                                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                        <a name="" id="" class="btn btn-sm btn-more mt-4" href="#" role="button">See More</a>
                                    </div>
                                </div>
                            </div>
                            <div class ="ss-paket-card-zoom">
                                <div class=" ss-paket-card mx-2">
                                    <div class="ss-image" style="background-image: url('/assets/images/paket/SlimProfile_2x@2x.png')"></div>
                                    <div class="card-body">
                                        <h4 class="card-title">SlimProfile</h4>
                                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                        <a name="" id="" class="btn btn-sm btn-more mt-4" href="#" role="button">See More</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section id=featuring>
            <div class="ss-featuring">
                @if(count($testimonies) > 0)
                    @foreach($testimonies as $testimoni)
                        <div class="ss-top">
                            <h2>{{$testimoni->titleTestimoni}}</h2>
                            <p>{{$testimoni->textTestimoni}}</p>
                        </div>
                    @endforeach
                @else
                    <div class="ss-top">
                        <h2>Telah Menggunakan</h2>
                        <p>Produk DnizTechno sudah terbukti dan dipakai sudah dipakai oleh perusahaan yang bekerjasama bersama kami.</p>
                    </div>
                @endif
                <div class="ss-body">
                    <div class="row">
                        <div class="ss-carousel">
                            @if(count($custtestimonies) > 0)
                                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        @foreach ($custtestimonies as $key => $custtestimoni)
                                            <button type="button" data-bs-target="#recipeCarousel" data-bs-slide-to="{{$key}}" class=" {{ $loop->first ? 'indbutton active' : 'indbutton' }}"></button>
                                        @endforeach
                                    </div>
                                    <div class="carousel-inner">
                                        @foreach($custtestimonies as $custtestimoni)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <div class=row>
                                                    <div class="ss-featuring-card d-block w-100">
                                                        <img src="{{ url('public/images/'.$custtestimoni->imgFilepath) }}" class="ss-circle">
                                                        <div class="card-body">
                                                            <h4 class="card-title">{{$custtestimoni->custName}}</h4>
                                                            <p class="card-subtitle">{{$custtestimoni->companyName}}</p>
                                                            <p class="card-text">{{$custtestimoni->textCustTestimoni}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @else
                                    <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#recipeCarousel" data-bs-slide-to="0" class="indbutton active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#recipeCarousel" data-bs-slide-to="1" class="indbutton" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#recipeCarousel" data-bs-slide-to="2" class="indbutton" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class=row>
                                                    <div class="ss-featuring-card d-block w-100">
                                                        <img class="ss-circle">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Budi Suharjo</h4>
                                                            <p class="card-subtitle">PT Laksana Agung</p>
                                                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class=row>
                                                    <div class="ss-featuring-card d-block w-100">
                                                        <img class="ss-circle">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Budi Suharjo</h4>
                                                            <p class="card-subtitle">PT Laksana Agung</p>
                                                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class=row>
                                                    <div class="ss-featuring-card d-block w-100">
                                                        <img class="ss-circle">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Budi Suharjo</h4>
                                                            <p class="card-subtitle">PT Laksana Agung</p>
                                                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#recipeCarousel" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#recipeCarousel" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <script src="{{ asset ('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
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
                                        <td><img id="preview-image-before-upload" src="{{ url('public/images/'.$contactinfo->imgFilepath) }}" alt="preview image" style="max-height: 14px; margin-right: 15px;"></td>
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

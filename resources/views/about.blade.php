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
        <div class="ss-heading-warp">
            <div class="jumbotron ss-heading">
                <nav class="navbar navbar-expand fixed-top" id="mainNav">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/about">Tentang kami</a>
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
                                    <a class="nav-link" target="_blank" href="http://45.32.99.13:81/">Kontak</a>
                                </li>
                            </ul>
                        </div>
                </nav>
                <!-- Header-->
                <header class="row about-us">
                    <div class="about-us-data">
                        @if(count($abouts) > 0)
                            @foreach($abouts as $about)
                                <div class="title">
                                    <h1 style="font-size: 60px; font-style: bold;">{{$about->titleAbout}}</h1>
                                </div>
                                <div class="content">
                                    <p>{{$about->textAbout}}</p>
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
                            </div>
                        @endif
                    </div>
                </header>
            </div>
        </div>

        <section id="visimisi">
            <div class="container">
                <div class="row row-cols-2" style="padding: 0 15px;">
                    <div class="col visimisi-box" style="margin-bottom: 10px">
                        @if(count($visions) > 0)
                            @foreach($visions as $vision)
                                <div class="title">
                                    <h1>{{$vision->titleVision}}</h1>
                                </div>
                                <div class="content">
                                    <p>{{$vision->textVision}}</p>
                                </div>
                            @endforeach
                        @else
                            <div class="title">
                                <h1>Visi</h1>
                            </div>
                            <div class="content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit sit amet ipsum eget pretium. Cras condimentum lorem non quam ullamcorper vulputate.
                                </p>
                            </div>
                        @endif
                    </div>
                    <div class="col visimisi-box">
                        @if(count($missions) > 0)
                            @foreach($missions as $mission)
                                <div class="title">
                                    <h1>{{$mission->titleMission}}</h1>
                                </div>
                                <div class="content">
                                    <p>{{$mission->textMission}}</p>
                                </div>
                            @endforeach
                        @else
                            <div class="title">
                                <h1>Misi</h1>
                            </div>
                            <div class="content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit sit amet ipsum eget pretium. Cras condimentum lorem non quam ullamcorper vulputate.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="benefit" id="benefit">
            <div class="row benefit-img"></div>
        </section>
        <section id="testimoni">
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
                        <p>Produk DnizTechno sudah terbukti dan sudah dipakai oleh perusahaan yang bekerjasama bersama kami.</p>
                    </div>
                @endif
                <div class="ss-body">
                    <div class="row">
                        <div class="ss-carousel">
                            @if(count($cust_testimonies) > 0)
                                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        @foreach ($cust_testimonies as $key => $custtestimoni)
                                            <button type="button" data-bs-target="#recipeCarousel" data-bs-slide-to="{{$key}}" class=" {{ $loop->first ? 'indbutton active' : 'indbutton' }}"></button>
                                        @endforeach
                                    </div>
                                    <div class="carousel-inner">
                                        @foreach($cust_testimonies as $custtestimoni)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <div class=row>
                                                    <div class="ss-featuring-card d-block w-100"data-bs-toggle="modal" data-bs-target="#testimonyModal{{ $custtestimoni->idCustTestimoni }}">
                                                        <img src="{{ url('public/images/custestimonies/'.$custtestimoni->imgFilepath) }}" class="ss-circle">
                                                        <div class="card-body">
                                                            <h4 class="card-title">{{$custtestimoni->custName}}</h4>
                                                            <p class="card-subtitle">{{$custtestimoni->companyName}}</p>
                                                            <p class="card-text">{{$custtestimoni->textCustTestimoni}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="testimonyModal{{ $custtestimoni->idCustTestimoni }}" tabindex="-1" aria-labelledby="testimonyModalLabel{{ $custtestimoni->idCustTestimoni }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="testimonyModalLabel{{ $custtestimoni->idCustTestimoni }}">{{$custtestimoni->custName}} - {{$custtestimoni->companyName}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" style="margin: 0;text-align: center;">
                                                            <img src="{{ url('public/images/custestimonies/'.$custtestimoni->imgFilepath) }}" class="img-fluid mb-3" alt="Customer Image">
                                                            <p>{{$custtestimoni->textCustTestimoni}}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                                                            <p class="card-text">-</p>
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
                                                            <p class="card-text">-</p>
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
                                                            <p class="card-text">-</p>
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
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contactus">
            <div class="container">
                <div class="row" id="contact-flex">
                    <!-- Contact Info -->
                    <div class="col-12 col-sm-6" id="contact-info">
                        @if(count($contacts) > 0)
                            @foreach($contacts as $contact)
                                <div class="contactus-title">
                                    <p>{{$contact->titleContactUs}}</p>
                                </div>
                                <div class="contactus-content">
                                    <p>{{$contact->textContactUs}}</p>
                                </div>
                            @endforeach
                        @else
                            <div class="contactus-title">
                                <h1>Kontak</h1>
                            </div>
                            <div class="contactus-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit sit amet ipsum eget pretium. Cras condimentum lorem non quam ullamcorper vulputate.
                                </p>
                            </div>
                        @endif
                        <div class="contactus-detail">
                            <table>
                                <tbody>
                                @if(count($contactsinfo) > 0)
                                    @foreach($contactsinfo as $contactinfo)
                                        <tr>
                                            <td><img id="contactus-img" src="{{ url('public/images/'.$contactinfo->imgFilepath) }}" alt="preview image" style="max-height: 30px; margin-right: 15px;"></td>
                                            <td><span>{{$contactinfo->textContactInfo}}</span></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Contact Us -->
                    <div class="col-12 col-sm-6">
                        <div class="contactus-box">
                            <iframe
                                width="100%"
                                height="100%"
                                style="border:0"
                                loading="lazy"
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                                src="https://maps.google.com/maps?q=-7.989311343696066,112.61743719544343&hl=id&z=17&output=embed">
                            </iframe>

                            {{--                            <div class="contactus-box-title">Ada Pertanyaan?</div>--}}
{{--                            <div class="contactus-box-subtitle">Pertanyaan anda dapat dikirimkan lewat pengisian formulir di bawah ini</div>--}}
{{--                            {!! Form::open(['action' => 'App\Http\Controllers\ContactsListController@store', 'method' => 'POST']) !!}--}}
{{--                            <div class="form-group d-flex">--}}
{{--                                {{Form::text('nameContact', '', ['class' => 'form-control contactus-input-box', 'placeholder' => 'Your Name'])}}--}}
{{--                            </div>--}}
{{--                            <div class="form-group d-flex">--}}
{{--                                {{Form::text('emailContact', '', ['class' => 'form-control contactus-input-box', 'placeholder' => 'Your Email'])}}--}}
{{--                            </div>--}}
{{--                            <div class="form-group d-flex">--}}
{{--                                {{Form::textarea('textContact', '', ['class' => 'form-control contactus-input-box','style' => 'height:150px', 'placeholder' => 'Type in your question here'])}}--}}
{{--                            </div>--}}
{{--                            <div class="d-grid">--}}
{{--                                {{Form::submit('Send Your Message', ['class' => 'btn contactus-button'])}}--}}
{{--                            </div>--}}
{{--                            {!! Form::close() !!}--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset ('assets/plugins/bootstrap/js/scripts.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#exampleModal').on('show.bs.modal', function (event) {
                var span = $(event.relatedTarget) // Span that triggered the modal
                var myHelpId = span.data('id') // Extract info from data-* attributes

                $(this).find("#exampleModal").val( myHelpId );
                });
            });
         </script>
        <script src="https://kit.fontawesome.com/4daf2778af.js" crossorigin="anonymous"></script>
        <a href="https://instagram.com/dniztechno" class="instagram-button" target="_blank">
            <i class="fa fa-instagram my-float"></i>
        </a>
        <a href="https://wa.me/6281216338672?text=" class="whatsapp-button" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>
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

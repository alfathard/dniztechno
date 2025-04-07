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
                            <a class="nav-link" href="/article">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/contact">Kontak</a>
                        </li>
                    </ul>
                </div>
        </nav>

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
                            <div class="contactus-box-title">Ada Pertanyaan?</div>
                            <div class="contactus-box-subtitle">Pertanyaan anda dapat dikirimkan lewat pengisian formulir di bawah ini</div>
                                {!! Form::open(['action' => 'App\Http\Controllers\ContactsListController@store', 'method' => 'POST']) !!}
                                    <div class="form-group row">
                                        {{Form::text('nameContact', '', ['class' => 'form-control contactus-input-box', 'placeholder' => 'Your Name'])}}
                                    </div>
                                    <div class="form-group row">
                                        {{Form::text('emailContact', '', ['class' => 'form-control contactus-input-box', 'placeholder' => 'Your Email'])}}
                                    </div>
                                    <div class="form-group row">
                                            {{Form::textarea('textContact', '', ['class' => 'form-control contactus-input-box','style' => 'height:150px', 'placeholder' => 'Type in your question here'])}}
                                    </div>
                                    {{Form::submit('Send Your Message', ['class' => 'btn btn-block contactus-button'])}}
                                {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset ('assets/plugins/bootstrap/js/scripts.js')}}"></script>

        <section class="ss-footer-warp" style="padding-top: 40px">
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
        </section>
    </body>

    <!-- Footer -->

</html>

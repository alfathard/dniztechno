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
                                    <a class="nav-link" href="/about">Tentang kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/product">Paket</a>
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
                <header class="row our-product">
                    <div class="our-product-data">
                        @if(count($productheaders) > 0)
                            @foreach($productheaders as $productheader)
                                <div class="title">
                                    <h1>{{$productheader->titleProductHeader}}</h1>
                                </div>
                                <div class="content">
                                    <p>{{$productheader->textProductHeader}}</p>
                                </div>
                            @endforeach
                        @else
                            <div class="title">
                                <h1>Paket</h1>
                            </div>
                            <div class="content">
                                <p>
                                    Kami menyediakan opsi paket yang bisa anda pilih sesuai dengan kebutuhan bisnis anda.
                                </p>
                            </div>
                        @endif
                    </div>
                </header>
            </div>
        </div>

        <section id="product" class="product-list">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.5/vue.min.js"></script>
            <div class="row justify-content-center" style="margin-top:-250px; --bs-gutter-x : 0!important;">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class ="ss-product-card-zoom">
                            <a href="/product/show/{{$product->idProduct}}" data-id="{{$product->idProduct}}" style="text-decoration: none" role="button" class="ahref">
                                @if ($id == $product->idProduct)
                                    <div class="ss-product-card mx-2">
                                @else
                                    <div class="ss-product-card-na mx-2">
                                @endif
                                        <div class="ss-image" style="background-image: url('{{ url('public/images/'.$product->imgFilepath) }}')"></div>
                                        <div class="card-body">
                                            <h4 class="card-title">{{$product->nameProduct}}</h4>
                                            <p class="card-text">{{$product->descProduct}}</p>
                                            {{-- <a name="" id="" class="btn btn-sm btn-more mt-4" href="/product" role="button">See More</a> --}}
                                        </div>
                                    </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class ="ss-product-card-zoom">
                        <div class=" ss-product-card mx-2">
                            <div class="ss-image" style="background-image: url('/assets/images/paket/SlimProfile_2x@2x.png')"></div>
                            <div class="card-body">
                                <h4 class="card-title">SlimProfile</h4>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <a name="" id="" class="btn btn-sm btn-more mt-4" href="#" role="button">See More</a>
                            </div>
                        </div>
                    </div>
                    <div class ="ss-product-card-zoom">
                        <div class=" ss-product-card mx-2 ">
                            <div class="ss-image" style="background-image: url('/assets/images/paket/SlimProfile_2x@2x.png')"></div>
                            <div class="card-body">
                                <h4 class="card-title">SlimProfile</h4>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <a name="" id="" class="btn btn-sm btn-more mt-4" href="#" role="button">See More</a>
                            </div>
                        </div>
                    </div>
                    <div class ="ss-product-card-zoom">
                        <div class=" ss-product-card mx-2">
                            <div class="ss-image" style="background-image: url('/assets/images/paket/SlimProfile_2x@2x.png')"></div>
                            <div class="card-body">
                                <h4 class="card-title">SlimProfile</h4>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <a name="" id="" class="btn btn-sm btn-more mt-4" href="#" role="button">See More</a>
                            </div>
                        </div>
                    </div>
                    <div class ="ss-product-card-zoom">
                        <div class=" ss-product-card mx-2">
                            <div class="ss-image" style="background-image: url('/assets/images/paket/SlimProfile_2x@2x.png')"></div>
                            <div class="card-body">
                                <h4 class="card-title">SlimProfile</h4>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <a name="" id="" class="btn btn-sm btn-more mt-4" href="#" role="button">See More</a>
                            </div>
                        </div>
                    </div>
                    <div class ="ss-product-card-zoom">
                        <div class=" ss-product-card mx-2">
                            <div class="ss-image" style="background-image: url('/assets/images/paket/SlimProfile_2x@2x.png')"></div>
                            <div class="card-body">
                                <h4 class="card-title">SlimProfile</h4>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <a name="" id="" class="btn btn-sm btn-more mt-4" href="#" role="button">See More</a>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="used">
                    <p class="title">Pemakaian</p>
                    <div class="container">
                        <div class="row justify-content-md-center">
                            @if(count($productuseds) > 0)
                                @foreach($productuseds as $productused)
                                <div class="col-md-auto col-sm-auto used-item">
                                    <div class="circle" style="background-image: url('{{ url('public/images/'.$productused->imgFilepath) }}')"></div>
                                    <p class="text">{{$productused->textProductUsed}}</p>
                                </div>
                                @endforeach
                            @else
                            <div class="col-md-auto used-item">
                                <div class="circle"  style="background: #286CB5"></div>
                                {{-- <p class="text">Lorem ipsum</p> --}}
                            </div>
                            <div class="col-md-auto used-item">
                                <div class="circle" style="background: #286CB5"></div>
                                {{-- <p class="text">Lorem ipsum</p> --}}
                            </div>
                            <div class="col-md-auto used-item">
                                <div class="circle"  style="background: #286CB5"></div>
                                {{-- <p class="text">Lorem ipsum</p> --}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="feature" style="--bs-gutter-x : 0!important;">
                    <p class="title">Fitur</p>
                    <div class="container">
                        <div class="row feature-item">
                            @if(count($productfeatures) > 0)
                                @foreach($productfeatures as $productfeature)
                                <div class="col-6">
                                    <i class="fas fa-check check"></i>
                                    <span class="text">{{$productfeature->textProductFeature}}</span>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="contactuspaket">
                        <div class="content">
                            <p class="title">Jika Anda membutuhkan informasi lebih mengenai paket, anda dapat menghubungi kami</p>
                            <a name="" id="" class="btn btn-more" href="/contact" role="button">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
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
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel est nulla possimus, rem, ab eveniet asperiores laborum aliquam laudantium perspiciatis explicabo nesciunt molestiae consectetur, reprehenderit et corrupti magnam ea exercitationem.</p>
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
        {{-- Get Product ID w JQuery --}}
        {{-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script>
            $(document).ready(function(){
                $('.ahref').mouseover(function() {
                    var id = $(this).data('id');
                    console.log(id);
                    $.get("{{ url('/product/detail') }}"+"/"+id, function (data) {
                    $('#idProduct').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#nim').val(data.nim);
                    $('#role').val(data.role);
                    })
                });
            });
        </script> --}}
        {{-- Get Product ID w Vue --}}

        <script>
            new Vue({
                el: '.used',
                data: {
                    hover: ''
                },
                methods: {
                    mouseOver: function(){
                        this.active = !this.active;
                    }
                }
            })
        </script>
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
                            <a class="nav-link nav-footer-link" href="/product">Paket</a>
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

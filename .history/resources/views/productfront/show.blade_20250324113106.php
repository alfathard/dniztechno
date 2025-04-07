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
                                <p class="text">Lorem ipsum</p>
                            </div>
                            <div class="col-md-auto used-item">
                                <div class="circle" style="background: #286CB5"></div>
                                <p class="text">Lorem ipsum</p>
                            </div>
                            <div class="col-md-auto used-item">
                                <div class="circle"  style="background: #286CB5"></div>
                                <p class="text">Lorem ipsum</p>
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
                        </div>
                    @endforeach
                @else
                    <div class="ss-top">
                        <h2>Telah Menggunakan</h2>
                    </div>
                @endif
                <div class="ss-featuring">
                    <div class="row justify-content-center" style="--bs-gutter-x : 0">
                        @if(count($cust_testimonies) > 0)
                                @foreach($cust_testimonies as $cust_testimoni)
                                    <div class="col testimoni-item">
                                        <a class="btn default" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$cust_testimoni->idCustTestimoni}}" type="button" style="width: auto">
                                            {{-- <a href="#my_modal" data-toggle="modal" data-id="{{$cust_testimoni->idCustTestimoni}}">Open Modal</a> --}}
                                            {{-- <input type="text" name="myId" id="myId" value="{{$cust_testimoni->idCustTestimoni}}"/> --}}
                                            <div class="circle" style="background-image: url('{{ url('public/images/custestimonies/'.$cust_testimoni->imgFilepath) }}')"></div>
                                            <div class="title">
                                                <h4>{{$cust_testimoni->custName}}</h4>
                                            </div>
                                            <div class="subtitle">
                                                <p>{{$cust_testimoni->companyName}}</p>
                                            </div>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_{{$cust_testimoni->idCustTestimoni}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="btn default" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="circle"></div>
                                                        <div class="title">
                                                            {{-- <input type="text" name="help" id="help" value=""/> --}}
                                                            <h4>{{$cust_testimoni->custName}}</h4>
                                                        </div>
                                                        <div class="subtitle">
                                                            <p>{{$cust_testimoni->companyName}}</p>
                                                        </div>
                                                        <div class="text">
                                                            <p>{{$cust_testimoni->textCustTestimoni}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        @else
                            <a class="btn default" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" style="width: auto">
                                <div class="col testimoni-item">
                                    <div class="circle"></div>
                                    <div class="title">
                                        <h4>Customer Name</h4>
                                    </div>
                                    <div class="subtitle">
                                        <p>Company Name</p>
                                    </div>
                                </div>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn default" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="circle"></div>
                                            <div class="title">
                                                {{-- <input type="text" name="help" id="help" value=""/> --}}
                                                <h4>Customer Name</h4>
                                            </div>
                                            <div class="subtitle">
                                                <p>Company Name</p>
                                            </div>
                                            <div class="text">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel est nulla possimus, rem, ab eveniet asperiores laborum aliquam laudantium perspiciatis explicabo nesciunt molestiae consectetur, reprehenderit et corrupti magnam ea exercitationem.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
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

@extends('frontend.layouts.main')
@section('content')

        <div class="sale">
            <div class="container slogan">
                <div class="text-center">
                    <h3 style="color: lightseagreen; font-family: Courier New, monospace;">Checkout the best Footwear from the Platform</h3>
                </div>
            </div>
        </div>

        @if (session('success'))
        <script>
            $(document).ready(function() {
                $('#myModal').modal('show');
            });
        </script>
        @endif

            <div id="myModal" class="modal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Success</h5>
                      <button type="button" class="close" data-dismiss="modal">
                        <span class="btn btn-danger" aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>{{ session('success') }}</p>
                    </div>
                  </div>
                </div>
            </div>

        @if($banner->isNotEmpty())
        <aside id="colorlib-hero">
            <div class="flexslider">
                <ul class="slides">
                    @foreach($banner as $item)
                        <li style="background-image: url('/storage/{{$item->image}}');">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 offset-sm-3 text-center slider-text">
                                        <div class="slider-text-inner">
                                            <div class="desc">
                                                <h1 class="head-1">{{ $item->headline }}</h1> {{--topmost statement discount--}}
                                                <h2 class="head-2">{{ $item->headline2 }}</h2>   {{--Middle statement information--}}
                                                <h2 class="head-3">{{ $item->headline3 }}</h2>   {{--end statement command--}}
                                                <p></p> {{--space--}}
                                                <p><a href="{{route('frontend.showallproducts')}}" class="btn btn-primary">{{$item->link}}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
        @endif

        @if($prodcat->isNotEmpty())
        <div>
          <div class="container">
            <div class="row p-3">
              <div class="col-sm-12 text-center">
                <h2 class="intro">It all starts with a simple idea: Creating quality, well-designed websites.</h2>
              </div>
            </div>
          </div>
        </div>
        {{--For categories section--}}
        <div>
            <div class="container-fluid">
              <div class="row">
                @foreach ($prodcat as $p)
                <div class="col-sm-6 text-center">
                  <div class="p-3">
                    <a href="{{url('frontend/showcat/'.$p->name)}}"><img src="/storage/{{$p->image}}" width="100%" height="420" alt="Hello"></a>
                    <div class="desc">
                      <br>
                      <h2><a href="#">{{ $p->name }} Collection</a></h2>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        @endif

        {{--For showing only active products--}}

        @if($products->isNotEmpty())
          <div>
            <div class="container">
              <div class="row p-3">
                <div class="col-sm-8 offset-sm-2 text-center">
                  <h2 class="intro pb-3">Best Sellers</h2>
                </div>
              </div>
              <div class="row">
                @foreach ($products->take(12) as $p)
                  <div class="col-lg-3 mb-4 text-center">
                    <div class="product-entry border">
                      <a href="{{url('frontend/proddetail/'.$p->id)}}" class="prod-img">
                        <img src="/storage/{{$p->image}}" width="100%" height="280px">
                      </a>
                      <div class="desc">
                        <h2><a href="#">{{$p->name}}</a></h2>
                        <span class="price">₹ {{$p->price}}</span>
                        <?php
                            // Assuming $product->color is a JSON string
                            $productColorsArray = json_decode($p->color);
                            if (!function_exists('generateColorCircles')) {
                            // Function to generate HTML for circles based on colors
                            function generateColorCircles($colors) {
                                $html = '<span>Colors Available:</span><div class="py-2 d-flex">
                                <div class="container text-center"><div class="row justify-content-center">';
                                foreach ($colors as $color) {
                                    $html .= '<span class="circle custom-' . strtolower($color) . ' mr-3 border border-secondary"></span>';
                                }
                                $html .= '</div></div></div>';
                                return $html;
                                }
                            }
                            // Usage example
                            echo generateColorCircles($productColorsArray);
                            ?>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="row mt-4">
                <div class="col-md-12 text-center">
                  <p><a href="{{route('frontend.showallproducts')}}" class="btn btn-primary btn-lg">See All Products</a></p>
                </div>
              </div>
            </div>
          </div>
        @endif

        @if($trusted->isNotEmpty())
          {{-- For Trusted Partners --}}
          <div>
            <div class="container">
                <div class="text-center">
                    <h2 class="intro pt-3 pb-4">
                        Trusted Partners
                    </h2>
                </div>
              <div class="row p-3">
                @foreach ($trusted as $partner)
                <div class="col partner-col text-center">
                  <img src="/storage/{{ $partner->image }}" width="100%" height="215" alt="Trusted Partner">
                </div>
                @endforeach
              </div>
            </div>
          </div>
        @endif

@endsection



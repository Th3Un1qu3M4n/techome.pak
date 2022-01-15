@extends('layouts.frontend')

@section('title', 'Shop')

@section('custom-css')
    <style>
        .card img{
            height: 20vh;
            object-fit: contain;
            width: 100%;
        }
        .card-body {
            border-top: 2px solid rgba(207, 207, 207,0.5);
        }
        .cover-img{
            object-fit: cover !important;
        }
    </style>
    
@endsection

@section('content')
    <section class="links container">
        @include('layouts.inc.breadcrumb')
    </section>

    <section class="trending-categories py-1">
        
        <div class="container">
            <h2 class="py-2"> {{$category->name}}</h2>
            <div class="row">
                {{-- <div class="owl-carousel featured-carousel owl-theme col-12"> --}}
                    
                    @foreach ($products as $item)
                        <div class="product-container  col-12 col-sm-6 col-md-4">
                            <div class="card m-2">
                                <a  class="text-reset text-decoration-none" href="{{url('shop/'.$category->slug.'/'.$item->id)}}">
                                <img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="">
                                <div class="card-body mt-2">
                                    
                                    <h5>{{$item->name}}</h5>
                                    {{-- <span>{{$item->short_desc}}</span> --}}
                                    <span>{!! \Illuminate\Support\Str::limit($item->desc, 150, $end='...') !!}</span>
                                    <div class="price">Rs.{{$item->price}}</div>
                                    
                                </div>
                                </a>
                            </div>
                        </div>
                        
                    @endforeach
                        
                    
                    
                {{-- </div> --}}
                
            </div>

        </div>
    </section>
@endsection

@section('custom-scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            responsive:{
                200:{
                    items:1
                },
                400:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })
    </script>
@endsection
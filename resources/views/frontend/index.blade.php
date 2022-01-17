@extends('layouts.frontend')

@section('title', 'Home')

@section('custom-css')
    <style>
        .card img{
            height: 20vh;
            object-fit: contain;
        }
        .card-body {
            border-top: 2px solid rgba(207, 207, 207,0.5);
        }
    </style>
    
@endsection

@section('content')
    <section class="home-slider">
       
          <div id="carouselExampleIndicators" class="carousel  carousel-fade  slide" data-bs-ride="carousel"data-bs-interval="3000">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('assets/uploads/cover/cover2.jpg')}}" class="d-block w-100" alt="..." style="height: 90vh; object-fit:cover; object-position: center;">
              </div>
              <div class="carousel-item">
                <img src="{{asset('assets/uploads/cover/cover1.jpg')}}" class="d-block w-100" alt="..." style="height: 90vh; object-fit:cover; object-position: right;">
              </div>
              <div class="carousel-item">
                <img src="{{asset('assets/uploads/cover/cover3.jpg')}}" class="d-block w-100" alt="..." style="height: 90vh; object-fit:cover; object-position: center;">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section>

    <section class="trending-products py-4">
        {{-- {{$trending_products}} --}}
        <div class="container">
            <h2 class="py-2">Featured Products</h2>
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme col-12">
                    
                    @foreach ($trending_products as $item)
                        
                            <div class="card">
                                <a  class="text-reset text-decoration-none" href="{{url('shop/'.$item->category->slug.'/'.$item->id)}}">
                                <img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="">
                                <div class="card-body mt-2">
                                    
                                    <h5>{{$item->name}}</h5>
                                    <span class="price">Rs.{{$item->price}}</span>
                                    
                                </div>
                                </a>
                            </div>
                        
                    @endforeach
                        
                    
                    
                </div>
                
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
                    items:5
                }
            }
        })
    </script>
@endsection
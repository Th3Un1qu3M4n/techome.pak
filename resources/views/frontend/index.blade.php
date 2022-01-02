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

    <section class="trending-products py-3">
        {{-- {{$trending_products}} --}}
        <div class="container">
            <div class="row">
                @foreach ($trending_products as $item)
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="card">
                            <img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="">
                            <div class="card-body mt-2">
                                Hello
                                <h5>{{$item->name}}</h5>
                                <span class="price">Rs.{{$item->price}}</span>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
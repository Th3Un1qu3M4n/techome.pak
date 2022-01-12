@extends('layouts.frontend')

@section('title', 'Shop')

@section('custom-css')
    <style>
        .card img{
            height: 20vh;
            object-fit: cover;
        }
        .card-body {
            border-top: 2px solid rgba(207, 207, 207,0.5);
        }
    </style>
    
@endsection

@section('content')
    
    <section class="trending-categories my-3 py-4">
        
        <div class="container">
            <h2 class="py-2">Featured Categories</h2>
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme col-12">
                    
                    @foreach ($trending_categories as $item)
                        
                            <div class="card">
                                <a  class="text-reset text-decoration-none" href="{{url('shop/'.$item->slug)}}">
                                <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="">
                                <div class="card-body mt-2">
                                    
                                    <h5>{{$item->name}}</h5>
                                    <span>{{$item->description}}</span>
                                    
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
                    items:3
                }
            }
        })
    </script>
@endsection
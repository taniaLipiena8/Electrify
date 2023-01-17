@extends('layouts.template')
@section('title', 'Electrify')

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissable fade show" role="alert">
               {{ session('success') }}
               <button type="button" class="btn-close text-end" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div id="carouselAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner.png') }}" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner.png') }}" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner.png') }}" class="d-block w-100" alt="">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h2>Recommendation</h2>
        <div class="row d-flex justify-content-center my-4">
            @foreach ($products as $product)
                <div class="col-sm-3 mb-4">
                    <div class="card" style="height: 500px">
                        <div class="w-100" style="height: 300px">
                            <img src="{{ asset($product->image) }}" class="img-fluid w-100" style="height: 200px;"
                                alt="">
                        </div>

                        <div class="card-body">
                            <div class="mb-3">
                                <h2 class="card-title fs-4">{{ $product->name }}</h2>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <p>{{ $product->stock }} stock(s) available</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="card-text">{{ $product->sold }} sold</p>
                                    </div>
                                    <h3 class="fs-6">Rp. {{ $product->price }}</h3>
                                </div>
                            </div>

                            <div class="mb-2">

                                <a href="{{ route('product.view', $product->id) }}" class="btn btn-primary px-4">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@endsection

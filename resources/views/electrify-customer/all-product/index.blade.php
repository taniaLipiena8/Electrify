@extends('layouts.template')
@section('title', 'Electrify')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3 sidebar-filter">
                <h3 class="mt-5 mb-5">Showing Products</h3>
                <h6 class="text-uppercase">Categories</h6>
                <div class="filter-checkbox">
                    @foreach ($categories as $category)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="category-{{ $loop->iteration }}">
                            <label class="custom-control-label"
                                for="category-{{ $loop->iteration }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="my-3">
                    <h6 class="text-uppercase justify-content-between">Price</h6>
                    <div class="price-filter">
                        <input type="text" class="form-control" id="price-min">
                        <input type="text" class="form-control" id="price-max">
                    </div>
                </div>

                <a href="#" class="btn btn-lg btn-full-width btn-primary mt-4">Update Results</a>
            </div>

            <div class="col-md">
                <div class="container">
                    <h2>All Product</h2>

                    <div class="row d-flex justify-content-center my-4">
                        @foreach ($products as $product)
                            <div class="col-sm-3 mb-4">
                                <div class="card" style="height: 400px">
                                    <div class="w-100" style="height: 250px">
                                        <img src="{{ asset($product->image) }}" class="img-fluid w-100"
                                            style="height: 150px;" alt="">
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
                                            {{-- {{ route('product.view', $product->id) }} --}}
                                            <a href="" class="btn btn-primary px-4">
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
            </div>
        </div>
    </div>
@endsection
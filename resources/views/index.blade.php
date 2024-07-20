@extends('layout')

@section('title', 'Trang chủ')

@section('content')
    <nav>
        <ul>
            <li><a href="{{route('home')}}">Trang chủ</a></li>
            @foreach ($categories as $category)
            <li><a href="{{ route('shop', $category->id) }}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </nav>
        <div class="product">
            <h2>Trang chủ</h2>
            <div class="product-list">
                <div class="product-item row">
                    @foreach ($products as $product)
                        <div class="col-3">
                        <img src="{{ $product->thumbnail }}" width="80%" height="300px">
                            <a href="{{ route('product.detail', $product->id) }}">
                                <h3>{{ $product->title }}</h3>
                            </a>
                            <p>{{ $product->price }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
@endsection
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
    <div class="product row">
        <div class="col-5">
            <img src="{{ $product->thumbnail }}" alt="" width="100%" >
        </div>
        <div class="col-7">
            <h1>{{ $product->title }}</h1>
            <p>Giá: {{ $product->price}} $</p>
            <p>Mô tả: {{ $product->description}}</p>
            <p>Số lượng: {{ $product->quantity}}</p>
        </div>
    </div>
@endsection
@extends('layout')

@section('content')
    <h1>{{ $productType->name }}</h1>
    <ul>
        @foreach ($productType->products as $product)
            <li>{{ $product->name }}</li>
        @endforeach
    </ul>
@endsection


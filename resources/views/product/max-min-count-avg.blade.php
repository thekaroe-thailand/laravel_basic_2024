@extends('layout')

@section('content')
<h1>Max, Min, Count, Avg</h1>
<p>Max: {{ $priceMax }}</p>
<p>Min: {{ $priceMin }}</p>
<p>Count: {{ $priceCount }}</p>
<p>Avg: {{ $priceAvg }}</p>
@endsection

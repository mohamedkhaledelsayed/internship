@extends('Layouts.main-layout')

@section('title', 'Categories')

@section('style')
<link rel="stylesheet" href="{{ asset('styles/store.css') }}">
@endSection

@section('content')
    <main class="container d-flex flex-column gap-5 py-5">
        <h1 class="text-center">STORE</h1>
        <div class="filter justify-content-between d-flex gap-5 w-100">
            <h3>Filter</h3>
            <select name="" id="">
                <option value="">Filter by</option>
                @foreach ($categories as $item )
                    <option value="">
                        {{ $item->ar_name }}
                        /
                        {{ $item->en_name }}
                    </option>
            @endforeach
            </select>
        </div>
        <div class="row justify-content-center gap-5">
            <div class="col-md-3 product-card d-flex flex-column gap-2">
                <img src="{{ asset('imgs/product.jpg') }}" class="w-100" alt="">
                <h3 class="text-center">Product Name</h3>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                <div class="details align-items-center d-flex justify-content-between px-2">
                    <p>Price: $100</p>
                    <p class="cat">category</p>
                </div>
                <a href="" class="bg-primary text-white text-center p-2">Show more</a>
            </div>
        </div>
    </main>
@endSection

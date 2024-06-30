@extends('Layouts.main-layout')

@section('title', 'Welcome')

@section('style')
<link rel="stylesheet" href="{{ asset('style/welcome.css') }}">
@endSection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Welcome
            </div>
        </div>
    </div>
@endSection

@extends('layouts.app')

@section('title')
    MyNet
@endSection

@section('content')
    @guest
        <h1>Please login to view the content</h1>
    @else
        <div class="col-8">
            @yield('content')
        </div>
    @endguest
@endSection

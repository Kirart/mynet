@extends('layouts.app')

@section('title')
    MyNet
@endSection

@section('content')
    @guest
        <h1>Please login to view the content</h1>
    @endguest
@endSection

@extends('layouts.app')

@section('title')
    {{ $name }} {{ $surname }}
@endSection

@section('content')
    @include('inc.profile')
@endSection

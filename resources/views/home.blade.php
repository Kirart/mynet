@extends('layouts.app')

@section('title')
    Title 1
@endSection

@section('content')
    @include('inc.profile')
@endSection

@section('aside')
    @parent
    <p>Дополнительный текст</p>
@endsection

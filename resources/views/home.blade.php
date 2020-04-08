@extends('layouts.app')

@section('title')
    Title 1
@endSection

@section('content')
    <h1>{{ 'Title' }}</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porttitor ligula nisl, aliquam aliquet sem ornare a.
        Curabitur tincidunt congue massa vitae euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et neque enim.
        Nunc non tortor vitae urna interdum vehicula ut a mauris. Suspendisse eu porta nisi, sit amet scelerisque orci.
        Sed pretium commodo tortor, at interdum nunc aliquet in. Mauris ornare imperdiet felis, suscipit tristique nisi cursus nec.
        Nunc malesuada, purus nec tincidunt scelerisque, nisl est ornare neque, bibendum efficitur erat eros et risus.
        Quisque fermentum congue porttitor. Curabitur congue ex eu nisi ultrices vehicula. Donec sit amet ultricies enim.
        Proin fermentum, felis ut malesuada porttitor, metus nibh auctor dolor, eget auctor turpis orci vitae risus.
        Integer efficitur nunc eu vulputate venenatis. Ut ac finibus dolor. Donec imperdiet interdum erat non sagittis.
    </p>
@endSection

@section('aside')
    @parent
    <p>Дополнительный текст</p>
@endsection

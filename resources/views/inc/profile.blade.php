@extends('layouts.app')

@section('title')
    Title 1
@endSection

@section('content')
    <h1>Profile</h1>
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-md-6">
                <label>Name</label>
            </div>
            <div class="col-md-6">
                <p>{{ $name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Surname</label>
            </div>
            <div class="col-md-6">
                <p>{{ $surname }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Email</label>
            </div>
            <div class="col-md-6">
                <p>{{ $email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Gender</label>
            </div>
            <div class="col-md-6">
                <p>{{ $gender }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Age</label>
            </div>
            <div class="col-md-6">
                <p>{{ $age }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>City</label>
            </div>
            <div class="col-md-6">
                <p>{{ $city }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Interests</label>
            </div>
            <div class="col-md-6">
                <p>{{ $interests }}</p>
            </div>
        </div>
    </div>

@endSection

@section('aside')
    @parent
    <p>Дополнительный текст</p>
@endsection

@extends('layouts.app')

@section('title')
    Friends list
@endSection

@section('content')
    <div>
        <h1>Profiles list</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                    <form>
                        @csrf
                    <tr>
                        <td><a href="{{ route('profile', $profile->id) }}">{{ $profile->name }} {{ $profile->surname }}</a></td>
                    </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
@endSection

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
                <th scope="col">Surname</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                    <form>
                        @csrf
                    <tr>
                        <td>{{ $profile->name }}</td>
                        <td>{{ $profile->surname }}</td>
                    </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
@endSection

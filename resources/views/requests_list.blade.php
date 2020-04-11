@extends('layouts.app')

@section('title')
    Profiles list
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
                        <td>
                            <button class="btn btn-success" style="margin-top:10px" @click.prevent="postRequest({{ $profile->id }})">Accept</button></td>
                    </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
@endSection

@section('aside')
    @parent
    <p>Дополнительный текст</p>
@endsection

@section('scripts')
    <script>
        const app = new Vue({
            el: '#app',
            data: {
                user: {!! \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->toJson() : 'null' !!}
            },
            methods: {
                postRequest(id) {
                    axios.post('/accept_request', {requester_id: id})
                        .then((response) => {
                            console.log('post request');
                        })
                        .catch((error) => {
                            console.log('post request fail');
                            console.log(error);
                        })
                }
            }
        })
    </script>
@endsection

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
                    <tr>
                        <td>{{ $profile->name }}</td>
                        <td>{{ $profile->surname }}</td>
                        <td><div class="btn btn-success btn-sm" id="{{ $profile->id }}"
                                 onclick="event.preventDefault(); return makeFriends(id);">
                                Make friends
                            </div></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="application/javascript">
        function makeFriends(id) {
            {{--document.getElementById("tr" + id).style.backgroundColor = "#BFFFAC";--}}
            {{--var str = '{{ path_for('dash_allseo_editor', {'id':':id'}) }}';--}}
            {{--var url = str.replace(":id", id);--}}
            {{--window.open(url, '_blank');--}}
        }
    </script>
@endSection

@section('aside')
    @parent
    <p>Дополнительный текст</p>
@endsection

@extends('layouts.app')

@section('title')
    Profiles list
@endSection

@section('content')
    <div>
        <h1>Profiles list</h1>
        <div>
            <form method="post" data-id=""
                  onsubmit="event.preventDefault(); return search(this);">
                @csrf
                <div class="form-row">
                    <div class="col form-group">
                        <label for="name">First name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div> <!-- form-group end.// -->
                    <div class="col form-group">
                        <label for="surname">Last name</label>
                        <input type="text" name="surname" id="surname" class="form-control">
                    </div> <!-- form-group end.// -->
                    <button id="button-search" type="submit" class="btn btn-primary">Search</button>
                </div> <!-- form-row end.// -->
            </form>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                    <form method="post" data-id="{{ $profile->id }}"
                          onsubmit="event.preventDefault(); return sendRequest(this);">
                        @csrf
                        <tr>
                            <td><a href="{{ route('profile', $profile->id) }}">{{ $profile->name }} {{ $profile->surname }}</a></td>
                            <td>
                                @if($profile->status != 1)
                                    <button id="button{{ $profile->id }}" type="submit" class="btn btn-primary" {{ $profile->status == 0 ? 'disabled' : '' }}>Make friends</button>
                                @endif
                            </td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
@endSection

@section('scripts')
    <script type="application/javascript">
        function sendRequest(form) {
            if (confirm("Send friendship request?")) {
                var id = $(form).data('id');
                $.ajax({
                    url: '{{ route('requests_list') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {'receiver_id': id},
                    success: function (response) {
                        if (response.success) {
                            $('#button' + id).prop('disabled', true);
                        } else {
                            console.log(response.error);
                        }
                    }
                });
            }
        }
        function search(form) {
            var name = $("#name").val();
            var surname = $("#surname").val();
            $.ajax({
                url: '{{ route('profiles_list') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                data: {'name': name, 'surname': surname},
                success: function (response) {
                    if (response.success) {
                        console.log(response.success);
                    } else {
                        console.log(response.error);
                    }
                }
            });
        }
    </script>
@endsection

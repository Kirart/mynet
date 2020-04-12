@extends('layouts.app')

@section('title')
    Requests list
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
                    <form method="post" data-id="{{ $profile->id }}"
                          onsubmit="event.preventDefault(); return acceptRequest(this);">
                        <tr>
                            <td><a href="{{ route('profile', $profile->id) }}">{{ $profile->name }} {{ $profile->surname }}</a></td>
                            <td><button id="button{{ $profile->id }}" type="submit" class="btn btn-primary">Accept request</button></td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
@endSection

@section('scripts')
    <script type="application/javascript">
        function acceptRequest(form) {
            if (confirm("Accept friendship request?")) {
                var id = $(form).data('id');
                $.ajax({
                    url: '{{ route('accept_request') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {'requester_id': id},
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
    </script>
@endsection

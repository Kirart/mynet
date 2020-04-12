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
                    <form method="post" data-id="{{ $profile->id }}"
                          onsubmit="event.preventDefault(); return sendRequest(this);">
                        @csrf
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td>{{ $profile->surname }}</td>
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
    </script>
@endsection

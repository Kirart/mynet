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
                            <td><button id="button" type="submit" class="btn btn-primary">Make friends</button></td>
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
    <script type="application/javascript">
        function sendRequest(form) {
            if (confirm("Send friendship request?")) {
                var id = $(form).data('id');
                $.ajax({
                    url: '{{ route('requests_list') }}',
                    type: "POST",
                    data: {'receiver_id': id},
                    success: function (response) {
                        if (response.success) {
                            console.log('success');
                            // $('#row_' + id).remove();
                            // $('#modal_'+id).modal('hide');
                            // $('body').removeClass('modal-open');
                            // $('.modal-backdrop').remove();
                        } else {
                            // $('#row_' + id).addClass('danger');
                            // $('#allseo_val_' + id).val(response.allseo);
                            // $('#modal-body_' + id).css("background-color", "#FF8597");
                            console.log('error');
                            console.log(response.error);
                        }
                    }
                });
            }
        }
    </script>
@endsection

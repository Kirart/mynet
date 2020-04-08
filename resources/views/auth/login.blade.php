@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">Sign in</h4>
                </header>
                <article class="card-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <label for="password">Create password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Sign in  </button>
                        </div> <!-- form-group// -->
                    </form>
                </article>
            </div> <!-- card.// -->
        </div> <!-- col.//-->
    </div>
{{--    <div class="row content-center">--}}
{{--        <form action="{{ route('login') }}" method="post">--}}
{{--            @csrf--}}

{{--            <div class="form-group">--}}
{{--                <label for="email">Введите email</label>--}}
{{--                <input type="text" name="email" placeholder="Введите email" id="email" class="form-control">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="password">Пароль</label>--}}
{{--                <input type="text" name="password" placeholder="Пароль" id="password" class="form-control">--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn btn-success">Sign in</button>--}}
{{--        </form>--}}
{{--    </div>--}}
</div>
@endsection

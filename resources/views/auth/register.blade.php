@extends('layouts.app')

@section('content')
    <div class="container">
{{--        <div class="row content-center">--}}
{{--            <form action="{{ route('register') }}" method="post">--}}
{{--                @csrf--}}

{{--                <div class="form-group">--}}
{{--                    <label for="name">Введите имя</label>--}}
{{--                    <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="surname">Введите фамилию</label>--}}
{{--                    <input type="text" name="surname" placeholder="Введите фамилию" id="surname" class="form-control">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="age">Возраст</label>--}}
{{--                    <input type="text" name="age" placeholder="Введите возраст" id="age" class="form-control">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="subject">Тема сообщения</label>--}}
{{--                    <input type="text" name="subject" placeholder="Тема сообщения" id="subject" class="form-control">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="interests">Интересы</label>--}}
{{--                    <textarea name="interests" placeholder="Интересы" id="interests" class="form-control"></textarea>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="city">Город</label>--}}
{{--                    <input type="text" name="city" placeholder="Введите город" id="city" class="form-control">--}}
{{--                </div>--}}
{{--                <button type="submit" class="btn btn-success">Отправить</button>--}}
{{--            </form>--}}
{{--        </div>--}}

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Sign up</h4>
                    </header>
                    <article class="card-body">
                        <form action="{{ route('register') }}" method="post">
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
                            </div> <!-- form-row end.// -->
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="male">
                                    <span class="form-check-label"> Male </span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="female">
                                    <span class="form-check-label"> Female</span>
                                </label>
                            </div> <!-- form-group end.// -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="name" class="form-control">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row.// -->
                            <div class="form-group">
                                <label for="interests">Interests</label>
                                <textarea name="interests" placeholder="Интересы" id="interests" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="password">Create password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Register  </button>
                            </div> <!-- form-group// -->
                        </form>
                    </article>
                </div> <!-- card.// -->
            </div> <!-- col.//-->

        </div>
    </div>
@endsection

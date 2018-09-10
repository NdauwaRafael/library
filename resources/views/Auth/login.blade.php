@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="login banner-bg">
            <div class="login__card">
                <form action="/login" method="post">
                    {{csrf_field()}}
                    <label>User Email
                        <input  type="email" name="email" placeholder="enter user email" value="{{old('email')}}" required>
                    </label>

                    <label>User Password
                        <input type="password" name="password" placeholder="enter user password" required>
                    </label>

                    <button type="post" class="success button">Sign In</button>

                    <span class="login__error">
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </span>
                </form>
            </div>
        </div>
    </div>
@endsection
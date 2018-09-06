@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="login">
            <div class="login__card">
                <form action="">
                    <label>User Email
                        <input type="email" placeholder="enter user email">
                    </label>

                    <label>User Password
                        <input type="password" placeholder="enter user password">
                    </label>

                    <button class="success button">Sign In</button>
                </form>
            </div>
        </div>
    </div>
@endsection
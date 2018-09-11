@extends('layouts.default')
@section('content')
    <div class="grid-x">
        <div class="large-8 medium-10 small-12">
            {!! Form::open(['route' => ['users.role_assignment', $user->id]]) !!}

            {!! Form::label('role_id', 'Assign role to user') !!}
            {!! Form::select('role_id', $roles , $user->role_id ) !!}

            <div>
                {!! Form::submit('Submit', ['class' => 'button']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

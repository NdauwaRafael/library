@extends('layouts.default')
@section('content')
    <div class="users__add">
        {!! Form::model($role, ['route' => ['roles.store', $role->id]]) !!}

            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null , ['required','placeholder' => 'Role Name']) !!}

            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', null , ['required', 'placeholder' => 'Role Description']) !!}

            {!! Form::submit('Save', ['class' => 'button']) !!}

        {!! Form::close() !!}
    </div>
@endsection


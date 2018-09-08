@extends('layouts.default')
@section('content')
    <div>
        <users :lists="{{ $users }}"></users>
    </div>
@endsection

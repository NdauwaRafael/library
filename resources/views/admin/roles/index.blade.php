@extends('layouts.default')
@section('content')
    <div>
        <roles :lists="{{ $roles }}"  inline-template></roles>
    </div>
@endsection

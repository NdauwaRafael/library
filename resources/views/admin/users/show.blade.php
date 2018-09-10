@extends('layouts.default')
@section('content')
    <view-user user="{{Auth::user()->all}}"></view-user>
@endsection

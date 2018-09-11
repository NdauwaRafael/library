@extends('layouts.default')
@section('content'){{$issue}}
    <view-request :issue="{{$issue}}"></view-request>
@endsection

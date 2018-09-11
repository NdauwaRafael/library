@extends('layouts.default')
@section('content')
    <view-book :book="{{$book}}" :user="{{$user}}"></view-book>
@endsection
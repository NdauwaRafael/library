@extends('emails.layout.default')
@section('content')
<div>
    <p>Team ,</p>
     <p>{{$book->user->present()->fullName}} has request a book called {{$book->title}}</p>
</div>
@endsection

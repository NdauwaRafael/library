@extends('emails.layout.default')
@section('content')
    <div>
        <p>{{$book->user->present()->fullName}} ,</p>
        <p>Your requested book {{$book->title}}, has been approved.Kindly collect at Library desk .</p>
    </div>
@endsection

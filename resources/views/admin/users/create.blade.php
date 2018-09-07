@extends('layouts.default')
@section('content')
 <div>
     {!! Form::open(['route' => ['create.user'],'files' => 'true']) !!}
     <div class="small-12 large-5 cell">
         {!! Form::hidden('created_by', auth()->id())!!}
     </div>
     <create-user :roles="{{ $roles }}" :departments="{{ $departments }}">

     </create-user>
     <div class="small-12 large-2 cell">
         {!! Form::submit('Save', ['class' => 'button']) !!}
     </div>
     {!! Form::close() !!}
 </div>
@endsection

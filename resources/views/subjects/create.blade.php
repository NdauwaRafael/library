@extends('layouts.default')
@section('content')
    <div class="lib_form">
        {!! Form::open(['route' => ['create.user'],'files' => 'true']) !!}
        {!! Form::hidden('created_by', auth()->id())!!}
        <add-subject inline-template>
            <div>
                <label>Subject Name
                    <el-input placeholder="Subject Name"  name="name" value="{{old('name')}}" required></el-input>
                </label>
            </div>
        </add-subject>
        {!! Form::submit('Save', ['class' => 'button']) !!}
        {!! Form::close() !!}

    </div>
@endsection
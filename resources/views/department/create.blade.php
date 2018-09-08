@extends('layouts.default')
@section('content')
    <div class="lib_form">
        {!! Form::open(['route' => ['create.user'],'files' => 'true']) !!}
        {!! Form::hidden('created_by', auth()->id())!!}
        <aadd-department inline-template>
            <div>
                <label>Department Name
                    <el-input placeholder="Department Name"  name="name" value="{{old('name')}}" required></el-input>
                </label>
            </div>
        </aadd-department>
        {!! Form::submit('Save', ['class' => 'button']) !!}
        {!! Form::close() !!}

    </div>

@endsection
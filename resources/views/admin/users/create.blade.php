@extends('layouts.default')
@section('content')
 <div class="users__add">
     {!! Form::open(['route' => ['create.user'],'files' => 'true']) !!}
     <div class="small-12 large-5 cell">
         {!! Form::hidden('created_by', auth()->id())!!}
     </div>
     <create-user :roles="{{ $roles }}" :departments="{{ $departments }}" inline-template>
         <div>
             <label>Username
                 <el-input placeholder="username"  name="username" value="{{old('username')}}" required></el-input>
             </label>

             <label>First Name
                 <el-input placeholder="First Name"  name="firstname" value="{{old('firstname')}}" required></el-input>
             </label>
             <label>Last Name
                 <el-input placeholder="Last Name"  name="lastname" value="{{old('lastname')}}" required></el-input>
             </label>
             <label>Email
                 <el-input  type="email" placeholder="Email"  name="email" value="{{old('email')}}" required></el-input>
             </label>
             <label>Department
                 <select name="department_id" required>
                     <option value="" label="Select Department" disabled selected></option>
                     <option v-for="department in departments"
                             :label="department.label"
                             :value="department.value"></option>
                 </select>
             </label>
             <label>Password
                 <el-input  type="password" placeholder="Password"  name="password" value="{{old('password')}}" required></el-input>
             </label>
             {{--<label>Role--}}
                 {{--<select name="role_id" required>--}}
                     {{--<option value="" label="Select A Role" disabled selected></option>--}}
                     {{--<option v-for="role in roles"--}}
                             {{--:label="role.label"--}}
                             {{--:value="role.value"></option>--}}
                 {{--</select>--}}
             {{--</label>--}}
         </div>
     </create-user>
     <div class="small-12 large-2 cell">
         {!! Form::submit('Save', ['class' => 'button']) !!}
     </div>
     {!! Form::close() !!}
 </div>
@endsection

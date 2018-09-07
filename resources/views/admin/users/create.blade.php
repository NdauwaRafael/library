@extends('layouts.default')
@section('content')
 <div>
     {!! Form::open(['route' => ['create.user'],'files' => 'true']) !!}
     <div class="small-12 large-5 cell">
         {!! Form::hidden('created_by', auth()->id())!!}
     </div>
     <create-user :roles="{{ $roles }}" :departments="{{ $departments }}" inline-template>
         <div>
             <label>Username
                 <el-input placeholder="username"  name="username"></el-input>
             </label>

             <label>First Name
                 <el-input placeholder="First Name"  name="firstname"></el-input>
             </label>
             <label>Last Name
                 <el-input placeholder="Last Name"  name="lastname"></el-input>
             </label>
             <label>Email
                 <el-input  type="email" placeholder="Email"  name="email"  ></el-input>
             </label>
             <label>Department
                 <select name="department_id" >
                     <option value="" label="Select Department" disabled selected></option>
                     <option v-for="department in departments"
                             :label="department.label"
                             :value="department.value"></option>
                 </select>
             </label>
             <label>Role
                 <select name="role_id" >
                     <option value="" label="Select A Role" disabled selected></option>
                     <option v-for="role in roles"
                             :label="role.label"
                             :value="role.value"></option>
                 </select>
             </label>
         </div>
     </create-user>
     <div class="small-12 large-2 cell">
         {!! Form::submit('Save', ['class' => 'button']) !!}
     </div>
     {!! Form::close() !!}
 </div>
@endsection

@extends('layouts.default')
@section('content')
    <section>
        <div>
            <div>
                <div>
                    <div>
                        <div>
                            <h3>Role Permissions</h3>
                        </div>
                        <div></div>
                    </div>
                </div>
                <div>
                    <div>
                        {!! Form::open(['route' => ['roles.permissions', $role->id]]) !!}

                        <p><b>Name:</b> {!! $role->name !!}</p>

                        @foreach($permissions as $permission)
                            <div class="small-12 medium-12 large-12 columns  ">
                                {!! Form::checkbox($permission->id, true, in_array($permission->id, $role_permissions->toArray())) !!}
                                &nbsp;&nbsp; &nbsp;<span>{!! $permission->name !!}</span>
                            </div>
                        @endforeach

                        <div class="small-12 medium-12 large-12 columns ">
                            {!! Form::submit('Submit', ['class' => 'button']) !!}

                            <a href="/roles/show/{!! $role->id !!}" class="button">Cancel</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

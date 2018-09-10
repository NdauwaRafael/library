@extends('layouts.default')
@section('content')
    <section>
        <div>
            <div>
                <div>
                    <div>
                        <div >
                            <h3>Role Permission</h3>
                        </div>
                        <div >
                            <div>
                                <a href="/roles/permissions/{!! $role->id !!}" class="masaba_primary">
                                    Edit Permission
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div >
                    <div >
                        <div>
                            <table>
                                <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Description</td>
                                </tr>
                                </thead>

                                @foreach($role->rolePermissions as $permission)
                                    <tr>
                                        <td>{!! $permission->permission->name!!}</td>
                                        <td>{!! $permission->permission->description !!}</td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


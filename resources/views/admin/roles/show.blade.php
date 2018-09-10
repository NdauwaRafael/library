@extends('layouts.default')
@section('content')
    <section>
        <h3>Role Permission</h3>

        <div class="lib_page">
            <div class="lib_table">
                <div class="lib_table__head">
                    <div class="action">
                        <a href="/roles/permissions/{!! $role->id !!}" class="masaba_primary">
                            Edit Permission
                        </a>
                    </div>
                    <div class="filters"></div>
                    <div>
                        <div >
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lib_table__body">
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
    </section>
@endsection


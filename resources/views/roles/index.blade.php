@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <!-- <h1>Roles</h1> -->
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Role</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($roles->isEmpty())
                <div class="alert alert-info" role="alert">
                    No roles found. Click "Create Role" to add a new role.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Role Name</th>
                                <th scope="col">Permissions</th>
                                <th scope="col">Users</th>
                                
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <!-- dd({{$role->permissions}}) -->
                                    <td>{{ $role->name }}</td>
                                    <td> 
                                        @foreach($role->permissions as $permission)
                                            <span class="badge badge-info">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td> 
                                        @foreach($role->users as $user)
                                            <span class="badge badge-info">{{ $user->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                        <a href="{{ route('roles.assign_permissions', $role->id) }}" class="btn btn-primary btn-sm">Assign Permissions</a>

                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

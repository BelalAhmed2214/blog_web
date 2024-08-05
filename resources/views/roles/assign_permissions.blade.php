@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Assign Permissions to Role: {{ $role->name }}</h1>
            <form action="{{ route('roles.update_permissions', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="permissions">Permissions</label>
                    <select name="permissions[]" class="form-control select2" multiple="multiple" required>
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->name }}" 
                            @if($role->hasPermissionTo($permission->name)) selected @endif>{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update Permissions</button>
            </form>
        </div>
    </div>
</div>

<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection

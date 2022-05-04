@extends('layouts.app')

@section('content')
<div class="container">
    <!-- splash -->
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex flex-column align-items-center">
            <div class="home-title">
                Welcome, {{ $user->name }}
            </div>
            <div class="role-selection d-flex flex-column align-items-center">
                <p class="font-size-2">Select a role to view past assessments, or add a new role.</p>

                <select id="roleSelectList" name="roleSelectList" class="form-select w-75 font-size-1 text-center" onchange="roleSelect()">
                    <option disabled selected>Select a role</option>
                    @foreach ($roleList as $role)
                        <option value="{{ $role->rId }}">{{ $role->role }}</option>
                    @endforeach
                </select>
            </div>
            <button type="button" onclick="window.location.href='{{ route('userRole.create') }}'" class="btn spacer-t-20 font-size-1">New Role</button>
        </div>
    </div>

</div>
@endsection

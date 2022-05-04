@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="page-title">
            Add New Role
        </div>
        <div class="card p-20 col-sm-9">
            <form method="post" enctype="multipart/form-data" action="{{ route('userRole.postCreate') }}">
                @csrf

                <div class="row d-flex align-items-center spacer-b-10">
                    <label class="col-3 form-label font-size-2 text-end">Role:</label>
                    <div class="col-9">
                        <select class="form-select font-size-1" name="inputRoleId" id="inputRoleId" required>
                                <option disabled selected>Select a role</option>
                            @foreach ($roleList as $role)
                                <option value="{{ $role->id }}">{{ $role->role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row d-flex align-items-center spacer-b-10">
                    <label class="col-3 form-label font-size-2 text-end">Start Date:</label>
                    <div class="col-3">
                        <input class="form-control font-size-1" type="date" name="inputStartDate" id="inputStartDate"  required>
                    </div>
                    <label class="col-3 form-label font-size-2 text-end">End Date:</label>
                    <div class="col-3">
                        <input class="form-control font-size-1" type="date" name="inputEndDate" id="inputEndDate">
                    </div>
                </div>

                <div class="row d-flex align-items-center">
                    <label class="col-3 form-label font-size-2 text-end">Approval Date:</label>
                    <div class="col-3">
                        <input class="form-control font-size-1" type="date" name="inputApprovalDate" id="inputApprovalDate">
                    </div>
                    <div class="col-3 offset-3">
                        <button type="submit" class="w-100 btn btn-emphasis font-size-1">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

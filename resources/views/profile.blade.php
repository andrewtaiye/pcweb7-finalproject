@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="page-title">
            {{ $user->name }}
        </div>

        <!-- for profile details -->
        <div class="card p-20 col-xl-10 col-xxl-9">
            <form method="post" enctype="multipart/form-data" action="{{ route('profile.postEdit') }}">
                @csrf
                <div class="register-input">
                    <div class="row justify-center spacer-b-10">
                        <!-- for left side inputs -->
                        <div class="col-sm-8">

                            <div class="row spacer-b-10 align-items-center">
                                <div class="col-sm-4 d-flex justify-content-end">
                                    <label id="label-profile-dob">ID Number:</label>
                                </div>
                                <input class="col-sm-8" type="text" name="inputId" id="inputId" value="{{ $profile->idNumber }}" required/>
                            </div>

                            <div class="row spacer-b-10 align-items-center">
                                <div class="col-sm-4 d-flex justify-content-end">
                                    <label id="label-profile-dob">Date of Birth:</label>
                                </div>
                                <input class="col-sm-8" type="date" name="inputDob" id="inputDob" value="{{ $profile->dateOfBirth }}" required/>
                            </div>

                            <div class="row spacer-b-10 align-items-center">
                                <div class="col-sm-4 d-flex justify-content-end">
                                    <label id="label-profile-dateAccepted">Date Accepted:</label>
                                </div>
                                <input class="col-sm-8" type="date" name="inputDateAccepted" id="inputDateAccepted" value="{{ $profile->dateAccepted }}" required/>
                            </div>

                            <div class="row spacer-b-10 align-items-center">
                                <div class="col-sm-4 d-flex justify-content-end">
                                    <label id="label-profile-reportingDate">Reporting Date:</label>
                                </div>
                                <input class="col-sm-8" type="date" name="inputReportingDate" id="inputReportingDate" value="{{ $profile->reportingDate }}" required/>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-sm-4 d-flex justify-content-end">
                                    <label id="label-profile-lastDay">Last Day:</label>
                                </div>
                                <input class="col-sm-8" type="date" name="inputLastDay" id="inputLastDay" value="{{ $profile->lastDay }}" required/>
                            </div>

                        </div>

                        <!-- for profile picture -->
                        <div class="col-sm-4">
                            <div class="w-75 profilePicture">
                                <input type="file" name="profilePicture" id="profilePicture" onchange="profilePictureDisplay(event)" style="display: none;">
                                <label for="profilePicture" id="labelProfilePictureDisplay" style="cursor: pointer;">
                                    <img src="/storage/{{ $profile->profilePicture }}" id="display-profile-picture"/>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <button type="submit" class="btn spacer-t-20 w-auto font-size-1">Update</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row col-xl-10 col-xxl-9 justify-content-center spacer-t-20">
            @if ($userRoleArray->isEmpty())
                <button type="button" onclick="window.location.href='{{ route('userRole.create') }}'" class="btn btn-emphasis spacer-b-20 w-auto font-size-1">Add New Role</button>
            @endif
            <table class="table table-striped align-middle border" id="tableDisplayRoles">
                <tr>
                    <th class="">Role</th>
                    <th class="w-15">Start Date</th>
                    <th class="w-15">End Date</th>
                    <th class="w-15">Approval Date</th>
                    <th class="w-10 text-center">Edit</th>
                    <th class="w-10 text-center">Delete</th>
                </tr>
                @if ($userRoleArray->isEmpty())
                    <tr>
                        <th colspan="6">
                            <p class="text-center my-0">No roles added</p>
                        </th>
                    </tr>
                @endif

                @foreach ($userRoleArray as $arrayRow)
                    <tr>
                        <td>{{ $arrayRow->role }}</td>
                        <td>{{ $arrayRow->roleStartDate }}</td>
                        <td>{{ $arrayRow->roleEndDate }}</td>
                        <td>{{ $arrayRow->roleApprovalDate }}</td>
                        <td class="text-center"><button type="button" class="btn w-100" onclick="window.location.href='{{ route('userRole.edit', ['roleId' => $arrayRow->rId]) }}'">Edit</button></td>
                        <td class="text-center"><form method="post">@csrf<button type="submit" class="btn w-100" onclick="return confirm('Confirm delete role?')" formaction="{{ route('userRole.delete', ['roleId' => $arrayRow->rId]) }}">Delete</button></form</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

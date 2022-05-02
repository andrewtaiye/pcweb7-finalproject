@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="page-title">
            {{ $user->name }}
        </div>

        <!-- for profile details -->
        <div class="card p-20 col-xl-10 col-xxl-9">
            <form method="post" enctype="multipart/form-data" action="{{ route('profile.postEdit', ['user_id' => $profile->user_id]) }}">
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
                        <button type="submit" class="w-25 d-flex align-items-center justify-content-center btn spacer-t-10">Update</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row col-xl-10 col-xxl-9 justify-content-center spacer-t-20">
            <table class="table table-striped border" id="tableDisplayRoles">
                <tr>
                    <th>Role</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Approval Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <!-- @if ($roleArray == "")
                    There is no rolearray
                @else
                    There is a rolearray
                    {{ $roleArray }}
                @endif -->

                @foreach ($roleArray as $arrayRow)
                    <tr>
                        <td>{{ $arrayRow->role }}</td>
                        <td>{{ $arrayRow->roleStartDate }}</td>
                        <td>{{ $arrayRow->roleEndDate }}</td>
                        <td>{{ $arrayRow->roleApprovalDate }}</td>
                        <td><button type="button" class="btn" onclick="window.location.href='{{ route('role.edit', ['user_id' => $arrayRow->user_id, 'role' => $arrayRow->role]) }}'">Edit</button></td>
                        <td><button type="button" class="btn" onclick="">Delete</button></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

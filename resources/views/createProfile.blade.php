@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="page-title">
            Add Profile Details
        </div>
        <div class="card p-20 col-sm-9">
            <form method="post" enctype="multipart/form-data" action="{{ route('profile.postCreate') }}">
                @csrf
                <div class="register-input">
                    <div class="row justify-center spacer-b-10">
                        <!-- for left side inputs -->
                        <div class="col-sm-8">

                            <div class="row spacer-b-10 align-items-center">
                                <div class="col-sm-4 d-flex justify-content-end">
                                    <label id="label-profile-dob">ID Number:</label>
                                </div>
                                <input class="col-sm-8" type="text" name="inputId" id="inputId" required/>
                            </div>

                            <div class="row spacer-b-10 align-items-center">
                                <div class="col-sm-4 d-flex justify-content-end">
                                    <label id="label-profile-dob">Date of Birth:</label>
                                </div>
                                <input class="col-sm-8" type="date" name="inputDob" id="inputDob" required/>
                            </div>

                            <div class="row spacer-b-10 align-items-center">
                                <div class="col-sm-4 d-flex justify-content-end">
                                    <label id="label-profile-dateAccepted">Date Accepted:</label>
                                </div>
                                <input class="col-sm-8" type="date" name="inputDateAccepted" id="inputDateAccepted" required/>
                            </div>

                            <div class="row spacer-b-10 align-items-center">
                                <div class="col-sm-4 d-flex justify-content-end">
                                    <label id="label-profile-reportingDate">Reporting Date:</label>
                                </div>
                                <input class="col-sm-8" type="date" name="inputReportingDate" id="inputReportingDate" required/>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-sm-4 d-flex justify-content-end">
                                    <label id="label-profile-lastDay">Last Day:</label>
                                </div>
                                <input class="col-sm-8" type="date" name="inputLastDay" id="inputLastDay" required/>
                            </div>

                        </div>

                        <!-- for profile picture -->
                        <div class="col-sm-4">
                            <div id="profilePicturePlaceholder" class="profilePicture outline w-75">
                                <input type="file" name="profilePicture" id="profilePicture" onchange="profilePicturePreview(event)" style="display: none;">
                                <label for="profilePicture" id="labelProfilePicturePreview" style="cursor: pointer;">Upload Image</label>
                            </div>

                        </div>
                    </div>

                    <div class="row justify-center">
                        <button type="submit" class="w-25 font-size-1 btn btn-emphasis spacer-t-10">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="page-title">
            Add New Assessment
        </div>
        <div class="card p-20 row col justify-content-center">
            <form method="post" enctype="multipart/form-data" action="{{ route('assessment.postCreate', ['roleId' => $selectedRole->id]) }}">
                @csrf

                <div class="row d-flex align-items-center spacer-b-10">
                    <label class="col-2 form-label font-size-2 text-end">Role:</label>
                    <div class="col-4">
                        <input class="form-control font-size-1" type="text" name="inputAssessmentRole" id="inputAssessmentRole" value="{{ $selectedRole->role }}" readonly>
                    </div>
                    <label class="col-3 form-label font-size-2 text-end">Assessment No.:</label>
                    <div class="col-3">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentNumber" id="inputAssessmentNumber" autofocus required>
                    </div>
                </div>

                <div class="row d-flex align-items-center spacer-b-10">
                    <label class="col-2 form-label font-size-2 text-end">Instructor:</label>
                    <div class="col-4">
                        <input class="form-control font-size-1" type="text" name="inputAssessmentInstructor" id="inputAssessmentInstructor" autofocus required>
                    </div>
                    <label class="col-3 form-label font-size-2 text-end">Date:</label>
                    <div class="col-3">
                        <input class="form-control font-size-1" type="date" name="inputAssessmentDate" id="inputAssessmentDate" required>
                    </div>
                </div>

                <div class="row d-flex align-items-center spacer-b-10">
                    <label class="col-3 offset-6 form-label font-size-2 text-end">Intensity:</label>
                    <div class="col-3">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentIntensity" id="inputAssessmentIntensity" required>
                    </div>
                </div>

                <div class="row d-flex align-items-center spacer-b-10">
                    <label class="col-2 form-label font-size-2 text-end">Objectives:</label>
                    <div class="col-10">
                        <input class="form-control font-size-1" type="text" name="inputAssessmentObjective1" id="inputAssessmentObjective1" maxlength="500" required>
                    </div>
                </div>

                <div class="row d-flex align-items-center spacer-b-10">
                    <div class="col-10 offset-2">
                        <input class="form-control font-size-1" type="text" name="inputAssessmentObjective2" id="inputAssessmentObjective2" maxlength="500">
                    </div>
                </div>

                <div class="row d-flex align-items-center spacer-b-10">
                    <div class="col-10 offset-2">
                        <input class="form-control font-size-1" type="text" name="inputAssessmentObjective3" id="inputAssessmentObjective3" maxlength="500">
                    </div>
                </div>

                <div class="row d-flex align-items-center spacer-b-10">
                    <label class="col-2 form-label font-size-2 text-end">A:</label>
                    <div class="col-1">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentA" id="inputAssessmentA" min="0" max="10" required>
                    </div>
                    <label class="col-1 form-label font-size-2 text-end">B:</label>
                    <div class="col-1">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentB" id="inputAssessmentB" min="0" max="10" required>
                    </div>
                    <label class="col-1 form-label font-size-2 text-end">C:</label>
                    <div class="col-1">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentC" id="inputAssessmentC" min="0" max="10" required>
                    </div>
                    <label class="col-1 form-label font-size-2 text-end">D:</label>
                    <div class="col-1">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentD" id="inputAssessmentD" min="0" max="10" required>
                    </div>
                    <label class="col-1 form-label font-size-2 text-end">E:</label>
                    <div class="col-1">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentE" id="inputAssessmentE" min="0" max="10" required>
                    </div>
                </div>

                <div class="row d-flex align-items-center spacer-b-10">
                    <label class="col-2 form-label font-size-2 text-end">F:</label>
                    <div class="col-1">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentF" id="inputAssessmentF" min="0" max="10" required>
                    </div>
                    <label class="col-1 form-label font-size-2 text-end">G:</label>
                    <div class="col-1">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentG" id="inputAssessmentG" min="0" max="10" required>
                    </div>
                    <label class="col-1 form-label font-size-2 text-end">H:</label>
                    <div class="col-1">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentH" id="inputAssessmentH" min="0" max="10" required>
                    </div>
                    <label class="col-1 form-label font-size-2 text-end">I:</label>
                    <div class="col-1">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentI" id="inputAssessmentI" min="0" max="10" required>
                    </div>
                    <label class="col-1 form-label font-size-2 text-end">J:</label>
                    <div class="col-1">
                        <input class="form-control font-size-1" type="number" name="inputAssessmentJ" id="inputAssessmentJ" min="0" max="10" required>
                    </div>
                </div>

                <div class="row d-flex align-items-center spacer-b-10">
                    <label class="col-2 form-label font-size-2 text-end">Safety:</label>
                    <div class="col-2 ms-4 form-check form-check-inline">
                        <input class="form-check-input font-size-2" type="radio" name="inputAssessmentSafety" id="inputAssessmentPass" value="1" required>
                        <label class="form-check-label font-size-2" for="inputAssessmentPass">Pass</label>
                    </div>
                    <div class="col-2 form-check form-check-inline">
                        <input class="form-check-input font-size-2" type="radio" name="inputAssessmentSafety" id="inputAssessmentFail" value="0" required>
                        <label class="form-check-label font-size-2" for="inputAssessmentFail">Fail</label>
                    </div>
                </div>

                <div class="row d-flex align-items-center spacer-b-10">
                    <label class="col-2 form-label font-size-2 text-end">Remarks:</label>
                    <div class="col-10">
                        <textarea class="form-control" name="inputAssessmentRemarks" rows="4" maxlength="1000" required></textarea>
                    </div>
                </div>

                <div class="row d-flex justify-content-center spacer-t-20">
                    <div class="col-3">
                        <button type="submit" class="w-100 btn btn-emphasis font-size-1">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

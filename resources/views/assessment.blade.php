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

                <select id="roleSelectList" name="roleSelectList" class="form-select w-75 font-size-1 text-center" onchange="roleChange()">
                    <option disabled selected>{{ $selectedRole->role }}</option>
                    @foreach ($roleList as $role)
                        @if ($role->rId == $selectedRole->id)
                        @else
                            <option value="{{ $role->rId }}">{{ $role->role }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="button" onclick="window.location.href='{{ route('userRole.create') }}'" class="btn spacer-t-20 font-size-1">New Role</button>
        </div>
    </div>

    <!-- assessment table display -->
    <div class="row justify-content-center spacer-t-20">
        <div class="d-flex row py-2 justify-content-between align-items-center border">
            <p id="roleIndicator" class="font-size-1 fw-bold my-0 w-auto">{{ $selectedRole->role }}</p>
            <button type="button" onclick="window.location.href='{{ route('assessment.create', ['roleId' => $selectedRole->id]) }}'" class="btn btn-emphasis w-auto">Add Assessment</button>
        </div>
        <table id="tableDisplayAssessments" class="table table-striped align-middle border border-top-0">
            <tr>
                <th class="w-3 text-center">S/N</th>
                <th class="w-7">Date</th>
                <th class="w-10">Instructor</th>
                <th class="w-3 text-center">A</th>
                <th class="w-3 text-center">B</th>
                <th class="w-3 text-center">C</th>
                <th class="w-3 text-center">D</th>
                <th class="w-3 text-center">E</th>
                <th class="w-3 text-center">F</th>
                <th class="w-3 text-center">G</th>
                <th class="w-3 text-center">H</th>
                <th class="w-3 text-center">I</th>
                <th class="w-3 text-center">J</th>
                <th class="w-5 text-center">Safety</th>
                <th class="w-5 text-center">Grade</th>
                <th>Remarks</th>
                <th class="text-center" width="7.5%">Edit</th>
                <th class="text-center" width="7.5%">Delete</th>
            </tr>
            @if ($assessmentArray->isEmpty())
                <tr>
                    <th colspan="18">
                        <p class="text-center my-0">No assessments recorded</p>
                    </th>
                </tr>
            @endif

            @foreach ($assessmentArray as $arrayRow)
                <tr>
                    <td class="text-center">{{ $arrayRow->assessmentNumber }}</td>
                    <td>{{ $arrayRow->assessmentDate }}</td>
                    <td>{{ $arrayRow->instructor }}</td>
                    <td class="text-center">{{ $arrayRow->a }}</td>
                    <td class="text-center">{{ $arrayRow->b }}</td>
                    <td class="text-center">{{ $arrayRow->c }}</td>
                    <td class="text-center">{{ $arrayRow->d }}</td>
                    <td class="text-center">{{ $arrayRow->e }}</td>
                    <td class="text-center">{{ $arrayRow->f }}</td>
                    <td class="text-center">{{ $arrayRow->g }}</td>
                    <td class="text-center">{{ $arrayRow->h }}</td>
                    <td class="text-center">{{ $arrayRow->i }}</td>
                    <td class="text-center">{{ $arrayRow->j }}</td>
                    <td class="text-center">
                        @if ($arrayRow->assessmentSafety == 1)
                            Pass
                        @else
                            Fail
                        @endif
                    </td>
                    <td class="text-center">{{ $arrayRow->assessmentGrade }}</td>
                    <td>{{ $arrayRow->assessmentRemarks }}</td>
                    <td class="text-center"><button type="button" class="btn w-100" onclick="window.location.href='{{ route('assessment.edit', ['roleId' => $selectedRole->id, 'assessmentId' => $arrayRow->assessmentNumber]) }}'">Edit</button></td>
                    <td class="text-center"><form method="post">@csrf<button type="submit" class="btn w-100" onclick="return confirm('Confirm delete assessment?')" formaction="{{ route('assessment.delete', ['roleId' => $selectedRole->id, 'assessmentId' => $arrayRow->assessmentNumber]) }}">Delete</button></form</td>
                </tr>
            @endforeach

        </table>
    </div>

</div>
@endsection

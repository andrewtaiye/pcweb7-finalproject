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
                    <option disabled selected>{{ $selectedRole }}</option>
                    @foreach ($roleList as $role)
                        @if ($role == $selectedRole)
                        @else
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="button" onclick="window.location.href='{{ route('role.create') }}'" class="btn spacer-t-20 font-size-1">New Role</button>
        </div>
    </div>

    <!-- assessment table display -->
    <div class="row justify-content-center spacer-t-20">
        <div class="d-flex row py-2 justify-content-between align-items-center border">
            <p id="roleIndicator" class="font-size-1 fw-bold my-0 w-auto">{{ $selectedRole }}</p>
            <button type="button" onclick="window.location.href='{{ route('assessment.create', ['role' => $selectedRole]) }}'" class="btn btn-emphasis w-auto">Add Assessment</button>
        </div>
        <table id="tableDisplayAssessments" class="table table-striped border border-top-0">
            <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Instructor</th>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>D</th>
                <th>E</th>
                <th>F</th>
                <th>G</th>
                <th>H</th>
                <th>I</th>
                <th>J</th>
                <th>Safety</th>
                <th>Grade</th>
                <th>Remarks</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            @foreach ($assessmentArray as $arrayRow)
                <tr>
                    <td>{{ $arrayRow->assessmentNumber }}</td>
                    <td>{{ $arrayRow->assessmentDate }}</td>
                    <td>{{ $arrayRow->instructor }}</td>
                    <td>{{ $arrayRow->a }}</td>
                    <td>{{ $arrayRow->b }}</td>
                    <td>{{ $arrayRow->c }}</td>
                    <td>{{ $arrayRow->d }}</td>
                    <td>{{ $arrayRow->e }}</td>
                    <td>{{ $arrayRow->f }}</td>
                    <td>{{ $arrayRow->g }}</td>
                    <td>{{ $arrayRow->h }}</td>
                    <td>{{ $arrayRow->i }}</td>
                    <td>{{ $arrayRow->j }}</td>
                    <td>
                        @if ($arrayRow->assessmentSafety = 1)
                            Pass
                        @else
                            Fail
                        @endif
                    </td>
                    <td>Grade</td>
                    <td>{{ $arrayRow->assessmentRemarks }}</td>
                    <td><button type="button" class="btn" onclick="window.location.href='{{ route('role.edit', ['user_id' => $arrayRow->user_id, 'role' => $arrayRow->role]) }}'">Edit</button></td>
                    <td><button type="button" class="btn" onclick="">Delete</button></td>
                </tr>
            @endforeach
            <tr>
                <td>1</td>
                <td>00/00/0000</td>
                <td>john doe</td>
                <td>10</td>
                <td>10</td>
                <td>10</td>
                <td>10</td>
                <td>10</td>
                <td>10</td>
                <td>10</td>
                <td>10</td>
                <td>10</td>
                <td>10</td>
                <td>Pass</td>
                <td>100</td>
                <td>loren ipsum</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </table>
    </div>

</div>
@endsection

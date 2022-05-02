@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <!-- profile title -->
        <div class="page-title">
            /{/{ /$user->fullName /}/}
        </div>

        <!-- profile details -->
        <div class="card">
            <form method="post" enctype="multipart/form-data" action="{{ route('register') }}">
                @csrf
                <div class="landing-input">
                    <div class="row">
                        <!-- profile details -->
                        <div>
                            <div>
                                <label>Username:</label>
                                <input type="text" name="updateUsername" id="updateUsername" autofocus required>
                            </div>
                            <div>
                                <label>Full Name:</label>
                                <input type="text" name="updateFullName" id="updateFullName" required>
                            </div>
                            <div>
                                <label>Date of Birth:</label>
                                <input type="date" name="updateDob" id="updateDob" required>
                            </div>
                            <div>
                                <label>ID Number:</label>
                                <input type="text" name="updateId" id="updateId" required>
                            </div>
                            <div>
                                <label>Date Accepted:</label>
                                <input type="date" name="updateDateAccepted" id="updateDateAccepted" required>
                            </div>
                            <div>
                                <label>Reporting Date:</label>
                                <input type="date" name="updateReportingDate" id="updateReportingDate" required>
                            </div>
                            <div>
                                <label>Last Day:</label>
                                <input type="date" name="updateLastDay" id="updateLastDay" required>
                            </div>
                            <hr>
                            <div>
                                <label>Password:</label>
                                <input type="password" name="updatePassword" id="updatePassword" required>
                            </div>
                            <div>
                                <label>Re-Enter Password:</label>
                                <input type="password" name="updatePasswordConfirm" id="updatePasswordconfirm" required>
                            </div>
                        </div>

                        <!-- profile picture and update button -->
                        <div>
                            <div class="outline">
                                <input type="file" name="profilePicture" id="profilePicture" onchange="loadProfilePicture(event)" style="display: none;">
                                <label for="profilePicture" id="labelProfilePicture" style="cursor: pointer;">Upload Image</label>
                            </div>

                            <div>
                                <button>Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- role table -->
        <div class="row justify-content-center displayRoles">
            <table class="tables" id="tableDisplayAssessments">
                <tr>
                    <th>S/N</th>
                    <th>Role</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Approval Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Role 1</td>
                    <td>00/00/0000</td>
                    <td>00/00/0000</td>
                    <td>00/00/0000</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </table>
        </div>

        <!-- delete user button -->
        <button>Delete User</button>
    </div>
</div>
@endsection

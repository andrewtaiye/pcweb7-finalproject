<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assessment;
use App\Models\Profile;
use App\Models\Role;
use App\Models\UserRole;

class AssessmentController extends Controller
{
    public function create($roleId) {
        $selectedRole = Role::where('id', $roleId)->first();

        return view('addAssessment', [
            'selectedRole' => $selectedRole,
        ]);
    }

    public function postCreate($roleId) {
        $data = request()->validate([
            'inputAssessmentNumber' => ['required'],
            'inputAssessmentInstructor' => ['required'],
            'inputAssessmentDate' => ['required'],
            'inputAssessmentIntensity' => ['required'],
            'inputAssessmentObjective1' => ['required'],
            'inputAssessmentA' => ['required'],
            'inputAssessmentB' => ['required'],
            'inputAssessmentC' => ['required'],
            'inputAssessmentD' => ['required'],
            'inputAssessmentE' => ['required'],
            'inputAssessmentF' => ['required'],
            'inputAssessmentG' => ['required'],
            'inputAssessmentH' => ['required'],
            'inputAssessmentI' => ['required'],
            'inputAssessmentJ' => ['required'],
            'inputAssessmentSafety' => ['required'],
            'inputAssessmentRemarks' => ['required'],
        ]);

        $user = Auth::user();
        $userRoleId = UserRole::where([['userId', $user->id], ['roleId', $roleId]])->pluck('id')->first();
        $grade = request('inputAssessmentA') + request('inputAssessmentB') + request('inputAssessmentC') + request('inputAssessmentD') + request('inputAssessmentE') + request('inputAssessmentF') + request('inputAssessmentG') + request('inputAssessmentH') + request('inputAssessmentI') + request('inputAssessmentJ');

        $assessment = new Assessment();
        $assessment->userRoleId = $userRoleId;
        $assessment->assessmentNumber = request('inputAssessmentNumber');
        $assessment->instructor = request('inputAssessmentInstructor');
        $assessment->assessmentDate = request('inputAssessmentDate');
        $assessment->assessmentIntensity = request('inputAssessmentIntensity');
        $assessment->assessmentObjective1 = request('inputAssessmentObjective1');
        $assessment->assessmentObjective2 = request('inputAssessmentObjective2');
        $assessment->assessmentObjective3 = request('inputAssessmentObjective3');
        $assessment->a = request('inputAssessmentA');
        $assessment->b = request('inputAssessmentB');
        $assessment->c = request('inputAssessmentC');
        $assessment->d = request('inputAssessmentD');
        $assessment->e = request('inputAssessmentE');
        $assessment->f = request('inputAssessmentF');
        $assessment->g = request('inputAssessmentG');
        $assessment->h = request('inputAssessmentH');
        $assessment->i = request('inputAssessmentI');
        $assessment->j = request('inputAssessmentJ');
        $assessment->assessmentSafety = request('inputAssessmentSafety');
        $assessment->assessmentGrade = $grade;
        $assessment->assessmentRemarks = request('inputAssessmentRemarks');

        $saved = $assessment->save();
        if ($saved) {
            return redirect()->route('roleSelect', ['roleId' => $roleId]);
        }
    }

    public function edit($roleId, $assessmentId) {
        $user = Auth::user();
        $userRoleId = UserRole::where([['userId', $user->id], ['roleId', $roleId]])->pluck('id')->first();
        $selectedRole = Role::where('id', $roleId)->first();
        $selectedAssessment = Assessment::where([['userRoleId', $userRoleId], ['assessmentNumber', $assessmentId]])->first();
        // dd($selectedAssessment, $selectedRole);

        return view('editAssessment', [
            'selectedRole' => $selectedRole,
            'selectedAssessment' => $selectedAssessment,
        ]);
    }

    public function postEdit($roleId, $assessmentId) {
        $data = request()->validate([
            'inputAssessmentNumber' => ['required'],
            'inputAssessmentInstructor' => ['required'],
            'inputAssessmentDate' => ['required'],
            'inputAssessmentIntensity' => ['required'],
            'inputAssessmentObjective1' => ['required'],
            'inputAssessmentA' => ['required'],
            'inputAssessmentB' => ['required'],
            'inputAssessmentC' => ['required'],
            'inputAssessmentD' => ['required'],
            'inputAssessmentE' => ['required'],
            'inputAssessmentF' => ['required'],
            'inputAssessmentG' => ['required'],
            'inputAssessmentH' => ['required'],
            'inputAssessmentI' => ['required'],
            'inputAssessmentJ' => ['required'],
            'inputAssessmentSafety' => ['required'],
            'inputAssessmentRemarks' => ['required'],
        ]);

        $user = Auth::user();
        $userRoleId = UserRole::where([['userId', $user->id], ['roleId', $roleId]])->pluck('id')->first();
        $grade = request('inputAssessmentA') + request('inputAssessmentB') + request('inputAssessmentC') + request('inputAssessmentD') + request('inputAssessmentE') + request('inputAssessmentF') + request('inputAssessmentG') + request('inputAssessmentH') + request('inputAssessmentI') + request('inputAssessmentJ');
        $assessment = Assessment::where([['userRoleId', $userRoleId], ['assessmentNumber', $assessmentId]])->first();

        if (empty($assessment)) {
            $assessment = new Assessment();
            $assessment->userRoleId = $userRoleId;
        }

        $assessment->assessmentNumber = request('inputAssessmentNumber');
        $assessment->instructor = request('inputAssessmentInstructor');
        $assessment->assessmentDate = request('inputAssessmentDate');
        $assessment->assessmentIntensity = request('inputAssessmentIntensity');
        $assessment->assessmentObjective1 = request('inputAssessmentObjective1');
        $assessment->assessmentObjective2 = request('inputAssessmentObjective2');
        $assessment->assessmentObjective3 = request('inputAssessmentObjective3');
        $assessment->a = request('inputAssessmentA');
        $assessment->b = request('inputAssessmentB');
        $assessment->c = request('inputAssessmentC');
        $assessment->d = request('inputAssessmentD');
        $assessment->e = request('inputAssessmentE');
        $assessment->f = request('inputAssessmentF');
        $assessment->g = request('inputAssessmentG');
        $assessment->h = request('inputAssessmentH');
        $assessment->i = request('inputAssessmentI');
        $assessment->j = request('inputAssessmentJ');
        $assessment->assessmentSafety = request('inputAssessmentSafety');
        $assessment->assessmentGrade = $grade;
        $assessment->assessmentRemarks = request('inputAssessmentRemarks');

        $updated = $assessment->save();
        if ($updated) {
            return redirect()->route('roleSelect', ['roleId' => $roleId]);
        }
    }

    public function delete($roleId, $assessmentId) {
        $user = Auth::user();
        $userRoleId = UserRole::where([['userId', $user->id], ['roleId', $roleId]])->pluck('id')->first();
        $assessment = Assessment::where([['userRoleId', $userRoleId], ['assessmentNumber', $assessmentId]])->first();

        $delete = $assessment->delete();
        if ($delete) {
          return redirect()->route('roleSelect', ['roleId' => $roleId]);
        }
    }
}

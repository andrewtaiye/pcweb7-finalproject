<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assessment;
use App\Models\Role;

class AssessmentController extends Controller
{
    public function create($role) {
        return view('addAssessment', [
            'role' => $role,
        ]);
    }

    public function postCreate($role) {
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

        $assessment = new Assessment();
        $assessment->user_id = $user->id;
        $assessment->role = $role;
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
        $assessment->assessmentRemarks = request('inputAssessmentRemarks');

        $saved = $assessment->save();
        if ($saved) {

            return redirect('/home');
        }
    }

    public function postEdit($user_id, $role, $assessment) {

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use App\Models\Role;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $roleArray = Role::where('user_id', $user->id)->orderby('role', 'asc')->get();
        
        return view('profile', [
            'user' => $user,
            'profile' => $profile,
            'roleArray' => $roleArray,
        ]);
    }

    public function create() {
        return view('createProfile');
    }

    public function postCreate() {
        $data = request()->validate([
            'inputDob' => ['required'],
            'inputId' => ['required'],
            'inputDateAccepted' => ['required'],
            'inputReportingDate' => ['required'],
            'inputLastDay' => ['required'],
            'profilePicture' => ['required', 'image'],
        ]);

        $imagePath = request('profilePicture')->store('profilePictures', 'public');

        $user = Auth::user();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->fullName = $user->name;
        $profile->dateOfBirth = request('inputDob');
        $profile->idNumber = request('inputId');
        $profile->dateAccepted = request('inputDateAccepted');
        $profile->reportingDate = request('inputReportingDate');
        $profile->lastDay = request('inputLastDay');
        $profile->profilePicture = $imagePath;
        $saved = $profile->save();

        if ($saved) {
            return redirect('/profile');
        }

    }

    public function postEdit($user_id) {
        $data = request()->validate([
            'inputDob' => ['required'],
            'inputId' => ['required'],
            'inputDateAccepted' => ['required'],
            'inputReportingDate' => ['required'],
            'inputLastDay' => ['required'],
            'profilePicture' => ['image'],
        ]);

        $user = Auth::user();
        $profile = Profile::where('user_id', $user_id)->first();

        if(empty($profile)) {
            $profile = new Profile();
            $profile->user_id = $user_id;
            $profile->fullName = $user->name;
        }

        $profile->dateOfBirth = request('inputDob');
        $profile->idNumber = request('inputId');
        $profile->dateAccepted = request('inputDateAccepted');
        $profile->reportingDate = request('inputReportingDate');
        $profile->lastDay = request('inputLastDay');

        if (request()->has('profilePicture')) {
            $imagePath = request('profilePicture')->store('profilePictures', 'public');
            $profile->profilePicture = $imagePath;
        }

        $updated = $profile->save();

        if ($updated) {
            return redirect('/profile');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use App\Models\UserRole;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        $profile = Profile::where('userId', $user->id)->first();
        $userRoleArray = UserRole::leftJoin('roles', 'roleId', '=', 'roles.id')->select('userRoles.*', 'roles.id as rId', 'roles.role')->where('userId', $user->id)->orderby('roleId', 'asc')->get();

        return view('profile', [
            'user' => $user,
            'profile' => $profile,
            'userRoleArray' => $userRoleArray,
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
        $profile->userId = $user->id;
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

    public function postEdit() {
        $data = request()->validate([
            'inputDob' => ['required'],
            'inputId' => ['required'],
            'inputDateAccepted' => ['required'],
            'inputReportingDate' => ['required'],
            'inputLastDay' => ['required'],
            'profilePicture' => ['image'],
        ]);

        $user = Auth::user();
        $profile = Profile::where('userId', $user->id)->first();

        if(empty($profile)) {
            $profile = new Profile();
            $profile->userId = $user->id;
            $profile->fullName = $user->name;
        }

        $profile->dateOfBirth = request('inputDob');
        $profile->idNumber = request('inputId');
        $profile->dateAccepted = request('inputDateAccepted');
        $profile->reportingDate = request('inputReportingDate');
        $profile->lastDay = request('inputLastDay');

        if (request()->has('profilePicture')) {
            $file = '/public/' . $profile->profilePicture;
            Storage::delete($file);
            $imagePath = request('profilePicture')->store('profilePictures', 'public');
            $profile->profilePicture = $imagePath;
        }

        $updated = $profile->save();

        if ($updated) {
            return redirect('/profile');
        }
    }
}

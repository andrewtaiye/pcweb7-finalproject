<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assessment;
use App\Models\Profile;
use App\Models\Role;
use App\Models\UserRole;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $profile = Profile::where('userId', $user->id)->first();
        $roleList = UserRole::leftJoin('roles', 'roleId', '=', 'roles.id')->select('userroles.*', 'roles.id as rId', 'roles.role')->where('userId', $user->id)->orderby('roleId', 'asc')->get();
        
        return view('home', [
            'user' => $user,
            'profile' => $profile,
            'roleList' => $roleList,
        ]);
    }

    public function roleSelect($roleId) {
        $user = Auth::user();
        $profile = Profile::where('userId', $user->id)->first();
        $roleList = UserRole::leftJoin('roles', 'roleId', '=', 'roles.id')->select('userroles.*', 'roles.id as rId', 'roles.role')->where('userId', $user->id)->orderby('roleId', 'asc')->get();
        $userRoleId = UserRole::where([['userId', $user->id], ['roleId', $roleId]])->pluck('id');
        $assessmentArray = Assessment::where('userRoleId', $userRoleId)->orderby('assessmentNumber', 'desc')->get();
        $selectedRole = Role::where('id', $roleId)->first();

        return view('assessment', [
            'user' => $user,
            'profile' => $profile,
            'roleList' => $roleList,
            'assessmentArray' => $assessmentArray,
            'selectedRole' => $selectedRole,
        ]);
    }
}

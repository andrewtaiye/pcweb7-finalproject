<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Assessment;

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
        $profile = Profile::where('user_id', $user->id)->first();
        $roleList = Role::where('user_id', $user->id)->orderby('role', 'asc')->pluck('role');

        return view('home', [
            'user' => $user,
            'profile' => $profile,
            'roleList' => $roleList,
        ]);
    }

    public function roleSelect($role) {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $roleList = Role::where('user_id', $user->id)->orderby('role', 'asc')->pluck('role');
        $assessmentArray = Assessment::where([['user_id', $user->id], ['role', $role]])->orderby('role', 'asc')->get();

        return view('assessment', [
            'user' => $user,
            'profile' => $profile,
            'roleList' => $roleList,
            'assessmentArray' => $assessmentArray,
            'selectedRole' => $role,
        ]);
    }
}

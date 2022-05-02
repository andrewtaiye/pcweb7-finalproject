<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Assessment;
use App\Models\Role;

class RoleController extends Controller
{
    public function create() {
        return view('addRole');
    }

    public function postCreate() {
        $data = request()->validate([
            'inputRole' => ['required'],
            'inputStartDate' => ['required'],
        ]);

        $user = Auth::user();
        $role = new Role();
        $role->user_id = $user->id;
        $role->role = request('inputRole');
        $role->roleStartDate = request('inputStartDate');
        $role->roleEndDate = request('inputEndDate');
        $role->roleApprovalDate = request('inputApprovalDate');

        $saved = $role->save();

        if ($saved) {
            return redirect('/home');
        }
    }

    public function edit($user_id, $role) {
        $user = Auth::user();
        $role = Role::where([['user_id', $user->id], ['role', $role]])->first();

        return view('editRole', [
            'user' => $user,
            'role' => $role,
        ]);
    }

    public function postEdit($user_id, $oldRole) {
        $data = request()->validate([
            'inputRole' => ['required'],
            'inputStartDate' => ['required'],
        ]);
        $user = Auth::user();
        $role = Role::where([['user_id', $user->id], ['role', $oldRole]])->first();

        if (empty($role)) {
            $role = new Role();
            $role->user_id = $user->id;
        }

        $role->role = request('inputRole');
        $role->roleStartDate = request('inputStartDate');
        $role->roleEndDate = request('inputEndDate');
        $role->roleApprovalDate = request('inputApprovalDate');

        $updated = $role->save();

        // dd($role, $updated);
        if ($updated) {
            return redirect('/profile');
        }

    }
}

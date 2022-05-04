<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Assessment;
use App\Models\Role;
use App\Models\UserRole;

class UserRoleController extends Controller
{
    public function create() {
        $roleList = Role::select()->get();

        return view('addUserRole', [
            'roleList' => $roleList,
        ]);
    }

    public function postCreate() {
        $data = request()->validate([
            'inputRoleId' => ['required'],
            'inputStartDate' => ['required'],
        ]);

        $user = Auth::user();
        $userRole = new UserRole();
        $userRole->userId = $user->id;
        $userRole->roleId = request('inputRoleId');
        $userRole->roleStartDate = request('inputStartDate');
        $userRole->roleEndDate = request('inputEndDate');
        $userRole->roleApprovalDate = request('inputApprovalDate');

        $saved = $userRole->save();

        if ($saved) {
            return redirect()->route('roleSelect', ['roleId' => request('inputRoleId')]);
        }
    }

    public function edit($roleId) {
        $user = Auth::user();
        $userRole = UserRole::leftJoin('roles', 'roleId', '=', 'roles.id')->select('userroles.*', 'roles.id as rId', 'roles.role')->where([['userId', $user->id], ['roleId', $roleId]])->first();
        $roleList = Role::select()->get();
        // dd($userRole, $roleList);
        return view('editUserRole', [
            'user' => $user,
            'userRole' => $userRole,
            'roleList' => $roleList,
        ]);
    }

    public function postEdit($roleId) {
        $data = request()->validate([
            'inputRoleId' => ['required'],
            'inputStartDate' => ['required'],
        ]);
        $user = Auth::user();
        $userRole = UserRole::where([['userId', $user->id], ['roleId', $roleId]])->first();

        if (empty($userRole)) {
            $userRole = new UserRole();
            $userRole->userId = $user->id;
        }

        $userRole->roleId = request('inputRoleId');
        $userRole->roleStartDate = request('inputStartDate');
        $userRole->roleEndDate = request('inputEndDate');
        $userRole->roleApprovalDate = request('inputApprovalDate');

        $updated = $userRole->save();

        if ($updated) {
            return redirect('/profile');
        }
    }

    public function delete($roleId) {
        $user = Auth::user();
        $userRole = UserRole::where([['userId', $user->id], ['roleId', $roleId]])->first();

        $delete = $userRole->delete();
        if ($delete) {

          return redirect('/profile');
        }
    }
}

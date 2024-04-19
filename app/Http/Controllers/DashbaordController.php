<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User; // Make sure to import the User model

class DashbaordController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        $adminCount = $this->getUserCount('admin');
        $teacherCount = $this->getUserCount('teacher');
        $studentCount = $this->getUserCount('student');
        $parentCount = $this->getUserCount('parent');
        $userRegistrations = $this->getUserRegistrations();

        $data['adminCount'] = $adminCount;
        $data['teacherCount'] = $teacherCount;
        $data['studentCount'] = $studentCount;
        $data['parentCount'] = $parentCount;
        $data['userRegistrations'] = $userRegistrations;

        if (Auth::user()->user_type == 1) {
            return view('admin.dashboard', $data);
        } elseif (Auth::user()->user_type == 2) {
            return view('teacher.dashboard', $data);
        } elseif (Auth::user()->user_type == 3) {
            return view('student.dashboard', $data);
        } elseif (Auth::user()->user_type == 4) {
            return view('parent.dashboard', $data);
        }
    }

    private function getUserCount($role)
    {
        return User::where('user_type', $role)->count();
    }

    private function getUserRegistrations()
    {
        return User::where('user_type', '!=', 4)->count();
    }
}

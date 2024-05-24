<?php

namespace App\Http\Controllers;

use App\Models\UsersStudent;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function updateAccountsStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|in:0,1', // Ensure the status value is either 0 or 1
        ]);

        $status = $request->input('status');

        UsersStudent::query()->update(['status' => $status]);

        $response = response()->json(['success' => false, 'message' => 'All accounts have been updated.']);

        // Add a script to refresh the page after a short delay
        $response->withHeaders([
            'Refresh' => '3;url=' . url()->current() // Refresh after 3 seconds
        ]);

        return $response;
    }

}

<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Anonymous;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function user() {
        $users = User::paginate(20);
        return view ('admin.users', ['users' => $users]);
    }   

    function anonymous() {
        $anonymouses = Anonymous::paginate(20);
        return view ('admin.anonymous', ['anonymouses' => $anonymouses]);
    }
}

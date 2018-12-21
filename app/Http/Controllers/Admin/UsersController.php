<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(50);

        return view('admin.users')->with([
            'page_title' => 'Utilisateurs',
            'users' => $users,
        ]);
    }
}

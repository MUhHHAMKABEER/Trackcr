<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
{
    $users = User::all(); // or paginate(10)
    return view('admin.user.index', compact('users'));
}
}

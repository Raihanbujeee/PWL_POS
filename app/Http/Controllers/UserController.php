<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
public function index()
{
    $user = UserModel::create([
        'username' => 'manager88',
        'nama' => 'Manager88',
        'password' => Hash::make('12345'),
        'level_id' => 2,
    ]);

    $user->username = 'manager90';

    $user->save();

    dd($user->wasChanged(['nama', 'username']));
}
}

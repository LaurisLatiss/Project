<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    function deleteUser($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect('/')->with('status', 'Lietotājs dzēsts');
    }
}

<?php

namespace App\Http\Controllers\Auth;
 
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

 
class UpdatePasswordController extends Controller
{
    /*
     * Ensure the user is signed in to access this page
     */
    public function __construct() {
 
        $this->middleware('auth');
 
    }
    /**
     * Show the form to change the user password.
     */
    public function index(){
        if(Auth::user()->banned){
      return redirect()->route('banned');
}
        return view('user.change-password');
    }
 
    /**
     * Update the password for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        if(Auth::user()->banned){
      return redirect()->route('banned');
}
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
 
        $user = User::find(Auth::id());
        $hashedPassword = $user->password;
 
        if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
 
            return redirect('/home')->with('status', 'Parole tika veiksmīgi nomainīta.');

        }
 
        return redirect('/home')->with('failure', 'Paroli neizdevās nomainīt.');
 
 
    }
}
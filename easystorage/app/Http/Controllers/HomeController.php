<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->banned){
            return redirect()->route('banned');
    }
        if(auth()->user()->admin){
            $items = Item::all();
        }else{
            $items = Item::where('owner', Auth::user()->id)->get();
        }

    $users = User::get();
   
    $users = User::get();
    $isMaintance = false;
    foreach ($users as $user){

            if($user->maintaince_mode == true) {
                
                $isMaintance = true;
               
            }
        }

    return view('home')
        ->with('users', $users)
        ->with('items', $items)
        ->with('isMaintance', $isMaintance);
    }


    public function changeEmail(Request $request){
            $user = Auth::user();
            $user->email = $request->email; 
            $user->save();

            return redirect()->back();
    }

    public function maintanceModeOn(){
        $users = User::get();
        foreach ($users as $user){
            if(!$user->admin){
                $user->maintaince_mode = true;
                $user->save();
                return redirect()->back();
            }
        }
    }

    public function maintanceModeOff(){
        $users = User::get();
        foreach ($users as $user){
            if(!$user->admin){
                $user->maintaince_mode = false;
                $user->save();
                return redirect()->back();
            }
        }
    }

    public function maintaince_mode (){
        $users = User::get();
       foreach ($users as $user){
            if(!$user->maintaince_mode ){
                return false;
            }
        }
    }

    function deleteUser($item_id)
    {
        $item = Item::find($item_id);
        if (!isset($item->id)) return back()->withErrors(['Inventārs netika atrasts']);
        $item->delete();
        return redirect('/home#inventārs')->with('status', 'Inventārs dzēsts');
    }

}
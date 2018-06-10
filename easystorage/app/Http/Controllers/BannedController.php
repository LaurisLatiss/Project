<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class BannedController extends Controller
{
    public function index()    
    {
    	if(!Auth::user()->banned){
    		return redirect()->route('home');
    	}
    return view('banned');
    }

    public function banUser($user_id){
    	if(Auth::user()->admin){
    		if($user_id == Auth::user()->id){
    			return redirect()->route('home');
    		}
    		$bannedUser = User::where('id', $user_id)->first();
    		$bannedUser->banned = true;
    		$bannedUser->save();
    		return redirect()->back();
    	}else{
    		return redirect()->back();
    	}
    }

    public function unbanUser($user_id){
    	if(Auth::user()->admin){
    		$bannedUser = User::where('id', $user_id)->first();
    		$bannedUser->banned = false;
    		$bannedUser->save();
    		return redirect()->back();
    	}else{
    		return redirect()->back();
    	}
    }
}
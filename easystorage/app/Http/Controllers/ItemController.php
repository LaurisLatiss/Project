<?php

namespace App\Http\Controllers;

use App\Item;
use Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function storeItem(Request $request)
    {
        $request->validate([
            'manufacturer' => 'required',
            'name' => 'required',
            'category' => 'required',
            'count' => 'required',
            'code' => 'required',
        ]);


        $data = [
            'user_id'           => Auth::user()->id,
            'manufacturer'    => $request->input('manufacturer'),
            'name'              => $request->input('name'),
            'category'        => $request->input('category'),
            'count'            => $request->input('count'),
            'code'            => $request->input('code')
        ];

        Item::create($data);

        return redirect('/home#inventārs')->with('status', 'Inventārs saglabāts.');
    }
    
    public function updateItem(Request $req, $item_id)
    {

        $item = Item::find($item_id);
        if (!isset($item->id)) return back()->withErrors(['Inventārs netika atrasts.'])->withInput();
        $item->user_id = \Auth::id();
        $item->manufacturer = $req->input('manufacturer');
        $item->name = $req->input('name');
        $item->category = $req->input('category');
        $item->count = $req->input('count');
        $item->code = $req->input('code');

        $item->save();

        return redirect('/home#inventārs')->with('status', 'Inventāra izmaiņas saglabātas.');
    }

    function deleteItem($item_id)
    {
        $item = Item::find($item_id);
        if (!isset($item->id)) return back()->withErrors(['Inventārs netika atrasts']);
        $item->delete();
        return redirect('/home#inventārs')->with('status', 'Inventārs dzēsts');
    }

    
}
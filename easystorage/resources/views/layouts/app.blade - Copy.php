<form action="{{ route('update', [$item->id])}}" method="post" role="form" class="form-horizontal">
    {{csrf_field()}}
    <div style="margin-bottom:10px">
        <label class="col-md-4 control-label">Ražotājs</label>

        <div class="col-md-6">
            <input name="manufacturer" type="text" placeholder="Philips, Intel, Dell..." class="form-control" value="{{$item->manufacturer}}">
        </div>
    </div>

    <div style="margin-bottom:10px">
        <label class="col-md-4 control-label">Nosaukums</label>

        <div class="col-md-6">
            <input name="name" type="text" placeholder="Brilliance PDS241..." class="form-control" value="{{$item->name}}">
        </div>
    </div>

    <div style="margin-bottom:10px">
        <label class="col-md-4 control-label">Kategorija</label>

        <div class="col-md-6">
            <select name="category">
                @if ($item->category == 'kancelejas_prece')
                    <option value="kancelejas_prece" selected>Kancelejas prece</option>
                @else
                    <option value="kancelejas_prece">Kancelejas prece</option>
                @endif
                @if ($item->category == 'Datortehnika_un_elektronika')
                <option value="Datortehnika_un_elektronika" selected>Datortehnika un elektronika</option>
                @else
                <option value="Datortehnika_un_elektronika">Datortehnika un elektronika</option>
                @endif
                @if ($item->category == 'biroja_tehnika')
                <option value="biroja_tehnika">Biroja tehnika</option>
                @else
                <option value="biroja_tehnika">Biroja tehnika</option>
                @endif
            </select>
        </div>
    </div>

    <div style="margin-bottom:10px">
        <label class="col-md-4 control-label">Daudzums</label>

        <div class="col-md-6">
            <input name="count" type="text" placeholder="4" class="form-control" value="{{$item->count}}">
        </div>
    </div>

    <div style="margin-bottom:10px">
        <label class="col-md-4 control-label">Kods</label>

        <div class="col-md-6">
            <input name="code" type="text" placeholder="563548687345" class="form-control" value="{{$item->code}}">
        </div>
    </div>

        
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
           <button type="submit" class="btn btn-primary">Atjaunot</button>
        </div>
    </div>
    </form>






        public function updateItem(Request $req, $item_id)
    {

        $item = Item::find($item_id);
        if (!isset($item->id)) return back()->withErrors(['Inventārs netika atrasts.'])->withInput();
        $item->owner = \Auth::id();
        $item->manufacturer = $req->input('manufacturer');
        $item->name = $req->input('name');
        $item->category = $req->input('category');
        $item->count = $req->input('count');
        $item->code = $req->input('code');

        $item->save();

        return redirect('/home#inventārs')->with('status', 'Inventāra izmaiņas saglabātas.');
    }
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4" align="center">
            

 
<div class="sidebar" style="text-align:center">
  <ul class="list-sidebar bg-defoult">
    <li> <a href="#"><i class="fas fa-home"></i> <span class="nav-label">Sākumlapa</span></a> </li>  
    <li> <a href="#"><i class="fas fa-search"></i> <span class="nav-label">Pārskatīt inventāru</span></a></li>
    <li> <a href="#"><i class="fas fa-plus"></i> <span class="nav-label">Pievienot jaunu inventāru</span></a> </li>
    <li> <a href="#"><i class="fas fa-cog"></i> <span class="nav-label">Iestatījumi</span></a> </li>
    <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> <span class="nav-label">Iziet</span></a> </li>
  </ul>
</div> 
        </div> 
        <div class="col-md-8">
            <div class="card" style="margin-top:20px">
                <div id="single-menu">
                    <tabs>
                        <tab name="Sākumlapa">
                            <template id="homepage"><div class="card-header">Sākumlapa</div></template>
                            <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="margin-bottom:10px">Laipni lūgts, {{ Auth::user()->name }}.</div>
                            <ul>
                                <li>Jūsu E-pasts: {{ Auth::user()->email }} (<a href="#">mainīt</a>)</li>
                                <li>Reģistrācijas datums: {{ Auth::user()->created_at }}.</li>
                            </ul>
                            </div>
                        </tab>

                        <tab name="Inventārs" :selected="true">
                            <template id="product_list"><div class="card-header">Inventārs</div></template>                
                        </tab>

                        <tab name="Pievienot jaunu inventāru">
                            <template id="add_new_products"><div class="card-header">Pievienot jaunu inventāru</div></template>
                        </tab>

                        <tab name="Iestatījumi">
                            <template id="settings"><div class="card-header">Iestatījumi</div></template>
                        </tab>
                    </tabs>
                </div>
                

                
            </div>
        </div> 
        
    </div>
</div>
@endsection

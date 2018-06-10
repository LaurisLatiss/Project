@extends('layouts.app')

@section('content')



<div class="container">
                <div id="single-menu">
                    <tabs>
                        <tab class="card" name="Sākumlapa" :selected="true">
                            <template><div class="card-header">Sākumlapa</div></template>
                            <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="margin-bottom:10px">Laipni lūgts, {{ Auth::user()->name }}.</div>
                            <ul>
                                <li>Jūsu E-pasts: {{ Auth::user()->email }}</li>
                                <li>Lietotāja statuss: 
                                @if (Auth::user()->admin)
                                    Administrators
                                @endif
                                @if (!Auth::user()->admin)
                                    Lietotājs
                                @endif</li>
                                <li>Reģistrācijas datums: {{ Auth::user()->created_at }}.</li>
                                <li>Pēdējā informācijas maiņa: {{ Auth::user()->updated_at }}.</li>
                            </ul>
                            </div>
                        </tab>
                        
                        @if (Auth::user()->admin)
                        <tab class="card" name="Admin panelis">
                            <template><div class="card-header">Admin panelis</div></template>
                            <div class="container mb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <div style="margin-top:30px" class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        @if($isMaintance)
                                                            <a href="{{ route('live') }}"><button type="submit" class="btn btn-success form-control">Ieslēgt tiešsaisti</button></a>
                                                        @else
                                                            <a href="{{ route('maintance') }}"><button type="submit" class="btn btn-primary form-control">Uzturēšanas režīms</button></a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </table>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </tab>
                        
                        <tab class="card" name="Lietotāji">
                            <template><div class="card-header">Lietotāji</div></template>
                            <div class="container mb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Vārds</th>
                                                        <th scope="col">E-pasts</th>
                                                        <th scope="col">Administrators</th>
                                                        <th scope="col">Reģistrēts</th>
                                                        <th scope="col">Liegums</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if($users->count() >= 1)
                                                    @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$user->admin}}</td>
                                                        <td>{{$user->created_at}}</td>
                                                        <td>{{$user->banned}}</td>
                                                        <td class="text-right"><button data-toggle="userStorageView" data-target="" class="btn btn-sm btn-warning"><i class="fas fa-archive"></i></button><a href=" {{ route('ban', [$user->id]) }} "><button class="btn btn-sm btn-danger"><i class="fas fa-ban"></i></button></a><a href=" {{ route('unban', [$user->id]) }} "><button class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></button></a></td>
                                                    </tr>
                                                    @endforeach
                                                @else        
                                                        <tr>
                                                            <td>Nav satura</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                @endif                                              
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tab>

                        <tab class="card" name="Viss inventārs">
                            <template><div class="card-header">Visu lietotāju inventārs</div></template>
                            <div class="container mb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Meklēt pēc lietotāja..." title="Type in a name">
                                            <table id="myTable" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Īpašnieks</th>
                                                        <th scope="col">Īpašnieka ID</th>
                                                        <th scope="col">Ražotājs</th>
                                                        <th scope="col">Nosaukums</th>
                                                        <th scope="col">Katgorija</th>
                                                        <th scope="col">Daudzums</th>
                                                        <th> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if($items->count() >= 1)
                                                    @foreach($items as $item)
                                                        <tr id="myUL">
                                                            <td>{{$item->owner}}</td>
                                                            <td>{{$item->owner}}</td>
                                                            <td>{{$item->manufacturer}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->category}}</td>
                                                            <td>{{$item->count}}</td>
                                                            <td class="text-right"><button data-toggle="modal" data-target="#myModal{{$item->id}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> </button><button onclick="window.location.href='/deleteitem/{{$item->id}}'" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
 
                                                           
                                                        </tr>
                                                @endforeach
                                                @else        
                                                        <tr>
                                                            <td>Nav satura</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                @endif
                                                </tbody>
                                            </table>
 
                                            @foreach($items as $item)
                                                @include('modal')
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tab>
                        @endif

                        @if (!Auth::user()->admin)
                        <tab class="card" name="Inventārs">
                            <template><div class="card-header">Inventārs</div></template>
                            <div class="container mb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Meklēt pēc ražotāja..." title="Type in a name">
                                            <table id="myTable" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Ražotājs</th>
                                                        <th scope="col">Nosaukums</th>
                                                        <th scope="col">Katgorija</th>
                                                        <th scope="col">Daudzums</th>
                                                        <th scope="col">Kods</th>
                                                        <th> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if($items->count() >= 1)
                                                    @foreach($items as $item)
                                                        <tr id="myUL">
                                                            <td>{{$item->manufacturer}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->category}}</td>
                                                            <td>{{$item->count}}</td>
                                                            <td>{{$item->code}}</td>
                                                            <td class="text-right"><button data-toggle="modal" data-target="#myModal{{$item->id}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> </button><button onclick="window.location.href='/deleteitem/{{$item->id}}'" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
 
                                                           
                                                        </tr>
                                                @endforeach
                                                @else        
 
                                                        <tr>
                                                            <td>Nav satura</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                @endif
                                                </tbody>
                                            </table>
 
                                            @foreach($items as $item)
                                                @include('modal')
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tab>

                        <tab class="card" name="Pievienot jaunu inventāru">
                            <template><div class="card-header">Pievienot jaunu inventāru</div></template>
                            <div class="card-body">
                                
                                <div>
                                    <div class="container">
                                        <div class="text-center"><h4>Pievienot inventāru</h4></div>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-2">
                                                
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                    <form action="{{ route('store') }}" method="post" role="form" class="form-horizontal">
                                                        {{csrf_field()}}
                                                            <div style="margin-bottom:10px">
                                                                <label class="col-md-4 control-label">Ražotājs</label>

                                                                <div class="col-md-6">
                                                                    <input id="manufacturer" name="manufacturer" type="text" placeholder="Philips, Intel, Dell..." class="form-control" >
                                                                </div>
                                                            </div>
                                                        
                                                            <div style="margin-bottom:10px">
                                                                <label class="col-md-4 control-label">Nosaukums</label>

                                                                <div class="col-md-6">
                                                                    <input id="name" name="name" type="text" placeholder="Brilliance PDS241..." class="form-control" >
                                                                </div>
                                                            </div>
                                                        
                                                            <div style="margin-bottom:10px">
                                                                <label class="col-md-4 control-label">Kategorija</label>

                                                                <div class="col-md-6">
                                                                    <select name="category">
                                                                        <option value="kancelejas_prece">Kancelejas prece</option>
                                                                        <option value="Datortehnika_un_elektronika">Datortehnika un elektronika</option>
                                                                        <option value="biroja_tehnika">Biroja tehnika</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        
                                                            <div style="margin-bottom:10px">
                                                                <label class="col-md-4 control-label">Daudzums</label>

                                                                <div class="col-md-6">
                                                                    <input id="count" name="count" type="text" placeholder="4" class="form-control" >
                                                                </div>
                                                            </div>
                                                        
                                                            <div style="margin-bottom:10px">
                                                                <label class="col-md-4 control-label">Kods</label>

                                                                <div class="col-md-6">
                                                                    <input id="code" name="code" type="text" placeholder="563548687345" class="form-control" >
                                                                </div>
                                                            </div>

                                                                
                                                            <div class="form-group">
                                                                <div class="col-md-6 col-md-offset-4">
                                                                    <button type="submit" class="btn btn-primary form-control">Pievienot</button>
                                                                </div>
                                                            </div>
                                                    </form>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-md-offset-2">                 
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tab>
                        @endif

                        <tab class="card" name="Iestatījumi">
                            <template><div class="card-header">Iestatījumi</div></template>
                            <div class="card-body">
                                
                                <div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-2">
                                                <div><h4>Mainīt paroli</h4></div>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                    @if (Session::has('success'))
                                                        <div class="alert alert-success">{!! Session::get('success') !!}</div>
                                                    @endif
                                                    @if (Session::has('failure'))
                                                        <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                                                    @endif
                                                    <form action="{{ route('password.update') }}" method="post" role="form" class="form-horizontal">
                                                        {{csrf_field()}}

                                                            <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
                                                                <label for="password" class="col-md-4 control-label">Vecā parole</label>

                                                                <div class="col-md-6">
                                                                    <input id="password" type="password" class="form-control" name="old">

                                                                    @if ($errors->has('old'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('old') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                                    <label for="password" class="col-md-4 control-label">Jaunā parole</label>

                                                                    <div class="col-md-6">
                                                                        <input id="password" type="password" class="form-control" name="password">

                                                                        @if ($errors->has('password'))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('password') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                                    <label for="password-confirm" class="col-md-4 control-label">Atkārtot paroli</label>

                                                                    <div class="col-md-6">
                                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                                                        @if ($errors->has('password_confirmation'))
                                                                            <span class="help-block">
                                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            <div class="form-group">
                                                                <div class="col-md-6 col-md-offset-4">
                                                                <button type="submit" class="btn btn-primary form-control">Mainīt</button>
                                                                </div>
                                                            </div>
                                                    </form>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-md-offset-2">
                                                <div><h4>Mainīt e-pastu</h4></div>                   
                                                    <form action="{{ route('email.update') }}" method="post" role="form" class="form-horizontal">
                                                            {{csrf_field()}}
                                                            <div>
                                                                <label for="email" class="col-md-4 control-label">Jaunais e-pasts</label>

                                                                <div class="col-md-6">
                                                                    <input id="email" name="email" type="email" class="form-control" required>
                                                                @if ($errors->has('email'))
                                                                        <span class="help-block">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                                </div>
                                                            </div>

                                                            <div style="margin-top:15px" class="form-group">
                                                                <div class="col-md-6 col-md-offset-4">
                                                                    <button class="btn btn-primary form-control">Mainīt</button>
                                                                </div>
                                                            </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tab>

                        <tab class="card" name="Dzēst profilu">
                            <template><div class="card-header">Dzēst profilu</div></template>
                            <div class="container mb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <div style="margin-top:30px" class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                            <a href=""><button type="submit" class="btn btn-danger form-control">Dzēst profilu</button></a>
                                                    </div>
                                                </div>
                                            </table>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </tab>
                    </tabs>
                </div> 
</div>
@endsection

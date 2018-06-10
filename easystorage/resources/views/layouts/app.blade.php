<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Easy Storage</title>

    <!-- Scripts -->
 <!--    <script src="{{ asset('js/app.js') }}" defer></script>-->
<!--    <script src="{{ asset('my-css/bootstrap/js/vue.min.js') }}"></script> -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js') }}"></script>

    <!-- Fonts -->
<!--    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('my-css/bootstrap/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('my-css/bootstrap/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('fontawesome/web-fonts-with-css/css/fontawesome-all.css')}}"/>
    <link rel="stylesheet" href="{{asset('my-css/bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('my-css/bootstrap/css/fonts.css')}}"/>
    <script src="{{ URL::asset ('my-css/jquery/jquery.min.js') }}"></script>
    
    

</head>
<body>
    <div id="app">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Easy Storage
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item"><a class="nav-link" href="/">Sākumlapa</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Pieslēgties') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Reģistrēties') }}</a></li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Sākumlapa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Mans inventārs</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Iziet') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @auth
                @if(!Auth::user()->maintaince_mode)
                    @yield('content')
                @else
                    @include('maintaince_mode')
                @endif
            @else
                @yield('content')
            @endauth
        </main>
    </div>
    
    <script type="x-template" id="template-tabs">
        <div id="applicationContainer">
            
            <nav style="margin-top:-30px; margin-bottom:20px; border-style:groove" class="navbar navbar-expand-lg navbar-light bg-light ">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
            <div class="collapse navbar-collapse"  id="navbarSupportedContent">
                <div id="navBarContainer">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item" v-for="menuItem in navItemsArray" :class=" { active: menuItem.isActive }"><a :href="menuItem.href" @click="selectTabItem(menuItem)" class="nav-link">@{{ menuItem.name }}</a></li>
                    </ul>
                </div>
            </div>      
            </nav>   
            <div id="tabContentContainer">
                <slot></slot>
            </div>
        </div>
    </script>  
    
    
    <script type="x-template" id="template-tab">
        <div id="individualTabContentContainer" v-show="isActive">
            <slot></slot>
        </div>
    </script>
    
    <script>
        Vue.component('tabs', {
            template: '#template-tabs',
            data() {
                return{
                    navItemsArray: []
                }
            },
            mounted() {
                this.navItemsArray = this.$children
            },
            methods: {
                selectTabItem(passedAlongMenuItemObject) {
                    this.navItemsArray.forEach(navItem => {
                        navItem.isActive = (passedAlongMenuItemObject == navItem)
                    })
                }
            }
        })
        
        Vue.component('tab', {
            template: '#template-tab',
            props: {
                name: { required: true },
                selected: { default: false }
            },
            data() {
                return {
                    isActive: false
                }
            },
            computed: {
                href() {
                    return '#' + this.name.toLowerCase().replace(/ /g, '-')
                }
            },
            mounted() {
                this.isActive = this.selected
            }
        })
        
        new Vue({
            el: '#single-menu'
        })
    </script>

    <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
    
    <script>
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip(); 
      });
    </script>
    <script src="{{ URL::asset ('my-css/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>

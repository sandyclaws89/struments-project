<header>
    <nav>
        <img src="{{ asset('images/logo-sito.jpg') }}" alt="">
        <ul>
            {{-- la funzione in dd restituisce un booleano, praticamente ottiene il nome dellaroute        corrente e se è uguale a quello che inserisco(in questo esempio il nomecorretto, quindi    'percussioni-route') gli da la classe active altrimenti non gli danessuna classe. Serve     per controllare quale categoria è attiva, quindi praticametnein quale route ci troviamo   in  questo momento.
            --}}
            {{-- @dd(Route::current()->getName() == 'home-route') ? 'active' : '') --}}
            <li class="{{ Route::current()->getName() == 'home-route' ? 'active' : '' }}"><a href="{{route('home-route')}}">Home</a></li>
            <li class="{{ Route::current()->getName() == 'tutti-route' ? 'active' : '' }}"><a href="{{route('tutti-route')}}">Tutti</a></li>
            <li class="{{ Route::current()->getName() == 'percussioni-route' ? 'active' : '' }}"><a  href="{{route('percussioni-route')}}">Percussioni</a></li>
            <li class="{{ Route::current()->getName() == 'corde-route' ? 'active' : '' }}"><a href="{{route('corde-route')}}">Corde</a></li>
            <li class="{{ Route::current()->getName() == 'fiati-route' ? 'active' : '' }}"><a href="{{route('fiati-route')}}">Fiati</a></
            {{-- questo è il metodo se vogliamo riempire dinamicamente con i dati, abbiamo unarray     e    riempiamo con un foreach
            Route::currentRouteName() è una funzione unica che fa la stessa cosa di Route::current ()     ->getName()  --}}
            {{-- @php
               $arrMenu = [
               [
                   'route' =>  'home-route',
                   'name'  =>  'Home'
               ],
               [
                   'route' =>  'tutti-route',
                   'name'  =>  'tutti'
               ],
               [
                   'route' =>  'percussioni-route',
                   'name'  =>  'percussioni'
               ],
               [
                   'route' =>  'corde-route',
                   'name'  =>  'corde'
               ],
               [
                   'route' =>  'fiati-route',
                   'name'  =>  'fiati'
               ],
               ]
            @endphp
            @foreach ($arrMenu as $menuItem)
            <li class="{{ Route::currentRouteName() == $menuItem['route'] ? 'active' : '' }}">
               <a href="{{route($menuItem['route'])}}">{{$menuItem['name']}}</a>
            </li>
            @endforeach --}}
        </ul>
    </nav>
</header>


@extends('guest.template.basehtml')
@section('title', $titolo)
@section('content')
    <section class="tutti">
        <h1>Tutti gli strumenti</h1>
        @foreach ($sezioni as $sezione)
        {{-- FIXME:SITEMARE LA ROUTE PER FAR SI CHE SE SI CLICCA SUL TITOLO SI VA ALLA CATEGORIA --}}
            <h2><a href="{{ route('tutti-route') }}">{{ $sezione['titolo'] }}</a></h2>
            <div class="container-cards">
                @foreach ($sezione['strumenti'] as $strumento)
                    <div class="card">
                        <a href="{{ route('strumento-route', ['id' => $strumento['id']]) }}">
                            <h3>{{ $strumento['titolo'] }}</h3>
                            <img src="{{ $strumento['src-img'] }}" alt="{{ $strumento['titolo'] }}">
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </section>
@endsection

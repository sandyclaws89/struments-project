@extends('guest.template.basehtml')

{{-- se la section ha un contenuto breve possiamo usarla come funzione, quindi mettere come secondo argomento della funzione, se è tanto contenuto dobbiamo mettere anche @endsection --}}
@section('title', 'Fiati')

@section('content')
<section class="tutti">
    <h1>Sezione fiati</h1>
    <div class="container-cards">
        @foreach ($fiati as $strumento)
        <div class="card">
            <a href="{{ route('strumento-route', ['id' => $strumento['id']]) }}">
                <h3>{{$strumento['titolo']}}</h3>
                    <img src="{{$strumento['src-img']}}" alt="{{$strumento['titolo']}}">
                </a>
            </div>
        @endforeach
    </div>
    @endsection
</section>

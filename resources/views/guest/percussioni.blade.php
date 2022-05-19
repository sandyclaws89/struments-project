@extends('guest.template.basehtml')

{{-- se la section ha un contenuto breve possiamo usarla come funzione, quindi mettere come secondo argomento della funzione, se è tanto contenuto dobbiamo mettere anche @endsection --}}
@section('title', 'Percussioni')

@section('content')
<section class="tutti">
    <h1>Sezione Percussioni</h1>
    <div class="container-cards">
        @foreach ($percussioni as $percussione)
        <div class="card">
            <a href="{{ route('strumento-route', ['id' => $percussione['id']]) }}">
                <h3>{{$percussione['titolo']}}</h3>
                    <img src="{{$percussione['src-img']}}" alt="{{$percussione['titolo']}}">
                </a>
            </div>
        @endforeach
    </div>
    @endsection
</section>


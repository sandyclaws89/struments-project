
@extends('guest.template.basehtml')

{{-- se la section ha un contenuto breve possiamo usarla come funzione, quindi mettere come secondo argomento della funzione, se è tanto contenuto dobbiamo mettere anche @endsection --}}
@section('title', 'Home')

@section('content')
    <section class="home-page">
        <h1>
            Sito di strumenti
        </h1>
    </section>



@endsection


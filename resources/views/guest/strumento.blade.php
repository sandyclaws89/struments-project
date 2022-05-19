@extends('guest.template.basehtml')

@section('title', $title)

@section('content')
<section class="tutti strument">
    <h1>{{ $strumento['titolo'] }}</h1>
    <div class="container-cards">
        <img src="{{ $strumento['src-img'] }}" alt="{{ $strumento['titolo'] }}">
        {{-- Graffa e doppio esclamativo gli diciamo di leggere i tag html se ci sono dentro il testo --}}
        <p>{!! $strumento['descrizione'] !!}</p>
    </div>


</section>
{{-- la variabile strumento gliel'ho passata nella route come chiave, e gli ho assegnato il valore dello strumento selezionato --}}

@endsection

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('guest.home');

})->name('home-route');

Route::get('/tutti', function () {
    // la funzione config chiama il file strumenti.php che sta nella fold config; cosi facendo trasferisco i dati qui
    $strumenti = config('strumenti');

    $arr_percussioni = [];
    $arr_corde = [];
    $arr_fiati = [];
    foreach ($strumenti as $strumento) {
        if ($strumento['famiglia'] === 'percussioni') {
           $arr_percussioni[] = $strumento;
        }
        // echo($strumento['famiglia']);
        else if ($strumento['famiglia'] === 'corde') {
            $arr_corde[] = $strumento;
        }
        // print_r($arr_corde);
        else if ($strumento['famiglia'] === 'fiati') {
            $arr_fiati[] = $strumento;
        }
    }
    // echo($strumento['tipo']);
    // $data['arr_percussioni'] = $arr_percussioni;
    // $data['arr_corde'] = $arr_corde;
    // $data['arr_fiati'] = $arr_fiati;
    $data = [
            'titolo'    => 'Tutti gli strumenti',
            'sezioni'   =>[
            [
                'titolo'    => 'Percussioni',
                'strumenti' =>  $arr_percussioni
            ],
            [
                'titolo'    => 'Corde',
                'strumenti' =>  $arr_corde
            ],
            [
                'titolo'    => 'Fiati',
                'strumenti' =>  $arr_fiati
            ]
        ]
    ];
    return view('guest.tutti', $data);
})->name('tutti-route');

Route::get('/percussioni', function () {
    $strumenti = config('strumenti');
    $arr_percussioni = [];
    foreach ($strumenti as $strumento) {
        if ($strumento['famiglia'] === 'percussioni') {
           $arr_percussioni[] = $strumento;
        }
        $data =  [
            'percussioni' => $arr_percussioni
        ];
    }

    return view('guest.percussioni', $data);
})->name('percussioni-route');

Route::get('/corde', function () {
    $strumenti = config('strumenti');
    $arr_corde = [];
    foreach ($strumenti as $strumento) {
        if ($strumento['famiglia'] === 'corde') {
           $arr_corde[] = $strumento;
        }
        $data =  [
            'corde' => $arr_corde
        ];
    }
    return view('guest.corde', $data);
})->name('corde-route');

Route::get('/fiati', function () {
    $strumenti = config('strumenti');
    $arr_fiati = [];
    foreach ($strumenti as $strumento) {
        if ($strumento['famiglia'] === 'fiati') {
           $arr_fiati[] = $strumento;
        }
        $data =  [
            'fiati' => $arr_fiati
        ];
    }
    return view('guest.fiati', $data);
})->name('fiati-route');

Route::get('/tutti/{id}', function($id) {
    $strumenti = collect(config('strumenti'));
    // il where ??  una funzione del gruppo helper, fa un controllo specifico (simile al filter). Nel where ci vanno due valori, il nome della chiave che si trova nell'array e che valore deve avere, lui tira fuori esattamente tutte le chiavi con esattamente quel valore; li ritorna come un array.

    // qui praticamente accade che assegno a strumentoSelezionato esattamente quello a cui punta il mio id nell'url, perch?? la funzione where mi sta prendendo tutti gli elementi che hanno la chiave id = a il valore della variabile $id, che in questo caso ?? appunto quella collegata all'URL.
    // array_values lo uso in questo caso perch?? il where, cosi come sta, agli elementi che ritorna mantiene la sua chiave orginale (ad esempio se torna l'elemento che nell'array originale ha chiave 5 mi ritorna un array con chiave 5); questo non va bene perch?? avere le chiavi non ordinate mi crea problemi per passare i dati.
    // Fatto ci?? ho bisogno di assegnare quindi ad una nuova variabile ($strumentoSelezionato) l'array con le chiavi riordinate
    // $strumentiSelezionati = $strumenti->where('id', $id);
    // questo if serve a gestire meglio l'errore. Se per qualche motivo ci sono due id uguali (oppure l'utente ha scritto direttamente nella url un numero che non c'??, quindi torna 0 nell'if), quindi ad un id corrispondono due strumenti deve darmi un errore, perci?? voglio che venga visualizzato un 404 che ?? un messaggio di errore pulito; una funzione delle collection ?? abort dove dentro vado ad inserire il numero di errore che desidero. La funzione count() serve a contare quanti elementi ci sono in un array
    // if($strumentiSelezionati->count() == 1) {
        // devo per?? selezionare direttamente l'elemento unico(tanto sar?? sempre uno perch?? ?? lo strumento che viene cliccato dall'utente e non pu?? essere pi?? di uno alla volta) perch?? cosi posso accedere poi al titolo e passare al file.blade
    //     $strumentoSelezionato = array_values($strumentiSelezionati->all())[0];
    // }
    // else {
    //     abort(404);
    // }

    /*  Un modo piu breve di scrivere tutto il codice sopra (a partire dal where) ?? la funzione qui sotto:
     Praticamente firstWhere invece di tornare un array con i risultati torna solo il primo elemento che trova e siccome in questo caso ce ne serve solo uno ?? perfetto; firstWhere se non trova nulla torna un null. Dopo facciamo il controllo con la if(essendo negata si legge che se ?? not null, quindi in booleano null ?? = a false, not null ?? = a true, quindi se ?? true manda il 404)*/
        $strumentoSelezionato = $strumenti->firstWhere('id', $id);
        if (!$strumentoSelezionato) abort(404);
    return view('guest.strumento', [
        'title'         =>  $strumentoSelezionato['titolo'] . '- percussione',
        'strumento'     =>  $strumentoSelezionato
    ]);
})->name('strumento-route');


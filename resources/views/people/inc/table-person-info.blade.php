<?php

use App\Custom\Date;

?>

<table class="table table-striped">
    @if($person->aliases)
    <tr>
        <td class="border" colspan="2"><span class="fw-bold">Aliases : </span>{{$person->aliases}}</td>
    </tr>
    @endif
    <tr>
        <td class="border">
            <span class="fw-bold">Date de naissance : </span>{{ $person->birth_date }} ({{ $person->age }} ans)
        </td>
        <td class="border"><span class="fw-bold">Lieu de naissance : </span>{{ $person->birth_place ?: 'N/A'}}</td>
    </tr>
    <tr>
        <td class="border"><span class="fw-bold">Cheveux : </span>{{ $person->hair ?: 'N/A'}}</td>
        <td class="border"><span class="fw-bold">Yeux : </span>{{ $person->eyes ?: 'N/A'}}</td>
    </tr>
    <tr>
        <td class="border"><span class="fw-bold">Taille : </span>{{ $person->height ? ($person->height / 100).' m' : 'N/A'}}</td>
        <td class="border"><span class="fw-bold">Poids : </span>{{ $person->weight ? $person->weight.' kg' : 'N/A'}}</td>
    </tr>
    <tr>
        <td class="border"><span class="fw-bold">Sexe : </span>{{ $person->sex ?: 'N/A'}}</td>
        <td class="border"><span class="fw-bold">Ethnie : </span>{{ $person->ethnic_group ?: 'N/A'}}</td>
    </tr>
    <tr>
        <td class="border">
            <span class="fw-bold">Espèce : </span>{{ $person->type ?: 'N/A'}}
            @if( isset($person->sire) )
                ({{ $person->sire->sex == "Homme" ? "Sire" : "Dame" }} :
                <a href="{{ url($person->sire->link) }}">{{ $person->sire->first_last_name }}</a>
                )
            @endif
        </td>
        <td class="border"><span class="fw-bold">Langues : </span>{{ $person->languages ?: 'N/A'}}</td>
    </tr>
</table>
@php
    $countries = "";
    if (isset($organisation)) {
        switch ($organisation->danger_level) {
            case 0:
                $class_name = "bg-success text-white";
                $class_name_fr = "bg-success text-light";
                break;
            case 1:
                $class_name = "bg-warning";
                $class_name_fr = "bg-warning text-muted";
                break;
            case 2:
                $class_name = "bg-danger text-white";
                $class_name_fr = "bg-danger text-light";
                break;
        }
        
        foreach ($organisation->countries as $country) {
            $countries = $countries.$country->name.", ";
        }
        $countries = substr($countries, 0, -2);
    }
@endphp

<div class="card position-sticky card_orga" style="top: 20px;">
    <div class="card-header font-weight-bold {{ isset($class_name) ? $class_name : '' }} card_orga_name">
        @isset($organisation)
        {{ $organisation->name }}
        @endisset
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item card-subtitle mb-2 font-italic {{ isset($class_name_fr) ? $class_name_fr : '' }} card_orga_name_fr">
            @isset($organisation)
            @if ($organisation->name != $organisation->name_fr)
            {{ $organisation->name_fr }}
            @endif
            @endisset
        </li>
        <li class="list-group-item card-text card_orga_description">
            @isset($organisation)
            {!! $organisation->description !!}
            @endisset</li>
        <li class="list-group-item">
            <span class="font-weight-bold">Pays</span>
            (<span class="card_orga_countries_number">@isset($organisation){{ count($organisation->countries) }}@endisset</span>) :
            <span class="card_orga_countries">{{ $countries }}</span>
        </li>
    </ul>
</div>
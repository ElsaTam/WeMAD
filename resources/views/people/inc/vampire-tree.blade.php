<?php

function displayBrood($sire, $current_id) {
    echo "<li>";
    echo "    <a href='".url(strtolower($sire->type)."/".$sire->id)."' class='".($sire->id == $current_id ? 'current' : '')."'>".$sire->last_name." ".$sire->first_name."</a>";
    if (isset($sire->brood) && count($sire->brood) > 0) {
        echo "<ul>";
        foreach ($sire->brood as $breed) {
            displayBrood($breed, $current_id);
        }
        echo "</ul>";
    }
    echo "</li>";
}

$parents = [];
$current_vampire = $vampire;
while (isset($current_vampire->sire)) {
    array_push($parents, $current_vampire->sire->vampire);
    $current_vampire = $current_vampire->sire->vampire;
}
$parents = array_reverse($parents);

?> 

<div>
    <div class="tree overflow-scroll">
        <ul>
            @if (count($parents) > 0)
                {{ displayBrood($parents[0], $vampire->id) }}
            @else
                {{ displayBrood($vampire, $vampire->id) }}
            @endif
        </ul>
    </div>

    <div class="tree overflow-scroll">
        @if (count($parents) > 0)
            @foreach ($parents as $index => $sire)
                <ul>
                    <li>
                        <a href="{{ url(strtolower($sire->type)."/".$sire->id)}}"> {{ $sire->last_name }} {{ $sire->first_name }} </a>
                        @if ($index == count($parents) - 1)
                            <ul class="current">
                                {{ displayBrood($vampire, $vampire->id) }}
                            </ul>
                        @endif
            @endforeach
            @foreach ($parents as $item)
                    </li>
                </ul>
            @endforeach
        @else
            {{ displayBrood($vampire, $vampire->id) }}
        @endif
    </div>
    
</div>
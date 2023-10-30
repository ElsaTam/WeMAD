<?php

function displayBrood($sire, $current_id) {
    echo "<li>";
    echo "    <a href='".url($sire->link)."' class='".($sire->id == $current_id ? 'current' : '')."'>".$sire->first_last_name."</a>";
    if (count($sire->brood) > 0) {
        echo "<ul>";
        foreach ($sire->brood as $breed) {
            displayBrood($breed, $current_id);
        }
        echo "</ul>";
    }
    echo "</li>";
}

$current_vampire = $vampire;
$parents = [$current_vampire];
while (isset($current_vampire->sire)) {
    $current_vampire = $current_vampire->sire;
    array_push($parents, $current_vampire);
}
$parents = array_reverse($parents);

?> 

<div class="bg-light border border-dark">
    <h4 class="p-3 text-center">Arbre de transformation</h4>
    <div class="tree overflow-scroll">
        <ul>
            {{ displayBrood($parents[0], $vampire->id) }}
        </ul>
    </div>
</div>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People\Person;
use App\Models\Places\Place;
use App\Models\Organisation;
use App\Models\Groups\Group;

class OrganisationController extends Controller
{
    private function fetchOrganisations() {
        //return Place::ofType('office')->get()->sortBy('state.id');
        return Organisation::with('countries')->get()->sortBy(function ($i) {
            return trim(str_replace(['L\'', 'La ', 'Le ', 'Les '], '', ' ' . $i['name_fr'] . ' '));
        });
    }

    public function getWorldOrganisations() {
        $organisations = $this->fetchOrganisations();

        $organisations_danger_0 = $organisations->where('danger_level', 0);
        $organisations_danger_1 = $organisations->where('danger_level', 1);
        $organisations_danger_2 = $organisations->where('danger_level', 2);

        return view('ressources/in-the-world/pages/organisations')
                    ->with('organisations_danger_0', $organisations_danger_0)
                    ->with('organisations_danger_1', $organisations_danger_1)
                    ->with('organisations_danger_2', $organisations_danger_2);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Place;
use App\Office;
use App\Group;

class OfficeController extends Controller
{
    private function fetchOffices() {
        //return Place::ofType('office')->get()->sortBy('state.id');
        return Office::all();
    }

    public function getOffices() {
        $offices = $this->fetchOffices();
        $council_west   = $offices->where('state.council', 'Ouest');
        $council_center = $offices->where('state.council', 'Centre');
        $council_est    = $offices->where('state.council', 'Est');
        $council_none   = $offices->where('state.council', Null);

        return view('offices/offices-map')
                    ->with('council_west',   $council_west)
                    ->with('council_center', $council_center)
                    ->with('council_est',    $council_est)
                    ->with('council_none',   $council_none);
    }
    
    public function getWestCouncil() {
        $offices = $this->fetchOffices();
        $council = $offices->where('place.state.council', 'Ouest');

        return view('offices/offices-council')
                    ->with('council', $council)
                    ->with('title', "Etats de l'Ouest");
    }
    
    public function getEastCouncil() {
        $offices = $this->fetchOffices();
        $council = $offices->where('state.council', 'Est');

        return view('offices/offices-council')
                    ->with('council', $council)
                    ->with('title', "Etats de l'Est");
    }
    
    public function getCenterCouncil() {
        $offices = $this->fetchOffices();
        $council = $offices->where('state.council', 'Centre');

        return view('offices/offices-council')
                    ->with('council', $council)
                    ->with('title', "Etats du Centre");
    }
    
    public function getNoCouncil() {
        $offices = $this->fetchOffices();
        $council = $offices->where('state.council', Null);

        return view('offices/offices-council')
                    ->with('council', $council)
                    ->with('title', "Sans conseil");
    }

    public function getOffice($id) {
        $office = Place::find($id);

        $groups = Group::where('office_id', $id)->get();

        return view('offices/office')
                    ->with('office', $office)
                    ->with('groups', $groups);
    }
}

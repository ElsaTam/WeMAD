<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People\Person;
use App\Models\Places\Place;
use App\Models\Places\Office;
use App\Models\Groups\Group;
use Illuminate\Contracts\Database\Eloquent\Builder;

class OfficeController extends Controller
{
    public function getOffices() {
        $offices = Office::select('id', 'name','state_id')
            ->orderBy('state_id')
            ->with(['state:id,council'])
            ->get();
        $council_west   = $offices->where('state.council', 'west');
        $council_center = $offices->where('state.council', 'center');
        $council_est    = $offices->where('state.council', 'east');
        $council_none   = $offices->where('state.council', Null);

        return view('offices/offices-map')
                    ->with('council_west',   $council_west)
                    ->with('council_center', $council_center)
                    ->with('council_est',    $council_est)
                    ->with('council_none',   $council_none);
    }

    private function getCouncil($council_name) {
        return Office::whereHas('state', function (Builder $query) use ($council_name) {
            $query->where('council', $council_name);
        })
        ->with(['boss:id,first_name,last_name'])
        ->select('id','name','state_id','boss_id','type')
        ->withCount('agents')
        ->orderBy('state_id')
        ->get();
    }
    
    public function getWestCouncil() {
        return view('offices/offices-council')
                    ->with('council', $this->getCouncil('west'))
                    ->with('title', "Etats de l'Ouest");
    }
    
    public function getEastCouncil() {
        return view('offices/offices-council')
                    ->with('council', $this->getCouncil('east'))
                    ->with('title', "Etats de l'Est");
    }
    
    public function getCenterCouncil() {
        return view('offices/offices-council')
                    ->with('council', $this->getCouncil('center'))
                    ->with('title', "Etats du Centre");
    }
    
    public function getNoCouncil() {
        return view('offices/offices-council')
                    ->with('council', $this->getCouncil(Null))
                    ->with('title', "Sans conseil");
    }

    public function getOffice($id) {
        $office = Office::where('id', $id)
            ->with('agents:id,place_id,first_name,last_name')
            ->with('boss:id,first_name,last_name')
            ->with('state:id,name')
            ->select('id','name','boss_id','state_id')
            ->get()[0];

        $groups = Group::where('office_id', $id)
            ->with([
                'leader:id,group_id,first_name,last_name,sex,status,dead' => [
                    'group:id,group_type_id'
                ],
                'type:id,name,leader_alias_m,leader_alias_f'
            ])
            ->select('id','leader_id','group_type_id','name')
            ->get();
        foreach ($groups as $group) {
            $group->loadCount(['members' => function (Builder $query) {
                $query->where('dead', False);
            }]);
        }

        return view('offices/office')
                    ->with('office', $office)
                    ->with('groups', $groups);
    }
}

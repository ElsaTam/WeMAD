<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\People\Person;
use App\Models\People\Human;
use App\Models\People\Vampire;

class PersonController extends Controller
{
    public function getMostWantedFugitives() {
        $wanteds = Person::where('status', 'wanted')
                    ->join('criminal_records', 'people.id', '=', 'criminal_records.person_id')
                    ->where('criminal_records.most_wanted', True)
                    ->get();

        return view('people/wanteds')
                    ->with('wanteds', $wanteds)
                    ->with('title', "10 fugitifs les plus recherchés");
    }

    public function getFugitives() {
        $wanteds = Human::with('featuredPhoto')
                    ->where('status', 'wanted')
                    ->get();

        return view('people/wanteds')
                    ->with('wanteds', $wanteds)
                    ->with('title', "Fugitifs");
    }

    public function getMissings() {
        $wanteds = Human::with('featuredPhoto')
                    ->where('status', 'missing')
                    ->get();

        return view('people/wanteds')
                    ->with('wanteds', $wanteds)
                    ->with('title', "Personnes disparues");
    }

    public function getPerson($id) {
        $person = Person::with([
                'place:id,state_id,name,type' => [
                    'state:id,name'
                ]
            ])
            ->select('id','first_name','last_name','aliases','type',
                     'sex','dead','birth_date','birth_place',
                     'height','weight','hair','eyes','ethnic_group',
                     'status','languages','place_id',
                     'group_id','sire_id','self_control','demon_id')
            ->find($id);

        switch ($person->status) {
            case 'wanted':
                return view('people/wanted-profile')->with('wanted', $person);
            case 'missing':
                return view('people/missing-profile')->with('missing', $person);
            case 'prisoner':
                return view('people/prisoner-profile')->with('prisoner', $person);
            case 'agent':
                return view('people/agent-profile')->with('agent', $person);
            case 'civilian':
                return view('people/civilian-profile')->with('civilian', $person);
        }
    }

    public function searchPeople(Request $request){
        if (!$request) return view('database/search-results');

        // Get the search values from the request
        $name = $request->input('name');
        $office = $request->input('office');
        $languages = $request->input('languages');
        $type = $request->input('type');
        $sex = $request->input('gender');
        $status = $request->input('status');
        $renegade = $request->input('renegade');
        $dead = $request->input('dead');
        $ethnic_group = $request->input('ethnicGroup');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $hair = $request->input('hair');
        $eyes = $request->input('eyes');
    
        // Search in the title and body columns from the posts table
        $search_query = Person::query();
        //$search_query = DB::table('people');

        if ($name) {
            $search_query = $search_query->where(function($query) use ($name) {
                $query->whereRaw("concat(first_name, ' ', last_name) LIKE '%".$name."%'")
                      ->orWhereRaw("concat(last_name, ' ', first_name) LIKE '%".$name."%'");
            });
        }

        if ($office) {
            $search_query = $search_query->where('place_id', $office);
        }

        if ($languages) {
            $languages = explode(',', $languages);
            $search_query = $search_query->where(function($query) use ($languages) {
                foreach ($languages as $language) {
                    $query->where('languages', 'LIKE', '%'.trim($language).'%');
                }
            });
        }

        if ($type) {
            $search_query = $search_query->whereIn('type', explode('_', $type));
        }

        if ($sex) {
            $search_query = $search_query->where('sex', $sex);
        }

        if ($status) {
            $search_query = $search_query->whereIn('status', explode('_', $status));
        }

        if ($renegade == '0') {
            $search_query = $search_query->where('group_id', '!=', NULL);
        }
        else if ($renegade == '1') {
            $search_query = $search_query->where('dead', 0)
                                         ->where('group_id', NULL)
                                         ->whereIn('type', ['vampire', 'warlock', 'werewolf', 'faery']);
        }

        if ($dead == '0') {
            $search_query = $search_query->where('dead', 0);
        }
        else if ($dead == '1') {
            $search_query = $search_query->where('dead', 1);
        }

        if ($ethnic_group) {
            $search_query = $search_query->whereIn('ethnic_group', explode('_', $ethnic_group));
        }

        if ($height) {
            $min = explode('_', $height)[0];
            $max = explode('_', $height)[1];
            $search_query = $search_query->where('height', '>=', $min)->where('height', '<=', $max);
        }

        if ($weight) {
            $min = explode('_', $weight)[0];
            $max = explode('_', $weight)[1];
            $search_query = $search_query->where('weight', '>=', $min)->where('weight', '<=', $max);
        }

        if ($hair) {
            $search_query = $search_query->whereIn('hair', explode('_', $hair));
        }

        if ($eyes) {
            $search_query = $search_query->whereIn('eyes', explode('_', $eyes));
        }

        $results = $search_query->orderBy('last_name')->orderBy('first_name')
                                ->paginate(30)->appends(request()->except('page'));

        return view('database/database-people')->with('results', $results);
    }
}

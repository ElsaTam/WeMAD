<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\People\Person;
use App\Models\People\Human;

class PersonController extends Controller
{
    public function getMostWantedFugitives() {
        $wanteds = Human::with('featuredPhoto')
                    ->where('status', 'wanted')
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
        $person = Human::find($id);

        switch ($person->status) {
            case 'wanted':
                return view('people/wanted-profile')->with('wanted', $person);
            case 'missing':
                return view('people/missing-profile')->with('missing', $person);
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
        $kind = $request->input('kind');
        $sex = $request->input('gender');
        $status = $request->input('status');
        $renegade = $request->input('renegade');
        $ethnic_group = $request->input('ethnicGroup');
        $situation = $request->input('situation');
    
        // Search in the title and body columns from the posts table
        $search_query = Person::query();

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

        if ($kind) {
            $kinds = explode('_', $kind);
            if (count($kinds) > 0) {
                $search_query = $search_query->where(function($query) use ($kinds) {
                    for ($i = 0; $i < count($kinds); ++$i) {
                        $query->orWhere('kind', $kinds[$i]);
                    }
                });
            }
        }
        else {
            $search_query = $search_query->where(function($query) {
                $query->where('kind', 'Humain')
                      ->orWhere('kind', 'Loup-Garou')
                      ->orWhere('kind', 'Sorcier')
                      ->orWhere('kind', 'Vampire');
            });
        }

        if ($sex) {
            $search_query = $search_query->where('sex', $sex);
        }

        if ($status) {
            $search_query = $search_query->where('type', $status);
        }

        if ($renegade == '0') {
            $search_query = $search_query->leftjoin('vampires', 'people.id', '=', 'vampires.person_id')
                                         ->leftjoin('warlocks', 'people.id', '=', 'warlocks.person_id')
                                         ->leftjoin('werewolves', 'people.id', '=', 'werewolves.person_id');
            $search_query = $search_query->where(function($query) {
                $query->where('vampires.clan_id', '!=', NULL)
                      ->orWhere('warlocks.circle_id', '!=', NULL)
                      ->orWhere('werewolves.pack_id', '!=', NULL);
            });
            $search_query = $search_query->select('people.*');
        }
        else if ($renegade == '1') {
            $search_query = $search_query->where(function($query) {
                $query->where('kind', 'Loup-Garou')
                      ->orWhere('kind', 'Sorcier')
                      ->orWhere('kind', 'Vampire');
            });
            $search_query = $search_query->leftjoin('vampires', 'people.id', '=', 'vampires.person_id')
                                         ->leftjoin('warlocks', 'people.id', '=', 'warlocks.person_id')
                                         ->leftjoin('werewolves', 'people.id', '=', 'werewolves.person_id');
            $search_query = $search_query->where('vampires.clan_id', NULL)
                                         ->where('warlocks.circle_id', NULL)
                                         ->where('werewolves.pack_id', NULL);
            $search_query = $search_query->select('people.*');
        }

        if ($ethnic_group) {
            $groups = explode('_', $ethnic_group);
            if (count($groups) > 0) {
                $search_query = $search_query->where(function($query) use ($groups) {
                    for ($i = 0; $i < count($groups); ++$i) {
                        $query->orWhere('ethnic_group', $groups[$i]);
                    }
                });
            }
        }
        
        if ($situation) {
            $situations = explode('_', $situation);
            if (count($situations) > 0) {
                $search_query = $search_query->where(function($query) use ($situations) {
                    for ($i = 0; $i < count($situations); ++$i) {
                        if ($situations[$i] == "None") {
                            $query->orWhere(function($query) {
                                $query->where('type', '!=', 'Wanted')
                                      ->where('type', '!=', 'Missing')
                                      ->where(function($query) {
                                        $query->where('place_id', 'NOT LIKE', 'prison_%')
                                              ->orWhere('type', 'Agent');
                                        });
                            });
                        }
                        else if ($situations[$i] == "Prison") {
                            $query->orWhere(function($query) {
                                $query->where('place_id', 'LIKE', 'prison_%')
                                      ->Where('type', '!=', 'Agent');
                            });
                        }
                        else {
                            $query->orWhere('type', $situations[$i]);
                        }
                    }
                });
            }
        }

        $results = $search_query->orderBy('last_name')->orderBy('first_name')
                                ->paginate(30)->appends(request()->except('page'));

        return view('database/database-people')->with('results', $results);
    }
}

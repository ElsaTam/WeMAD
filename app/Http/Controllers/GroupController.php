<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    public function getGroup($id) {
        $group = Group::find($id);
        $members = $group->members
                    ->where('person.dead', False) // Don't display the dead members
                    ->sortByDesc(function ($member, $key) use ($group) { // Place the leader in first
                        return $member->person_id == $group->leader_id;
                    })
                    ->sortBy('people.last_name') // Then order by name
                    ->sortBy('people.first_name');

        return view('people/group')
                    ->with('group', $group)
                    ->with('members', $members);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups\Group;

class GroupController extends Controller
{
    public function getGroup($id) {
        $group = Group::find($id);
        $members = $group->members
                    ->where('dead', False) // Don't display the dead members
                    ->sortBy('first_name') // order by name
                    ->sortBy('last_name')
                    ->sortByDesc(function ($member, $key) use ($group) { // Finaly place the leader in first
                        return $member->id == $group->leader_id;
                    });

        return view('people/group')
                    ->with('group', $group)
                    ->with('members', $members);
    }
}

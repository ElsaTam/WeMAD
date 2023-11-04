<?php

namespace App\Http\Controllers;

use App\Models\People\Vampire;
use App\Models\People\Warlock;
use App\Models\People\Werewolf;
use Illuminate\Http\Request;
use App\Models\Groups\Group;
use App\Models\People\Person;
use App\Models\People\Human;

class GroupController extends Controller
{
    public function getGroup($id) {
        $group = Group::where('id', $id)
            ->with([
                'office:id,type',
                //'members:id,group_id,first_name,last_name,sex,status,dead',
                //'type:id,name,leader_alias_m,leader_alias_f'
            ])
            ->select('id','leader_id','group_type_id','office_id','name')
            ->first();

        if ($group->group_type_id == 'clan')        $members = Vampire::where('group_id', $id);
        else if ($group->group_type_id == 'circle') $members = Warlock::where('group_id', $id);
        else if ($group->group_type_id == 'pack')   $members = Werewolf::where('group_id', $id);

        $members = $members
            ->where('dead', False)
            ->select('id','group_id','first_name','last_name','birth_date','status')
            ->with(['group:id,group_type_id,leader_id' => [
                    'type:id,leader_alias_m,leader_alias_f'
                ]
            ])
            ->orderBy('first_name') // order by name
            ->orderBy('last_name')
            ->get();
        $members = $members->sortByDesc(function ($member, $key) use ($group) { // Finaly place the leader in first
            return $member->id == $group->leader_id;
        });

        return view('people/group')
                    ->with('group', $group)
                    ->with('members', $members);
    }
}
